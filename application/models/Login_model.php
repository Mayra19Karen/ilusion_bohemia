<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {



	public function validarUsusario($usuario,$password)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where("email_user = '$usuario'  and password_user = md5('$password')");
		$query = $this->db->get();
		return ($query->num_rows() != 1) ? NULL : $query->row();
	}


	public function seePersona($usuario)
	{
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->where("correo = '$usuario'");
		$query = $this->db->get();
		return ($query->num_rows() != 1) ? NULL : $query->row();
	}

	public function EditarPwd($usuario,$data)
	{
		$this->db->where("email_user = '$usuario'");
		return $this->db->update('usuario',$data);		
	}
	

}
