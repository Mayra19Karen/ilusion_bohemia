<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model {

	public function getInformacion()
	{
		$this->db->select('*');
		$this->db->from('informacion');
		$query = $this->db->get();
        return ($query->num_rows() <= 0) ? NULL : $query->result();

	}

	
	public function getInfo($id)
	{
		$this->db->select('*');
		$this->db->from('informacion');
		$this->db->where("id_info = '$id' ");
		$query = $this->db->get();
        return ($query->num_rows() <= 0) ? NULL : $query->result();

	}


	public function EditarInfo($id,$data)
	{
		$this->db->where("id_info = '$id'");
		return $this->db->update('informacion',$data);		
	}

}
