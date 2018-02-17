<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_model extends CI_Model {


/*
	public function GetBagian($where= "") {
		$data = $this->db->query('select * from tb_bagian '.$where);
		return $data;
	}



	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	function detail(){
		$query= "SELECT * FROM tb_bagian";
		return $this->db->query($query);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	function UpdatePppk($data){
        $this->db->where('no',$data['no']);
        $this->db->update('tb_pppk',$data);
    }

    function GetUser($where = ''){
		return $this->db->query("select * from tb_login $where;");
	}
	/*
	//USer
	public function ajaxBagian($params = array())
	{

		$this->db->select('id_bagian, bagian');
		$this->db->from('tb_bagian');
		$ret = $this->db->get();
		return $ret->result_array();
	}

	public function ajaxDivisi($params = array())
	{
		if (isset($params['bagian_id'])) {
			$this->db->where('bagian_id', $params['bagian_id']);
		}

		$this->db->select('id_divisi, bagian_id, divisi');
		$this->db->from('tb_divisi');
		$ret = $this->db->get();
		return $ret->result_array();
	}
	*/
/*
	public function ajaxBagian($params = array())
	{

		$this->db->select('id_bagian, bagian');
		$this->db->from('tb_bagian');
		$ret = $this->db->get();
		return $ret->result_array();
	}

	public function ajaxDivisi($params)
	{
		// if (isset($params['bagian'])) {
		// 	$this->db->where('bagian', $params['bagian']);
		// }
		$this->db->select('id_divisi, bagian_id, divisi, tb_bagian.bagian as bagian');
		$this->db->where('bagian', $params);
		$this->db->from('tb_divisi');
		$this->db->join('tb_bagian', 'tb_bagian.id_bagian = tb_divisi.bagian_id');
		$ret = $this->db->get();

		echo $this->db->last_query();
		return $ret->result_array();
	}


	// Batas User

	public function GetIden($where= "") {
		$data = $this->db->query('select * from tb_iden '.$where);
		return $data;
	}

*/


  //=======================
	//function permintaan
	//=======================
	function idPermintaan(){
		$q = $this->db->query("select MAX(RIGHT(id_permintaan,5)) as kd_max from tb_permintaan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "PK-".$kd;
	}

	function ambilDataDepartemen(){
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

	function ambilDataPermintaan(){
    $query = $this->db->get('tb_permintaan');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }



	function ambilDataPermintaanbyStatus($status){
		$this->db->where('status', $status);
		//$this->db->order_by('id_permintaan','asc');
    $query = $this->db->get('tb_permintaan');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }



	function ambilDataPermintaanbyStatusJoin($status){
 		$this->db->select('*');
		//$this->db->select('tb_permintaan.id_permintaan, tb_permintaan.catatan, tb_status, tb_identifikasi.persen');
		$this->db->where('tb_permintaan.status',$status);
		$this->db->from('tb_permintaan');
		$this->db->join('tb_identifikasi', 'tb_permintaan.id_permintaan = tb_identifikasi.id_identifikasi');

		//$this->db->order_by('id_permintaan','asc');
    $query = $this->db->get('');
    //if($query->num_rows()>0)
    //{
      return $query->result();
    //}
    //else
    //{
    //  return false;
  //  }
  }

	function hitungTotalDataPermintaan(){
		//$this->db->where('status', $status);
		//$this->db->order_by('id_permintaan','asc');
    $query = $this->db->get('tb_permintaan');
		$total=$query->num_rows();
    if($query->num_rows()>0)
    {
      return $total;
    }
    else
    {
      return false;
    }
  }
	function hitungDataPermintaanbyStatus($status){
		$this->db->where('status', $status);
		//$this->db->order_by('id_permintaan','asc');
    $query = $this->db->get('tb_permintaan');
		$total=$query->num_rows();
    if($query->num_rows()>0)
    {
      return $total;
    }
    else
    {
      return false;
    }
  }

	function insertData($table, $data){
		return $this->db->insert($table, $data);
	}

	function ambilDataPermintaanbyID($id){
     $this->db->where('id_permintaan', $id);
     $query = $this->db->get('tb_permintaan');
     if($query->num_rows()>0)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
  }

	function simpanDataPermintaan(){
		$id = $this->input->post('txt_id');
 		$dari = $this->input->post('txt_dari');
 		$departemen = $this->input->post('opt_departemen');
 		$catatan = $this->input->post('txt_catatan');
 		$tanggal = $this->input->post('txt_tgl');

		$data = array(
			'id_permintaan'=> $id,
			'dari' => $dari,
			'departemen' => $departemen,
			'catatan' => $catatan,
			'tanggal' => $tanggal,
			);

		$this->db->insert('tb_permintaan', $data);
    if($this->db->affected_rows() > 0){
      return true;
    }
    else {
      return false;
    }
	}

	function updateDataPermintaan(){
		$id = $this->input->post('txt_id');
 		$dari = $this->input->post('txt_dari');
 		$departemen = $this->input->post('opt_departemen');
 		$catatan = $this->input->post('txt_catatan');
 		$tanggal = $this->input->post('txt_tgl');

 		$data = array(
 			'dari' => $dari,
 			'departemen' => $departemen,
 			'catatan' => $catatan,
 			'tanggal' => $tanggal
 			);

    $this->db->where('id_permintaan', $id);
    $this->db->update('tb_permintaan', $data);
    if($this->db->affected_rows() > 0){
      return true;
    }else {
      return false;
    }
  }

	function hapusDataPermintaan($id){
		$this->db->where('id_permintaan', $id);
		$this->db->delete('tb_permintaan');
		if($this->db->affected_rows() > 0){
			return true;
		}else {
			return false;
		}
	}



	//=======================
	//function identifikasi
	//=======================

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
