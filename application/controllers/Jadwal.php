<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_permintaan','mp'); //load model, simpan ke m
		$this->load->model('M_identifikasi','md'); //load model, simpan ke m
		$this->load->model('M_jadwal');
		$this->_cek_login();
	}

	private function _cek_login()
	{
		if (!isset($this->session->userdata['id_user'])) {
	  redirect(base_url("login"));
	  }
	}


		/*Home page Calendar view  */
	function index()
		{
			$data = array(
				//'pppk' => $this->m->Getpppk('order by no desc')->result_array(),
				'd_permintaan' => $this->mp->ambilDataPermintaan() //buat ambil join persen dari tb_identifikasi
			);

			$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
			$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

			$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
			$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');
			$d_header['total_finished'] = $this->mp->hitungDataPermintaanbyStatus('finished');
			$d_header['total_pekerjaan'] = $this->mp->hitungTotalDataPermintaan();

			$this->load->view('template/header',$d_header);
			$this->load->view('template/leftside');
			$this->load->view('jadwal/index');
			$this->load->view('jadwal/ajax_scripts');
			$this->load->view('template/footer');
		}

		function edit()
			{
				$data = array(
					//'pppk' => $this->m->Getpppk('order by no desc')->result_array(),
					'd_permintaan' => $this->mp->ambilDataPermintaan() //buat ambil join persen dari tb_identifikasi
				);

				$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
				$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

				$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
				$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');
				$d_header['total_finished'] = $this->mp->hitungDataPermintaanbyStatus('finished');
				$d_header['total_pekerjaan'] = $this->mp->hitungTotalDataPermintaan();

				$this->load->view('template/header',$d_header);
				$this->load->view('template/leftside');
				$this->load->view('jadwal/index');
				$this->load->view('jadwal/ajax_scripts_enable_edit');
				$this->load->view('template/footer');
			}

		/*Get all Events */

		Public function getEvents()
		{
			$result=$this->M_jadwal->getEvents();
			echo json_encode($result);
		}
		/*Add new event */
		Public function addEvent()
		{
			$result=$this->M_jadwal->addEvent();
			echo $result;
		}
		/*Update Event */
		Public function updateEvent()
		{
			$result=$this->M_jadwal->updateEvent();
			echo $result;
		}
		/*Delete Event*/
		Public function deleteEvent()
		{
			$result=$this->M_jadwal->deleteEvent();
			echo $result;
		}
		Public function dragUpdateEvent()
		{

			$result=$this->M_jadwal->dragUpdateEvent();
			echo $result;
		}

}
