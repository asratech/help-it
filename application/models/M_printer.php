<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_departemen extends CI_Model{

  public function ambilData(){
    $this->db->order_by('nama_departemen','asc');
    $query = $this->db->get('tb_departemen');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

  function tambah_departemen(){
    $field = array(
      'nama_departemen' => $this->input->post('txt_departemen')
    );
    $this->db->insert('tb_departemen', $field);
    if($this->db->affected_rows() > 0){
      return true;
    }
    else {
      return false;
    }
  }


  function ambilDataID($id){
     $this->db->where('id_departemen', $id);
     $query = $this->db->get('tb_departemen');
     if($query->num_rows()>0)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
  }

  function update_departemen(){
    $id = $this->input->post('txt_id');
    $field = array(
      'nama_departemen' => $this->input->post('txt_departemen')
    );
    $this->db->where('id_departemen', $id);
    $this->db->update('tb_departemen', $field);

    if($this->db->affected_rows() > 0){
      return true;
    }else {
      return false;
    }
  }

  function hapus_departemen($id){
		$this->db->where('id_departemen', $id);
		$this->db->delete('tb_departemen');
		if($this->db->affected_rows() > 0){
			return true;
		}else {
			return false;
		}
	}




}
?>
