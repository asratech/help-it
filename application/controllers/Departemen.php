<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

  function __construct(){
    parent:: __construct();
    $this->load->model('M_departemen','mdep'); //load model, simpan ke m
    $this->load->model('M_permintaan','mp'); //load model, simpan ke m
  }


	function index(){
    $data['d_departemen']  = $this->mdep->ambilData(); //jalankan fungsi ambilData, simpan ke $data

    $d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('departemen/index', $data); //load index kategori, bypass $data
		$this->load->view('template/footer_js');
    $this->load->view('departemen/ajax_scripts', $data);
    $this->load->view('template/footer');
	}

  function tambah_departemen (){
    $hasil = $this->mdep->tambah_departemen();
    echo json_encode(array("status" => true));
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah tersimpan');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal menambah data ');
    }
  }
  function ubah ($id){
    $data = $this->mdep->ambilDataID($id); //jalankan fungsi ambilData berdasarkan ID, simpan ke $data
    echo json_encode($data);
  }

  public function update_departemen(){
    $hasil = $this->mdep->update_departemen();
    echo json_encode(array("status" => true));
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
  }

  function hapus_departemen($id){
    $hasil = $this->mdep->hapus_departemen($id);
    echo json_encode(array("status" => true));
    if($hasil){
    $this->session->set_flashdata('psn_sukses','Data telah dihapus');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal menghapus data ');
    }
  }

  function hapus($id){
    $hasil = $this->mdep->hapus_departemen($id);
    if($hasil){
    $this->session->set_flashdata('psn_sukses','Data telah dihapus');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal menghapus data ');
    }
    redirect(base_url('departemen'));
  }

}
