<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InfoController extends CI_Controller {

     public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('cookie', 'url'));
		$this->load->library('user_agent');
		date_default_timezone_set('America/Mexico_City');
          $this->load->model('Info_model');
          $this->load->helper(array('form', 'url')); 

	}

	


     function EditarTexto(){
         
		$json = array('status' => '500');

          $id_info = $this->input->post('id');
          $titulo_info = $this->input->post('titulo');
		  $desc_info = $this->input->post('desc');

               $dataInf = array(
               'id_info' => $id_info,
               'titulo_info' => $titulo_info,
               'desc_info' => $desc_info
               );
         

          $editText = $this->Info_model->EditarInfo($id_info,$dataInf);

				// agregamos el evento
				if ($editText != false) {
                         $json['status'] = '200';
                    }else{
                         $json['status'] = '300';
                    }
                    echo json_encode($json);
     }



     function VerTexto()
     {
         
		$json = array('status' => '500');

          $id_info = $this->input->post('id_info');       

          $texto = $this->Info_model->getInfo($id_info);
          
          $json['texto'] = $texto;

				if ($texto != '') {
                         $json['status'] = '200';
                         $json['texto'] = $texto;
                    }else{
                         $json['status'] = '300';
                    }

          echo json_encode($json);

     }

}
