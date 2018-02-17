<?php
  class M_Login extends CI_Model {

      function cekLogin() {
        $usr = $this->input->post('username');
        $psw = $this->input->post('password');
        $u = $usr;
        $p = md5($psw);

        $this->db->where("nama_user", $u);
        $this->db->where("pass_user", $p);

        $query = $this->db->get("tb_user");
        if($query->num_rows()>0){
          foreach ($query->result() as $qad) {
            $sess_data['id_user'] = $qad->id_user;
            $sess_data['nama_user'] = $qad->nama_user;
            $sess_data['nama_lengkap'] = $qad->nama_lengkap;
            $sess_data['level'] = $qad->level;
            $sess_data['avatar'] = $qad->avatar;
            $this->session->set_userdata($sess_data);
          }
          return true;
        }
        else {
          return false;
        }
      }


  }
?>
