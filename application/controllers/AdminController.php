<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

     public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('cookie', 'url'));
		$this->load->library('user_agent');
		date_default_timezone_set('America/Mexico_City');		         
		$this->load->model('Login_model');
          $this->load->model('Admin_model');
          $this->load->model('Info_model');
          $this->load->model('Galeria_model');
          $this->load->helper(array('form', 'url')); 

	}

	
	public function Eventos()
	{        
          if(empty($this->session->userdata('email')))
			redirect(base_url().'login');

          $categorias = $this->Admin_model->getCategorias();
          $eventos = $this->Admin_model->getEventos();
          $data = array(
          'opcionMenu' => 'Eventos',
          'categorias' => $categorias,
          'eventos' =>$eventos
          );

          
		$this->load->view('admin/eventos',$data); 
	}


     function AboutUs()
     {
                    $data = array(
                         'opcionMenu' => 'Sobre'
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
                    $this->load->view('admin/galeria',$data);
              
     }

     function Informacion()
     {
                    $textos = $this->Info_model->getInformacion();                    

                    $data = array(
                         'opcionMenu' => 'Info',
                         'textos'=>$textos
                    );
                    $this->load->view('admin/info',$data);
              
     }

     function MiCuenta()
     {
                    //$textos = $this->Info_model->getInformacion();              

                    $data = array(
                         'opcionMenu' => 'MiCuenta',
                         'username'=>$this->session->userdata('email'),
                         'nombre'=>$this->session->userdata('nombre'),
                         'apellidos'=>$this->session->userdata('apellidos'),
                    );
                   
                     $this->load->view('admin/perfil',$data);
              
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

     function ajax_upload()  
     {  
          $data['name']=$this->input->post('name');
          
          if (isset($_FILES['file_img']['name'])) {
               $fileData['upload_path']='upload';
               $fileData['allowed_types']='jpg|png|jpge|JPG';
               $this->load->library('upload',$fileData);
               //$this->upload->do_upload("file_img");
               $im_name=$this->upload->data();
               $data['file_name'] =$im_name['file_name'];

               if(!$this->upload->do_upload("file_img")) {
                    $this->data['error'] = $this->upload->display_errors();
                    print_r( $this->data['error']);
               } else {
                    $dataInsert = array(
                         'nombre_img' =>$_FILES['file_img']['name'],
                         'isgaleria_img' => 0,
                         'status_img' => 1
                    );
                    $this->Admin_model->agregarImg($dataInsert); 
                    print_r("success");
               }

          }else if (isset($_FILES['file_img2']['name'])) {
               $fileData['upload_path']='upload';
               $fileData['allowed_types']='jpg|png|jpge|JPG';
               $this->load->library('upload',$fileData);
               //$this->upload->do_upload("file_img");
               $im_name=$this->upload->data();
               $data['file_name'] =$im_name['file_name'];

               if(!$this->upload->do_upload("file_img2")) {
                    $this->data['error'] = $this->upload->display_errors();
                    print_r( $this->data['error']);
               } else {
                    $dataInsert = array(
                         'nombre_img' =>$_FILES['file_img2']['name'],
                         'isgaleria_img' => 0,
                         'status_img' => 1
                    );
                    $this->Admin_model->agregarImg($dataInsert); 
                    print_r("success");
               }
          }
    
     }  
     
	function AgregarEvento()
     {
         
		$json = array('status' => '500');

          $nom_even = $this->input->post('nombre');
		$id_cat = $this->input->post('categoria');
          $lugar_even = $this->input->post('lugar');
          $hora_even = $this->input->post('hora');
          $fec_even = $this->input->post('fecha');
          $desc_even = $this->input->post('descripcion');
          $imagen_even = $this->input->post('imagen');

          /*haremos una consulta para obtener el id de la img */
         

          $dataEvento = array(
               'nom_even' => $nom_even,
               'id_cat' => $id_cat,
               'lugar_even' => $lugar_even,
               'hora_even' => $hora_even,
               'fec_even' => $fec_even,
               'desc_Even' => $desc_even,
               'imagen_even' => $imagen_even,
               'status_even' => 1
          );

          $addEvent = $this->Admin_model->agregarEven($dataEvento);

				// agregamos el evento
				if ($addEvent != false) {
                         $json['status'] = '200';
                    }else{
                         $json['status'] = '300';
                    }

     }

     function EditarEven(){
         
		$json = array('status' => '500');

          $id_even = $this->input->post('id');
          $nom_even = $this->input->post('nombre');
		$id_cat = $this->input->post('categoria');
          $lugar_even = $this->input->post('lugar');
          $hora_even = $this->input->post('hora');
          $fec_even = $this->input->post('fecha');
          $desc_even = $this->input->post('descripcion');
          $imagen_even = $this->input->post('imagen');

          /*haremos una consulta para obtener el id de la img */
         if($imagen_even!=''){
               $dataEvento = array(
               'nom_even' => $nom_even,
               'id_cat' => $id_cat,
               'lugar_even' => $lugar_even,
               'hora_even' => $hora_even,
               'fec_even' => $fec_even,
               'desc_Even' => $desc_even,
               'imagen_even' => $imagen_even,
               'status_even' => 1
               );
         }else{
          $dataEvento = array(
               'nom_even' => $nom_even,
               'id_cat' => $id_cat,
               'lugar_even' => $lugar_even,
               'hora_even' => $hora_even,
               'fec_even' => $fec_even,
               'desc_Even' => $desc_even,
               'status_even' => 1
               );
         }

          $editEvent = $this->Admin_model->EditarEven($id_even,$dataEvento);

				// agregamos el evento
				if ($editEvent != false) {
                         $json['status'] = '200';
                    }else{
                         $json['status'] = '300';
                    }
                    echo json_encode($json);
     }

     function QuitarEven(){
         
		$json = array('status' => '500');

          $id_even = $this->input->post('id');

          
               $dataEvento = array(
               'status_even' => 0
               );
         

          $editEvent = $this->Admin_model->EditarEven($id_even,$dataEvento);

				// agregamos el evento
				if ($editEvent != false) {
                         $json['status'] = '200';
                    }else{
                         $json['status'] = '300';
                    }
                    echo json_encode($json);
     }

     function VerEvento()
     {
         
		$json = array('status' => '500');

          $id_even = $this->input->post('id_even');

         

          $evento = $this->Admin_model->getEvento($id_even);
          
          $json['evento'] = $evento;

				if ($evento != '') {
                         $json['status'] = '200';
                         $json['evento'] = $evento;
                    }else{
                         $json['status'] = '300';
                    }

          echo json_encode($json);

     }

}
