<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('M_login','m');
  }
  function index() {
    $this->load->view('login');
  }

  function proses() {
    $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login');
    } else {
      $hasil = $this->m->cekLogin();
      if ($hasil) {
        $this->session->set_flashdata('success', 'Login Berhasil !');
        redirect(base_url('dashboard'));
      }
      else {
        $this->session->set_flashdata('result_login', 'Username atau Password yang anda masukkan salah.');
        redirect(base_url('login'));
      }
    }
  }

  function prosesZ() {
    $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login');
    } else {
      $usr = $this->input->post('username');
      $psw = $this->input->post('password');
      $u = $usr;
      $p = md5($psw);
      $cek = $this->m->cek($u, $p);
      if ($cek->num_rows() > 0) {
        //login berhasil, buat session
        foreach ($cek->result() as $qad) {
          $sess_data['id_user'] = $qad->id_user;
          $sess_data['nama_user'] = $qad->nama_user;
          $sess_data['nama_lengkap'] = $qad->nama_lengkap;
          $sess_data['level'] = $qad->level;
          $sess_data['avatar'] = $qad->avatar;
          $this->session->set_userdata($sess_data);
        }
        $this->session->set_flashdata('success', 'Login Berhasil !');
        redirect(base_url('dashboard'));
      }
      else {
        $this->session->set_flashdata('result_login', 'Username atau Password yang anda masukkan salah.');
        redirect(base_url('login'));
      }
    }
  }
}
