<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {



	public function validaImg($imagen)
	{
		$this->db->select('*');
		$this->db->from('imagen');
		$this->db->where("nombre_img = '$imagen' ");
		$query = $this->db->get();
		return ($query->num_rows() != 1) ? NULL : $query->row();
	}


	public function getCategorias()
	{
		$this->db->select('*');
		$this->db->from('categoria');
		$this->db->where("status_cat = '1'");
		$query = $this->db->get();
        return ($query->num_rows() <= 0) ? NULL : $query->result();

	}

	public function getEventos()
	{
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->where("status_even = '1'");
		$query = $this->db->get();
        return ($query->num_rows() <= 0) ? NULL : $query->result();

	}

	public function getEvento($id)
	{
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->where("status_even = '1'");
		$this->db->where("id_even = '$id' ");
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

	public function agregarEven($data)
	{
		if($this->db->insert('evento',$data))
			return $this->db->insert_id();
		else
			return false;
	}

	public function EditarEven($id,$data)
	{
		$this->db->where("id_even = '$id'");
		return $this->db->update('evento',$data);		
	}

}
