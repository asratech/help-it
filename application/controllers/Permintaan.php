<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('M_permintaan','mp'); //load model, simpan ke m
		$this->load->model('M_identifikasi','mi'); //load model, simpan ke m
		$this->_cek_login();
	}

	function _cek_login()
	{
		if (!isset($this->session->userdata['id_user'])) {
	  redirect(base_url("login"));
	  }
	}

	function index()
	{
		$data = array(
			'd_permintaan' => $this->mp->ambilDataPermintaanbyStatus('waiting')
		);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('permintaan/index', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function tambah()
	{
			$data = array(
				'd_departemen' => $this->mp->ambilDataDepartemen(),
				'd_id' => $this->mp->idPermintaan(),
			);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('permintaan/tambah', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function simpan(){
		$hasil = $this->mp->simpanDataPermintaan();
		if($hasil){
			$this->session->set_flashdata('psn_sukses','Data telah disimpan');
		}
		else {
			$this->session->set_flashdata('psn_error','Gagal menyimpan data ');
		}
		redirect(base_url('permintaan'));
	}

	function ubah($id)
	{
			$data = array(
				'd_departemen' => $this->mp->ambilDataDepartemen(),
				'd_permintaan' => $this->mp->ambilDataPermintaanbyID($id)
			);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('permintaan/ubah', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function update(){
    $hasil = $this->mp->updateDataPermintaan();
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
    redirect(base_url('permintaan'));
  }

	function hapus($id){
    $hasil = $this->mp->hapusDataPermintaan($id);
    if($hasil){
    $this->session->set_flashdata('psn_sukses','Data telah dihapus');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal menghapus data ');
    }
    redirect(base_url('permintaan'));
  }

	function cetak($id){
    $hasil = $this->mp->hapusDataPermintaan($id);
    if($hasil){
    $this->session->set_flashdata('psn_sukses','Data telah dicetak');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mencetak data ');
    }
    redirect(base_url('permintaan'));
  }


	function identifikasi($kode = 0){
		$data = $this->mp->ambilDataPermintaanbyID($kode);

		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('permintaan/identifikasi', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}
	//simpan identifikasi
	//terus ubah status menjadi on progress
	function simpan_identifikasi(){
		$hasil = $this->mi->simpanDataIdentifikasi();
		if($hasil){
			$this->session->set_flashdata('psn_sukses','Pekerjaan telah diidentifikasi');
		}
		else {
			$this->session->set_flashdata('psn_error','Gagal identifikasi pekerjaan');
		}
		redirect(base_url('permintaan'));
	}


}
