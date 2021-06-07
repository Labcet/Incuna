<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class MentorController extends CI_Controller { 

	public function __construct(){

          parent::__construct();
          $this->load->library('form_validation');
          $this->load->model('MentorModel');
          $this->load->helper(array('download','url'));
     }

     /* VALIDA EL LOGIN MENTOR */

     function LoginValidation()  
     {  
          $this->form_validation->set_rules('usuario_mentor', 'Usuario', 'required');
          $this->form_validation->set_rules('password_mentor', 'Password', 'required');

          if($this->form_validation->run())
          {
               $usuario = $this->input->post('usuario_mentor');
               $password = $this->input->post('password_mentor');
               
               if($this->MentorModel->LoginMentor($usuario, $password))  
               { 
                    $session_data = array(  
                         'usuario'=> $usuario,
                         'password'=> $password,
                         'rol' => 'mentor',
                    );  
                    $this->session->set_userdata($session_data);
                    $this->MentorModel->log($this->session->userdata('usuario'),"LoginMentor","LoginValidation");
                    echo 'EXITO';
               }  
               else  
               {  
                    echo 'ERROR_LOGEO';
               }  
          }  
          else  
          {  
               echo 'ERROR_VALIDACION';
          }  
     }  

     /* LOGOUT MENTOR */

     function MentorLogout()
     {
          $this->session->sess_destroy();
          redirect(base_url() . 'MentorController/Login');
     }
     
     /* LOGIN MENTOR */
     
     function Login()
     {  
          if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'mentor')  
          {
               $this->session->sess_destroy();
          }
          $this->load->view("general/login"); 
     }

     /* MUESTRA LA VISTA DEL MENTOR */

     function Enter(){

          if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'mentor')  
          {  
               $mentor = $this->MentorModel->recupera_id($this->session->userdata('usuario'));
               $data['uname'] = $this->session->userdata('usuario');
               $data['ideas_asignadas'] = $this->MentorModel->VerIdeasAsignadas($mentor[0]->Id);
               $this->load->view('mentor/dashboard', $data);
          }  
          else  
          {  
               redirect(base_url() . 'MentorController/Login');  
          } 
     }

     /* MUESTRA EL PERFIL DEL MENTOR */

     function PerfilShow()
     {
          if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'mentor')
		{
			$data['uname'] = $this->session->userdata('usuario');
			$data['mentorData'] = $this->MentorModel->MentorData($this->session->userdata('usuario'));
			$this->load->view("mentor/perfil_mentor", $data);
		}
		else
		{
			redirect(base_url().'MentorController/Login');
		}
     }

     /* ACTUALIZA EL PERFIL DEL ESTUDIANTE */

	function PerfilUpdate()
	{    
          if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'mentor')
          {
               $this->load->library('form_validation');
               $this->form_validation->set_rules('email', 'Email', 'valid_email');
               if($this->form_validation->run())
               {
                    if($this->MentorModel->ActualizaMentorData($this->session->userdata('usuario')))
                    {
                         $this->MentorModel->log($this->session->userdata('usuario'),"Update Mentor Perfil","PerfilUpdate");
                         echo 'EXITO';
                    }
                    else
                    {
                         echo 'ERROR_ACTUALIZACION';
                    }
               }
               else
               {
                    echo 'ERROR_VALIDACION';
               }
          } else {

               redirect(base_url().'MentorController/Login');
          }
	}

     /* DESCARGA CANVAS */

     function DescargaCanvas($IdIdea)
     {    
          if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'mentor')
          {
               $FileName = $this->MentorModel->ObtenerIdea($IdIdea);
               $data = file_get_contents('./canvas/'.$FileName[0]->CanvasFile);
               force_download($FileName[0]->CanvasFile,$data);
          } else {

               redirect(base_url().'MentorController/Login');
          }
     }

     /* ACEPTAR IDEA */

     function AceptarIdea($IdIdea)
     {
          if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'mentor')
          {
               if($this->MentorModel->AceptarIdea($IdIdea)){
                    $this->Enter();
               } else {
                    echo "Error";
               }
          } else {

               redirect(base_url().'MentorController/Login');
          }
     }

     /* RECHAZAR IDEA */

     function RechazarIdea($IdIdea)
     {
          if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'mentor')
          {
               if($this->MentorModel->RechazarIdea($IdIdea)){
                    $this->Enter();
               } else {
                    echo "Error";
               }
          } else {

               redirect(base_url().'MentorController/Login');
          }
     }
}