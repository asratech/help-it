<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Refill extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('M_refill','mr'); //load model, simpan ke m
 	  $this->load->model('M_permintaan','mp');
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
			'd_refill' => $this->mr->ambilDataRefill()
		);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('refill/index', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function tambah()
	{
			$data = array(
				'd_departemen' => $this->mp->ambilDataDepartemen(),
				//'d_id' => $this->mp->idPermintaan(),
			);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('refill/tambah', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function simpan(){
		$hasil = $this->mr->simpanDataRefill();
		if($hasil){
			$this->session->set_flashdata('psn_sukses','Data telah disimpan');
		}
		else {
			$this->session->set_flashdata('psn_error','Gagal menyimpan data ');
		}
		redirect(base_url('refill'));
	}

	function ubah($id)
	{
			$data = array(
				'd_departemen' => $this->mp->ambilDataDepartemen(),
				'd_refill' => $this->mr->ambilDataRefillbyID($id)
			);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('refill/ubah', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function update(){
    $hasil = $this->mr->updateDataRefill();
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
    redirect(base_url('refill'));
  }

	function hapus($id){
    $hasil = $this->mr->hapusDataRefill($id);
    if($hasil){
    $this->session->set_flashdata('psn_sukses','Data telah dihapus');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal menghapus data ');
    }
    redirect(base_url('refill'));
  }

	function refill($id)
	{
			$data = array(
				'd_departemen' => $this->mp->ambilDataDepartemen(),
				'd_refill' => $this->mr->ambilDataRefillbyID($id)
			);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('refill/refill', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function refilling(){
    $hasil = $this->mr->refilling();
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
    redirect(base_url('refill'));
  }

	function hitungSelisihTanggal($tgl_awal)
	{
		$this->load->helper('date');
		$tgl_sekarang=mdate('%Y-%m-%d');
		$range = date_range($tgl_awal, $tgl_sekarang);
		$jumlah=0;
		foreach ($range as $date)
		{
			$jumlah=$jumlah+1;
		}
		return $jumlah;
	}




}
