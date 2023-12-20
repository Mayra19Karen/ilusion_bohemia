<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria_model extends CI_Model {



	public function getImagen($id)
	{
		$this->db->select('*');
		$this->db->from('imagen');
		$this->db->where("id_img = $id ");
		$query = $this->db->get();
		return ($query->num_rows() != 1) ? NULL : $query->row();
	}


	public function getImagenes()
	{
		$this->db->select('*');
		$this->db->from('imagen');
		$this->db->where("status_img = '1'");
        $this->db->where("isgaleria_img = '1'");
		$query = $this->db->get();
        return ($query->num_rows() <= 0) ? NULL : $query->result();

	}


	
    public function agregarImg($data)
	{
		if($this->db->insert('imagen',$data))
			return $this->db->insert_id();
		else
			return false;
	}

	public function getIdImg($name)
	{
		$this->db->select('id_img');
		$this->db->from('imagen');
		$this->db->where("nombre_img = '$name' ");
		$this->db->limit(1);
		$query = $this->db->get();
		return ($query->num_rows() <= 0) ? NULL : $query->row();

	}


	public function EditarImg($id,$data)
	{
		$this->db->where("id_img = '$id'");
		return $this->db->update('imagen',$data);		
	}

}
