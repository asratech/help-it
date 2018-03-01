<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_refill extends CI_Model {

	function ambilDataRefill(){
		$this->db->order_by('refill_terakhir','asc');
    $query = $this->db->get('tb_refill');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

	function ambilDataRefillbyID($id){
		$this->db->where('id_refill',$id);
    $query = $this->db->get('tb_refill');
    if($query->num_rows()>0)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  }

	function simpanDataRefill(){
 		$departemen = $this->input->post('opt_departemen');
 		$printer = $this->input->post('txt_printer');

		$data = array(
			'printer' => $printer,
			'departemen' => $departemen
			);

		$this->db->insert('tb_refill', $data);
    if($this->db->affected_rows() > 0){
			print_r($data);
      return true;
    }
    else {
			print_r($data);
      return false;
    }
	}

	function updateDataRefill(){
		$id = $this->input->post('txt_id');
 		$departemen = $this->input->post('opt_departemen');
 		$printer = $this->input->post('txt_printer');
 		$data = array(
 			'departemen' => $departemen,
 			'printer' => $printer
 			);

    $this->db->where('id_refill', $id);
    $this->db->update('tb_refill', $data);
    if($this->db->affected_rows() > 0){
      return true;
    }else {
      return false;
    }
  }

	function Refilling(){
		$id = $this->input->post('txt_id');
		$oleh = $this->input->post('txt_oleh');
		$tanggal = $this->input->post('txt_refill_terakhir');
 		$data = array(
 			'refill_terakhir' => $tanggal,
			'oleh' => $oleh
 			);

    $this->db->where('id_refill', $id);
    $this->db->update('tb_refill', $data);
    if($this->db->affected_rows() > 0){
      return true;
    }else {
      return false;
    }
  }


	function hapusDataRefill($id){
		$this->db->where('id_refill', $id);
		$this->db->delete('tb_refill');
		if($this->db->affected_rows() > 0){
			return true;
		}else {
			return false;
		}
	}

}
