<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

     public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('cookie', 'url'));
		$this->load->library('user_agent');
		date_default_timezone_set('America/Mexico_City');		         
		$this->load->model('Login_model');          
          $this->load->model('Info_model');
          $this->load->model('Galeria_model');          
          $this->load->model('Admin_model');
	}

	
	public function index()
	{                 
          $texto = $this->Info_model->getInfo('1'); 
          $data = array(
          'opcionMenu' => 'Inicio',
          'texto_titulo'=>$texto[0]->titulo_info,
          'texto_desc'=>$texto[0]->desc_info
          );
		$this->load->view('welcome_message',$data); 
	}

	function latLanLocation()
     {

                    $this->load->view('location');
              
     }

     function AboutUs()
     {
          $texto = $this->Info_model->getInfo('2'); 
                    $data = array(
                         'opcionMenu' => 'Sobre',
                         'texto_titulo'=>$texto[0]->titulo_info,
                         'texto_desc'=>$texto[0]->desc_info
                    );
                    $this->load->view('about_us',$data);
              
     }

     function Galeria()
     {
                    $imagenes = $this->Galeria_model->getImagenes();
                    $data = array(
                         'opcionMenu' => 'Galeria',
                         'imagenes' => $imagenes
                    );
                    $this->load->view('galeria',$data);
              
     }

     function Calendario()
     {
          
          $eventos = $this->Admin_model->getEventos(); 
          $categorias = $this->Admin_model->getCategorias();
                    $data = array(
                         'opcionMenu' => 'Calendario',
                         'categorias' => $categorias,
                         'eventos' =>$eventos
                    );
                    $this->load->view('calendario',$data);
              
     }

     function Login()
     {
          $data = array(
               'opcionMenu' => 'Inicio'
               );
           $this->load->view('admin/login',$data);
              
     }

     function LoginAdmin()
     {
          $json = array('status' => '500');
          $name = $this->input->post('user');
		$pass = $this->input->post('pass');
          
		$datosUsuario = $this->Login_model->validarUsusario($name,$pass);

          if(!empty($datosUsuario)) {
               $status =$datosUsuario->status_user;
               if($status==1){
                    $session = array(
					'email'=>$datosUsuario->email_user,
					'nombre'=>$datosUsuario->nombre_user,
					'apellidos'=>$datosUsuario->apellidos_user,
					'fecregistro'=>$datosUsuario->fec_creacion
				);
				$this->session->set_userdata($session);

                    $json = array('status' => '200');
               }else{
                    $json = array('status' => '300');
               }
          }

          

          echo json_encode($json);
     }

     

}
