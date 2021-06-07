<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmprendedorController extends CI_Controller 
{
	public function __construct(){

	parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('EmprendedorModel');
		$this->load->helper('url');
	}
	
	/* MUESTRA LA VISTA TEST */

	function Test()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')  
		{  
			$data['uname'] = $this->session->userdata('usuario');
			$data['query'] = $this->EmprendedorModel->PreguntasTest();
			$data['rid'] = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));   
			$this->load->view('emprendedor/table', $data);

		} else {

			$this->Enter();
		}
	}

	/* OBTIENE EL PUNTAJE DEL TEST DEL USUARIO */

	function ResultadoTest()
	{
		$temp = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));
		$data['puntaje'] = $this->EmprendedorModel->ObtenerPuntaje($temp[0]->Id);
		$this->load->view('emprendedor/resultado_test',$data);  
	}

	/* REGISTRA UN NUEVO ESTUDIANTE */

	function RegistraNuevoEstudiante()  
	{  
		$this->form_validation->set_rules('dni', 'Dni', 'required');
		$this->form_validation->set_rules('codigo', 'Codigo', 'required');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('paterno', 'Paterno', 'required');
		$this->form_validation->set_rules('materno', 'Materno', 'required');
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run())
		{
			echo $this->EmprendedorModel->RegistraNuevoEstudiante();

		} else {

			echo 'ERROR_VALIDACION';
		}
	}

	/* INSERTA EL PUNTAJE POR CADA RESPUESTA */

	function ValidarTest()  
	{  
		$temp = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));

		$this->EmprendedorModel->InsertaPuntaje(
			$temp[0]->Id,
			$this->input->post('r1'),$this->input->post('r2'),$this->input->post('r3'),$this->input->post('r4'),
			$this->input->post('r5'),$this->input->post('r6'),$this->input->post('r7'),$this->input->post('r8'),
			$this->input->post('r9'),$this->input->post('r10'),$this->input->post('r11'),$this->input->post('r12'),
			$this->input->post('r13'),$this->input->post('r14'),$this->input->post('r15'),$this->input->post('r16'),
			$this->input->post('r17'),$this->input->post('r18'),$this->input->post('r19'),$this->input->post('r20'),
			$this->input->post('r21'),$this->input->post('r22'),$this->input->post('r23'),$this->input->post('r24'),
			$this->input->post('r25'),$this->input->post('r26'),$this->input->post('r27'),$this->input->post('r28'),
			$this->input->post('r29'),$this->input->post('r30'),$this->input->post('r31'),$this->input->post('r32'),
			$this->input->post('r33'),$this->input->post('r34'),$this->input->post('r35'),$this->input->post('r36'),
			$this->input->post('r37'),$this->input->post('r38'),$this->input->post('r39'),$this->input->post('r40')
		);
	}

	/* MUESTRA LA VISTA DEL PERFIL DE USUARIO */

	function PerfilShow()
	{	
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			$data['uname'] = $this->session->userdata('usuario');
			$data['rid'] = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));
			$this->load->view("emprendedor/perfil_emprendedor", $data);
		}
		else
		{
			$this->Enter();
		}
	}

	/* ACTUALIZA EL PERFIL DEL ESTUDIANTE */

	function PerfilUpdate()
	{
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		
		if($this->form_validation->run())
		{
			if($this->EmprendedorModel->can_update($this->session->userdata('usuario')))
			{
				$this->EmprendedorModel->log($this->session->userdata('usuario'),"Update Perfil","PerfilUpdate");
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
	}

	/* VALIDA LOS DATOS DEL LOGIN */

	function LoginValidation()
	{
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run())  
		{
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');
			
			if($this->EmprendedorModel->LoginEstudiante($usuario,$password))
			{
				$idUsuario = $this->EmprendedorModel->recupera_id($usuario);
				$session_data = array(  
					'usuario'	=>	$this->input->post('usuario'),
					'password'	=>	$this->input->post('password'),
					'rol' => 'estudiante',
					'convocatoria' => $this->EmprendedorModel->PertenenciaConvocatoria($idUsuario[0]->Id),
				);  
				$this->session->set_userdata($session_data);
				$this->EmprendedorModel->log($this->session->userdata('usuario'),"Login","LoginValidation");
				echo 'EXITO';

			} else {

				echo 'ERROR_LOGIN';
			}
		} else {

			echo 'ERROR_VALIDACION';
		}
	}

	/* SALIR */

	function Logout()  
	{  
		$this->load->model('EmprendedorModel');
		$this->EmprendedorModel->log($this->session->userdata('usuario'),"Logout","Logout");
		$this->session->sess_destroy();  
		redirect(base_url() . 'EmprendedorController/Login');  
	} 
	
	/* LOGIN */

	function Login()  
	{  
		$this->load->helper('url');  
		if($this->session->userdata('usuario') != '')  
		{
			$this->session->sess_destroy();
		}
		$this->load->view("general/login"); 
	}

	/* REGISTRO DE UN NUEVO ESTUDIANTE */

	function Registro()  
	{
		$this->load->view("emprendedor/registro");  
	}

	/* MUESTRA EL DASHBOARD */

	function Enter()
	{  
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')  
		{  
			$data['uname'] = $this->session->userdata('usuario');
			$data['info'] = $this->EmprendedorModel->ConvocatoriaShowUser();  
			$this->load->view("emprendedor/dashboard", $data);  
		}  
		else  
		{  
			redirect(base_url() . 'EmprendedorController/Login');  
		}  
	}

	/* INSCRIPCION EN CONVOCATORIA */

	function InscripcionConvocatoria($idConvocatoria){

		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante' )
		{
			$idEstudiante = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));
			if($this->EmprendedorModel->InscripcionConvocatoria($idConvocatoria,$idEstudiante[0]->Id))
			{
				$session_data = $this->session->userdata();
				$session_data['convocatoria'] = $idConvocatoria;
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'EmprendedorController/Enter');
			}
		}
		else
		{
			redirect(base_url() . 'Emprendedor/Login');  
		}
	}

  	/* MUESTRA LAS IDEAS DEL ESTUDIANTE*/
	
	function IdeaShow(){

		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			$data['uname'] = $this->session->userdata('usuario');
			$temp = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));
			$data['uname'] = $this->session->userdata('usuario');
			$data['ideas'] = $this->EmprendedorModel->IdeasSinExcepcion($temp[0]->Id);
			$data['verificar'] = $this->EmprendedorModel->VerificarIdeas($temp[0]->Id,$this->session->userdata('convocatoria'));
			$this->load->view('emprendedor/idea', $data);
		}
		else
		{
			redirect(base_url() . 'Emprendedor/Login');
		}
	}

	/* INSERTA NUEVA IDEA */

	function IdeaInsert()
	{
		$this->form_validation->set_rules('titulo', 'Titulo', 'required');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required'); 

		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			if($this->form_validation->run())
			{
				$usuario = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));

				if($this->EmprendedorModel->IdeaInsert($usuario))
				{
					$this->EmprendedorModel->log($this->session->userdata('usuario'),"Inserto Idea","IdeaInsert");
					echo 'EXITO';

				} else {

					echo 'ERROR_REGISTRO';
				}

			} else {

				echo 'ERROR_VALIDACION';
			}

		} else {

			redirect(base_url() . 'Emprendedor/Login');
		}
	}
	
	function table_list()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			$nombre['uname'] = $this->session->userdata('usuario');
			$this->load->view("table", $nombre);  
		}
		else
		{
			redirect(base_url() . 'Emprendedor/Login');
		}
	}

	/* FORO */

	function foro()
	{	
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			$data['uname'] = $this->session->userdata('usuario');
			$this->load->model('EmprendedorModel');
			$data['pregunta'] = $this->EmprendedorModel->can_mostrar_preguntas_foro();
			$this->load->view("foro",$data);
		}
		else {
		
			redirect(base_url() . 'EmprendedorController/Login');
		}
	}

	function verifica_foro()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante'){

			redirect(base_url() . '/EmprendedorController/foro'); 
		}
		else{
			$this->output->set_status_header(400);
		}
	}
	
	function registra_foro()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');  
		$this->form_validation->set_rules('paterno', 'Paterno', 'required');
		$this->form_validation->set_rules('materno', 'Materno', 'required');
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required'); 

		if($this->form_validation->run())  
		{  
		//model function  
		$usuario = $this->input->post('usuario');
		$password = $this->input->post('password');
		if($this->EmprendedorModel->can_registro_foro())  
		{
			$session_data = array(  
			'usuario'     =>     $usuario,
			'password'    =>     $password
			);  
			$this->session->set_userdata($session_data);
			$this->EmprendedorModel->log($this->session->userdata('usuario'),"Registro en foro","registra_foro");
			redirect(base_url().'EmprendedorController/foro');
			}  
			else  
			{
				$this->output->set_status_header(400);  
			}  
		}  
		else
		{
			$this->output->set_status_header(401);
		}
	}

	function registra_pregunta()
	{
		$this->form_validation->set_rules('pregunta', 'Pregunta', 'required');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

		if($this->form_validation->run())
		{
			if($this->EmprendedorModel->can_registro_pregunta($this->session->userdata('usuario')))
			{
				$this->EmprendedorModel->log($this->session->userdata('usuario'),"Registro pregunta","registra_pregunta");
				redirect(base_url().'EmprendedorController/foro');
			}
			else
			{
				$this->output->set_status_header(400);
			}
		}
		else
		{
			$this->output->set_status_header(401);
		}
	}

	function recibe_id_foro($id)
	{
		$data['uname'] = $this->session->userdata('usuario');
		$data['user_topico'] = $this->EmprendedorModel->busca_id_foro($id);
		$data['respuestas_topico'] = $this->EmprendedorModel->busca_respuestas($id);
		$this->load->view("topico_foro",$data); 
	}

	function registra_comentario()
	{
		$this->form_validation->set_rules('comentario', 'Descripcion', 'required');
		if($this->form_validation->run())  
		{
			$id_top = $this->input->post('id_t'); 
			if($this->EmprendedorModel->can_registro_comentario($this->session->userdata('usuario'),$id_top))  
			{
				$this->EmprendedorModel->log($this->session->userdata('usuario'),"Registro comentario","registra_comentario");
			}
			else
			{
				$this->output->set_status_header(400);  
			}
		}
		else
		{
			$this->output->set_status_header(401);   
		}
	}

	/* REALIZA EL MACROFILTRO */

	function Macrofiltro()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			if($this->session->userdata('convocatoria') != 0){

				$this->load->model('EmprendedorModel');
				$data['uname'] = $this->session->userdata('usuario');
				$temp = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));
				$data['verificar'] = $this->EmprendedorModel->VerificarIdeas($temp[0]->Id,$this->session->userdata('convocatoria'));
				
				if($this->EmprendedorModel->VerificarIdeas($temp[0]->Id,$this->session->userdata('convocatoria')) == 0){
					
					$data['ideas'] = $this->EmprendedorModel->IdeasTodas($temp[0]->Id,$this->session->userdata('convocatoria'));
				}else{
					$data['ideas'] = $this->EmprendedorModel->IdeasSeleccionadas($temp[0]->Id,$this->session->userdata('convocatoria'));
				}
				$this->load->view('emprendedor/macrofiltro', $data);
			} else {

				redirect(base_url() . 'EmprendedorController/Enter');
			}
		} else {
			
			redirect(base_url() . 'EmprendedorController/Login');
		}
	}

	/* REALIZA LA SUMATORIA DEL PUNTAJE MACROFILTRO DE CADA IDEA*/

	public function PuntajeMacrofiltro()  
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			$UserId = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));

			for( $i = 1; $i <= $this->input->post('total'); $i++)
			{
				$this->EmprendedorModel->UpdatePuntajeMacro(
					$UserId[0]->Id,
					$this->input->post('id'.$i),
					$this->input->post('r'.$this->input->post('id'.$i).'_1'),
					$this->input->post('r'.$this->input->post('id'.$i).'_2'),
					$this->input->post('r'.$this->input->post('id'.$i).'_3'),
					$this->input->post('r'.$this->input->post('id'.$i).'_4'),
					$this->input->post('r'.$this->input->post('id'.$i).'_5'),
					$this->input->post('r'.$this->input->post('id'.$i).'_6'),
					$this->input->post('r'.$this->input->post('id'.$i).'_7')
				);
			}
		} else {

			redirect(base_url() . 'EmprendedorController/Login');
		}
	}

	/* REALIZA EL MICROFILTRO */

	function Microfiltro()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')  
		{	
			if($this->session->userdata('convocatoria') != 0){

				$data['uname'] = $this->session->userdata('usuario');
				$temp = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));
				$data['verificar'] = $this->EmprendedorModel->VerificarIdeasMicro($temp[0]->Id,$this->session->userdata('convocatoria'));
				$data['estado'] = 0;

				if($this->EmprendedorModel->VerificarIdeas($temp[0]->Id,$this->session->userdata('convocatoria')) == 0){
					
					$data['ideas'] = 0;
				}else if(
					$this->EmprendedorModel->VerificarIdeas($temp[0]->Id,$this->session->userdata('convocatoria')) != 0 && 
					$this->EmprendedorModel->VerificarIdeasMicro($temp[0]->Id,$this->session->userdata('convocatoria')) == 0
				){
					$data['ideas'] = $this->EmprendedorModel->IdeasSeleccionadas($temp[0]->Id,$this->session->userdata('convocatoria'));
				}else{
					$data['ideas'] = $this->EmprendedorModel->IdeaGanadora($temp[0]->Id,$this->session->userdata('convocatoria'));
					switch ($data['ideas'][0]->Estado) {
						case 1:
							$data['estado'] = 1;
							break;
						case 2:
							$data['estado'] = 2;
							break;
						case 3:
							$data['estado'] = 3;
							break;
						default:
							$data['estado'] = 0;
							break;
					}
				}
				$this->load->view('emprendedor/microfiltro', $data);
			} else {

				redirect(base_url() . 'EmprendedorController/Enter');  	
			}
		} else {
			
			redirect(base_url() . 'EmprendedorController/Login');  
		}
	}

	/* REALIZA LA SUMATORIA DEL PUNTAJE MICROFILTRO DE CADA IDEA */

	public function PuntajeMicrofiltro()  
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			$UserId = $this->EmprendedorModel->recupera_id($this->session->userdata('usuario'));

			for( $i = 1; $i <= 4; $i++)
			{
				$this->EmprendedorModel->UpdatePuntajeMicro(
					$UserId[0]->Id,
					$this->input->post('id'.$i),
					$this->input->post('r'.$this->input->post('id'.$i).'_1'),
					$this->input->post('r'.$this->input->post('id'.$i).'_2'),
					$this->input->post('r'.$this->input->post('id'.$i).'_3'),
					$this->input->post('r'.$this->input->post('id'.$i).'_4'),
					$this->input->post('r'.$this->input->post('id'.$i).'_5'),
					$this->input->post('r'.$this->input->post('id'.$i).'_6'),
					$this->input->post('r'.$this->input->post('id'.$i).'_7'),
					$this->input->post('r'.$this->input->post('id'.$i).'_8'),
					$this->input->post('r'.$this->input->post('id'.$i).'_9'),
					$this->input->post('r'.$this->input->post('id'.$i).'_10')
				);
			}

			echo 'EXITO';

		} else {

			redirect(base_url() . 'EmprendedorController/Login'); 
		}
	}

	/* GUARDAR EL ARCHIVO CANVAS */

	public function GuardarCanvas()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'estudiante')
		{
			$IdeaId = $this->input->post('IdeaId');

			$config = [
				"upload_path" => "./canvas",
				"allowed_types" => "pdf",
				"file_name" => $IdeaId,
				//"max_size" => "2000";
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('archivo_canvas')) {
				$NombreFile = array("upload_data" => $this->upload->data());
				if($this->EmprendedorModel->GuardarFile($IdeaId,$NombreFile['upload_data']['file_name']) == true){
					if($this->EmprendedorModel->AsignarMentor($IdeaId)){

						echo "EXITO";
					} else {

						echo "ERROR_MENTOR";
					}
				}else{

					echo "ERROR_ARCHIVO";
				}
			} 
			else {

				echo $this->upload->display_errors();
			}
		} else {

			redirect(base_url() . 'EmprendedorController/Login'); 
		}
	}
}