<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_profil extends CI_Model {

		function updateProfil($id){
			$nama_user = $this->input->post('txt_username');
			$nama_lengkap= $this->input->post('txt_name');
			$data = array(
				'nama_user' => $nama_user,
				'nama_lengkap' => $nama_lengkap
			);
	    $this->db->where('id_user', $id);
			$this->db->update('tb_user', $data);
			if($this->db->affected_rows() > 0){
				$this->session->set_userdata('nama_user', $nama_user);
				$this->session->set_userdata('nama_lengkap', $nama_lengkap);
	 			return true;
	 		} else {
	 			return false;
	 		}
	  }

		function updatePassword(){
			$id = $this->session->userdata('id_user');
			$pass = $this->input->post('txt_pass1');
			$data = array(
				'pass_user' => md5($pass)
			);
	    $this->db->where('id_user', $id);
			$this->db->update('tb_user', $data);
			if($this->db->affected_rows() > 0){
	 			return true;
	 		} else {
	 			return false;
	 		}
	  }

		function updateGambar(){
				//$relative_url = './avatar/'. $this->upload->file_name;
				//check if password was updated
				$data = array (
					'avatar' => './avatar/'. $this->upload->file_name
				);
 				$id = $this->session->userdata('id_user');
				$this->db->where('id_user', $id);
				$this->db->update('tb_user', $data);
				if($this->db->affected_rows() > 0){
					$this->session->set_userdata('avatar', './avatar/'. $this->upload->file_name);
					return true;
		 		} else {
		 			return false;
		 		}
			}




}
