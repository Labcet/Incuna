<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class GeneralController extends CI_Controller {  
	
	public function __construct(){

	parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('GeneralModel');
		$this->load->helper('url');
	}

	/* CARGA PAGINA PRINCIPAL */

	public function Index()
	{
		$data['evento'] = $this->GeneralModel->ShowSelectedEventos();
		$this->load->view("index",$data);
	}

	/* OBTIENE LOS EVENTOS */

	public function AllEventos()
	{   
		$data['evento'] = $this->GeneralModel->ShowAllEventos();
		$this->load->view("general/eventos",$data);
	}

	/* GUARDAR DATOS DEL CONTACTO */

	function ContactoValidation()
	{
		$this->form_validation->set_rules('nombre', 'Nombres', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('mensaje', 'Mensaje', 'required');

		if($this->form_validation->run()){

			echo $this->GeneralModel->ContactoValidation();

		} else {

			echo 'ERROR_VALIDACION';
		}
	}

	/* GUARDAR EL EMAIL DE SUSCRIPCION */

	function SuscriptionValidation()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if($this->form_validation->run()){

			echo $this->GeneralModel->SuscriptionValidation();

		} else {

			echo 'ERROR_VALIDACION';
		}
	}

	/* LOGIN */

	function Login()  
	{  
		if($this->session->userdata('usuario') != ''){

			$this->session->sess_destroy();
		}

		$this->load->view("general/login"); 
	}
}