<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_identifikasi extends CI_Model {

	function ambilDataIdentifikasi(){
		$this->db->order_by('id_identifikasi','asc');
    $query = $this->db->get('tb_identifikasi');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

 function ambilDataIdentifikasiJoin(){
	    $this->db->select('tb_identifikasi.id_identifikasi, tb_identifikasi.tanggal, tb_identifikasi.identifikasi, tb_identifikasi.status, tb_identifikasi.oleh, tb_identifikasi.persentase, tb_permintaan.dari, tb_permintaan.departemen');
 			$this->db->where('tb_identifikasi.status','On Progress');
			$this->db->from('tb_identifikasi');
	    $this->db->join('tb_permintaan', 'tb_permintaan.id_permintaan = tb_identifikasi.id_identifikasi');
	    $query = $this->db->get();
	    if($query->num_rows()>0)
	    {
	      return $query->result();
	    }
	    else
	    {
	      return false;
	    }
	  }

	function ambilDataIdentifikasibyID($id){
		$this->db->where('id_identifikasi',$id);
    $query = $this->db->get('tb_identifikasi');
    if($query->num_rows()>0)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  }

	function ambilDataIdentifikasibyStatus($status){
		$this->db->where('status', $status);
		//$this->db->order_by('id_permintaan','asc');
		$query = $this->db->get('tb_identifikasi');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function simpanDataIdentifikasi(){
		$id = $this->input->post('txt_id');
		$identifikasi = $this->input->post('txt_identifikasi');
		$tanggal = $this->input->post('txt_tanggal_identifikasi');
		$oleh = $this->session->userdata['nama_lengkap'];

		$data = array(
			'id_identifikasi'=> $id,
			'identifikasi' => $identifikasi,
			'tanggal' => $tanggal,
			'oleh' => $oleh,
			'persentase' => '25%'
			);
		$this->db->insert('tb_identifikasi', $data);
    if($this->db->affected_rows() > 0){
			$this->updateStatusPekerjaan($id,'On Progress');
      return true;
    }
    else {
      return false;
    }
	}

	public function updateDataIdentifikasi(){
		$id = $this->input->post('txt_id');
		$identifikasi = $this->input->post('txt_identifikasi');
		$tanggal = $this->input->post('txt_tanggal_identifikasi');
		$oleh = $this->session->userdata['nama_lengkap'];
		$persen_lama = $this->input->post('txt_persentase');

		if($persen_lama=='25%'){
			$persentase='50%';
		}elseif($persen_lama=='50%'){
			$persentase='75%';
		}else {
			$persentase='75%';
		}

		$data = array(
			'id_identifikasi'=> $id,
			'identifikasi' => $identifikasi,
			'tanggal' => $tanggal,
			'oleh' => $oleh,
			'persentase' => $persentase
			);

    $this->db->where('id_identifikasi', $id);
    $this->db->update('tb_identifikasi', $data);
    if($this->db->affected_rows() > 0){
      return true;
    }else {
      return false;
    }
  }


	function updateStatusPekerjaan($id,$status){
		$data = array(
			'status' => $status
		);
    $this->db->where('id_permintaan', $id);
		$this->db->update('tb_permintaan', $data);
		if($this->db->affected_rows() > 0){
 			return true;
 		} else {
 			return false;
 		}
  }

	function updateStatusIdentifikasi($id,$status){
		$data = array(
			'status' => $status,
			'persentase' => '100%'
		);
    $this->db->where('id_identifikasi', $id);
		$this->db->update('tb_identifikasi', $data);
		if($this->db->affected_rows() > 0){
 			return true;
 		} else {
 			return false;
 		}
  }

	function ambilDataSolusibyID($id){
     $this->db->where('id_solusi', $id);
     $query = $this->db->get('tb_solusi');
     if($query->num_rows()>0)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
  }

		function simpanDataSolusi(){
			$id = $this->input->post('txt_id');
			$dari = $this->input->post('txt_dari');
			$solusi = $this->input->post('txt_solusi');
			$tanggal = $this->input->post('txt_tanggal_solusi');
			$oleh = $this->session->userdata['nama_lengkap'];

			$data = array(
				'id_solusi'=> $id,
				'tanggal' => $tanggal,
				'oleh' => $oleh,
				'solusi' => $solusi
				);
			$this->db->insert('tb_solusi', $data);
	    if($this->db->affected_rows() > 0){
				$this->updateStatusPekerjaan($id,'Finished');
				$this->updateStatusIdentifikasi($id,'Finished');
	      return true;
	    }
	    else {
	      return false;
	    }
		}

}
