<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

 function __construct() {
  parent::__construct();
  if (!isset($this->session->userdata['id_user'])) {
  redirect(base_url("login"));
  }
 }

 public function index() {
  $this->load->view('dashboard');
 }
 function logout(){
  $this->session->sess_destroy();
  redirect(base_url('login'));
 }
}
