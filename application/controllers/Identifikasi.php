<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('M_identifikasi','mi'); //load model, simpan ke m
		$this->load->model('M_permintaan','mp'); //load model, simpan ke m
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
			//'pppk' => $this->mi->Getpppk('order by no desc')->result_array() //,			'identifikasi' => $this->mi->GetIden('order by no desc')->result_array(),
			'd_identifikasi' => $this->mi->ambilDataIdentifikasiJoin(),
			//'d_identifikasi' => $this->mi->ambilDataIdentifikasibyStatus('On Progress')
		);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('identifikasi/index', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function simpan(){
		$hasil = $this->mi->simpanDataSolusi();
		if($hasil){
			$this->session->set_flashdata('psn_sukses','Data telah disimpan');
		}
		else {
			$this->session->set_flashdata('psn_error','Gagal menyimpan data ');
		}
		redirect(base_url('identifikasi/index'));
	}

	function solusi($kode){
		$did = $this->mi->ambilDataIdentifikasibyID($kode);
		$dpk = $this->mp->ambilDataPermintaanbyID($kode);

		$data = array(
			'id_identifikasi' => $did->id_identifikasi,
			'dari' => $dpk->dari,
			'tanggal_permintaan' => $dpk->tanggal,
			'departemen' => $dpk->departemen,
			'catatan' => $dpk->catatan,
			'tanggal_identifikasi' => $did->tanggal,
			'identifikasi' => $did->identifikasi,
			'oleh' => $did->oleh
			);

		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('identifikasi/solusi', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function update($kode){
		$did = $this->mi->ambilDataIdentifikasibyID($kode);
		$dpk = $this->mp->ambilDataPermintaanbyID($kode);

		$data = array(
			'id_permintaan' => $dpk->id_permintaan,
			'dari' => $dpk->dari,
			'tanggal_permintaan' => $dpk->tanggal,
			'departemen' => $dpk->departemen,
			'catatan' => $dpk->catatan,
			'tanggal_identifikasi' => $did->tanggal,
			'identifikasi' => $did->identifikasi,
			'oleh' => $did->oleh,
			'persentase' => $did->persentase
			);

		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('identifikasi/update', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function simpan_update(){
    $hasil = $this->mi->updateDataIdentifikasi();
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
    redirect(base_url('identifikasi'));
  }

}
