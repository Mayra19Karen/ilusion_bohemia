<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GaleriaController extends CI_Controller {

     public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('cookie', 'url'));
		$this->load->library('user_agent');
		date_default_timezone_set('America/Mexico_City');
          $this->load->model('Galeria_model');
          $this->load->helper(array('form', 'url')); 

	}

	

    function ajax_upload()  
    {  
         $data['name']=$this->input->post('name');
         
         if (isset($_FILES['file_img']['name'])) {
              $fileData['upload_path']='upload/galeria';
              $fileData['allowed_types']='jpg|png|jpge|JPG';
              $this->load->library('upload',$fileData);
              $im_name=$this->upload->data();
              $data['file_name'] =$im_name['file_name'];

              if(!$this->upload->do_upload("file_img")) {
                   $this->data['error'] = $this->upload->display_errors();
                   print_r( $this->data['error']);
              } else {
                   $dataInsert = array(
                        'nombre_img' =>$_FILES['file_img']['name'],
                        'isgaleria_img' => 1,
                        'status_img' => 1
                   );
                   $this->Galeria_model->agregarImg($dataInsert); 
                   print_r("success");
              }

         }
   
    }  

    function QuitarImg(){
         
     $json = array('status' => '500');

     $id_img = $this->input->post('id');

     
          $dataImg = array(
          'status_img' => 0
          );
    

     $editImg = $this->Galeria_model->EditarImg($id_img,$dataImg);

               // agregamos el evento
               if ($editImg != false) {
                    $json['status'] = '200';
               }else{
                    $json['status'] = '300';
               }
               echo json_encode($json);
          }

          function VerImagen()
     {
         
		$json = array('status' => '500');

          $id_imagen = $this->input->post('id_img');

         

          $imagen = $this->Galeria_model->getImagen($id_imagen);
          
          $json['imagen'] = $imagen;

				if ($imagen != '') {
                         $json['status'] = '200';
                         $json['imagen'] = $imagen;
                    }else{
                         $json['status'] = '300';
                    }

          echo json_encode($json);

     }

}
