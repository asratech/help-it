<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('M_permintaan','mp'); //load model, simpan ke m
		$this->load->model('M_identifikasi','md'); //load model, simpan ke m
		$this->load->model('M_refill','mr');
		$this->load->helper('date');
		$this->_cek_login();
	}

	private function _cek_login()
	{
		if (!isset($this->session->userdata['id_user'])) {
	  redirect(base_url("login"));
	  }
	}

	function index()
	{
		$data = array(
			//'pppk' => $this->m->Getpppk('order by no desc')->result_array(),
			'd_permintaan' => $this->mp->ambilDataPermintaan(), //buat ambil join persen dari tb_identifikasi
			'd_refill' => $this->mr->ambilDataRefill()
		);

		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');
		$d_header['total_finished'] = $this->mp->hitungDataPermintaanbyStatus('finished');
		$d_header['total_pekerjaan'] = $this->mp->hitungTotalDataPermintaan();

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('dashboard/index', $data);
		$this->load->view('dashboard/ajax_scripts');
		$this->load->view('template/footer');
	}

	function lihat($kode){
		$did = $this->md->ambilDataIdentifikasibyID($kode);
		$dpk = $this->mp->ambilDataPermintaanbyID($kode);
		$dso = $this->md->ambilDataSolusibyID($kode);

		$data = array(
			'id_identifikasi' => $did->id_identifikasi,
			'dari' => $dpk->dari,
			'tanggal_permintaan' => $dpk->tanggal,
			'departemen' => $dpk->departemen,
			'catatan' => $dpk->catatan,
			'tanggal_identifikasi' => $did->tanggal,
			'identifikasi' => $did->identifikasi,
			'identifikasi_oleh' => $did->oleh,
			'tanggal_solusi' => $dso->tanggal,
			'solusi' => $dso->solusi,
			'solusi_oleh' => $dso->oleh
			);

		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('dashboard/lihat', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function finished()
	{
		$data = array(
			'd_permintaan' => $this->mp->ambilDataPermintaanbyStatus('finished'),
		);
		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');
		$d_header['total_finished'] = $this->mp->hitungDataPermintaanbyStatus('finished');
		$d_header['total_pekerjaan'] = $this->mp->hitungTotalDataPermintaan();

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('dashboard/selesai', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

}
