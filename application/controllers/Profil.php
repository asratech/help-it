<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

  function __construct(){
    parent:: __construct();

    $this->load->model('M_permintaan','mp'); //load model, simpan ke m
    $this->load->model('M_profil','mr'); //load model, simpan ke m
  }

	function index(){

    $d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('profil/index'); //load index kategori, bypass $data
		$this->load->view('template/footer_js');
    $this->load->view('profil/ajax_scripts');
    $this->load->view('template/footer');
	}

  function update_profil($id){
    $hasil = $this->mr->updateProfil($id);
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
    redirect(base_url('profil'));
  }

  function update_password(){
    $hasil = $this->mr->updatePassword();
    echo json_encode(array("status" => true));
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
  }

  function upload_gambar() {
        // setting konfigurasi upload
        $config['upload_path'] = './avatar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            // sukses upload
            //Image Resizing
        		$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        		$config['maintain_ratio'] = FALSE;
        		$config['width'] = 128;
        		$config['height'] = 128;

        		$this->load->library('image_lib', $config);

        		if ( ! $this->image_lib->resize()){
        			$this->session->set_flashdata('message', $this->image_lib->display_errors('wer', 'wer'));
        		}
        		$this->mr->updateGambar();
        		//Need to update the session information if email was changed
        		//$this->session->set_userdata('email', $this->input->xss_clean($this->input->post('user_email')));
        		//$this->session->set_flashdata('message', 'Your Profile has been Updated!');
        		redirect(base_url('profil'));
        }
    }




}
