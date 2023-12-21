<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilController extends CI_Controller {

     public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('cookie', 'url'));
		$this->load->library('user_agent');
		date_default_timezone_set('America/Mexico_City');
          //$this->load->model('Perfil_model');
          $this->load->model('Login_model');
          $this->load->helper(array('form', 'url')); 

	}

	
    function EditarPwd(){
         
     $json = array('status' => '500');

     $OldPwd = $this->input->post('currentPwd');
     $NewPwd = $this->input->post('NewPwd');

     $datosUsuario = $this->Login_model->validarUsusario($this->session->userdata('email'),$OldPwd);
     if(!empty($datosUsuario)) {
            $data = array(
            'password_user' => md5($NewPwd),            
            );
            $editPwd = $this->Login_model->EditarPwd($this->session->userdata('email'),$data);
            if ($editPwd != false) {
                $json['status'] = '200';
           }else{
                $json['status'] = '500';
           }

     }else{
        /*La contrasenia actual es incorrecta */
        $json['status'] = '300';
     }
     echo json_encode($json);
    }

          
    public function closeSession()
    {
         $this->session->sess_destroy();

              redirect(base_url());
    }

}
