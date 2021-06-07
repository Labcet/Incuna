<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller {

	public function __construct(){

	parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('AdminModel');
		$this->load->helper('url');
	}
	
	/* VALIDA EL LOGIN DEL ADMINISTRADOR */

	function LoginValidation()
	{
		$this->form_validation->set_rules('usuario_admin', 'Usuario', 'required');
		$this->form_validation->set_rules('password_admin', 'Password', 'required');

		if($this->form_validation->run())
		{
			$usuario = $this->input->post('usuario_admin');
			$password = $this->input->post('password_admin');

			if($this->AdminModel->AdminLogin($usuario, $password) == 'EXITO')
			{ 
				$session_data = array(
					'usuario'	=>	$usuario,
					'password'	=>	$password,
					'rol' => 'superadmin'
				);
				$this->session->set_userdata($session_data);
				$this->AdminModel->log($this->session->userdata('usuario'),"AdminLogin","LoginValidation");
				echo 'EXITO';

			} elseif($this->AdminModel->EditorLogin($usuario, $password) == 'EXITO') {

				$session_data = array(
					'usuario'	=>	$usuario,
					'password'	=>	$password,
					'rol' => 'editor'
				);
				$this->session->set_userdata($session_data);
				$this->AdminModel->log($this->session->userdata('usuario'),"EditorLogin","LoginValidation");
				echo 'EXITO';

			} else {

				echo 'ERROR_LOGEO';
			}
		}
		else
		{
			echo 'ERROR_VALIDACION';
		}
	}

	/* PANTALLA DE INICIO DEL ADMINISTRADOR */

	function Enter()
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{	
			$data['uname'] = $this->session->userdata('usuario');
			$data['num_estudiantes'] = $this->AdminModel->AllEstudiantes();
			$data['num_mentores'] = $this->AdminModel->AllMentores();
			$data['num_eventos'] = $this->AdminModel->AllEventos();
			$data['num_convocatorias'] = $this->AdminModel->AllConvocatorias();
			$data['rol'] = $this->session->userdata('rol');
			$this->load->view("administrador/dashboard", $data);
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* LOGIN DEL ADMINISTRADOR */

	function Login()
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			redirect(base_url().'AdminController/Enter'); 
		}
		else
		{
			$this->load->view("general/login");
		} 
	}

	function Logout()
	{
		$this->AdminModel->log($this->session->userdata('usuario'),"Logout","Logout");
		$this->session->sess_destroy();
		redirect(base_url().'main/Login');
	}

	/* MUESTRA LA INFORMACION DEL USUARIO (PERFIL) */

	function PerfilShow()
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			$this->load->model('AdminModel');
			$data['uname'] = $this->session->userdata('usuario');
			$data['rid'] = $this->AdminModel->recupera_id($this->session->userdata('usuario'));
			$data['rol'] = $this->session->userdata('rol');
			$this->load->view("administrador/perfil_administrador", $data);
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* ACTUALIZACION DE LA INFORMACION DEL ADMINISTRADOR */

	function PerfilUpdate()
	{	
		$this->form_validation->set_rules('email', 'Email', 'valid_email');

		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			if($this->form_validation->run())
			{	 
				if($this->AdminModel->UpdateAdminData($this->session->userdata('usuario')))
				{
					$this->AdminModel->log($this->session->userdata('usuario'),"Update Perfil","PerfilUpdate");
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
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* MUESTRA LA TABLA DE MENTORES */

	function ShowMentores()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			$data['uname'] = $this->session->userdata('usuario');
			$data['rid'] = $this->AdminModel->recupera_id($this->session->userdata('usuario'));
			$data['mentores'] = $this->AdminModel->RecuperaMentores();
			$data['rol'] = $this->session->userdata('rol');
			$this->load->view("administrador/mentores", $data);
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* MUESTRA LA TABLA DE ESTUDIANTES */

	function ShowEstudiantes()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			$data['uname'] = $this->session->userdata('usuario');
			$data['rid'] = $this->AdminModel->recupera_id($this->session->userdata('usuario'));
			$data['estudiantes'] = $this->AdminModel->RecuperaEstudiantes();
			$data['rol'] = $this->session->userdata('rol');
			$this->load->view("administrador/estudiantes", $data);
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* MUESTRA LA TABLA DE ADMINISTRADORES */

	function ShowAdministradores()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			$data['uname'] = $this->session->userdata('usuario');
			$data['rid'] = $this->AdminModel->recupera_id($this->session->userdata('usuario'));
			$data['administradores'] = $this->AdminModel->RecuperaAdministradores();
			$data['rol'] = $this->session->userdata('rol');
			$this->load->view("administrador/administradores", $data);
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* MUESTRA LA TABLA DE EVENTOS */

	function ShowEventos()
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			$data['uname'] = $this->session->userdata('usuario');
			$data['rid'] = $this->AdminModel->recupera_id($this->session->userdata('usuario'));
			$data['eventos'] = $this->AdminModel->RecuperaEventos();
			$data['rol'] = $this->session->userdata('rol');
			$this->load->view("administrador/eventos", $data);
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* MUESTRA LA TABLA DE CONVOCATORIAS */

	function ShowConvocatorias()
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			$data['uname'] = $this->session->userdata('usuario');
			$data['rid'] = $this->AdminModel->recupera_id($this->session->userdata('usuario'));
			$data['convocatorias'] = $this->AdminModel->RecuperaConvocatorias();
			$data['rol'] = $this->session->userdata('rol');
			$this->load->view("administrador/convocatorias", $data);
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* MUESTRA LA TABLA DE LOGS */

	function ShowLogs()
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			$data['uname'] = $this->session->userdata('usuario');
			$data['rid'] = $this->AdminModel->recupera_id($this->session->userdata('usuario'));
			$data['logs'] = $this->AdminModel->RecuperaLogs();
			$data['rol'] = $this->session->userdata('rol');
			$this->load->view("administrador/log", $data);
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* REGISTRAR NUEVO MENTOR */

	function SaveNewMentor()
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			$this->form_validation->set_rules('dni', 'Dni', 'required');
			$this->form_validation->set_rules('codigo', 'Código', 'required');
			$this->form_validation->set_rules('celular', 'Celular', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('paterno', 'Paterno', 'required');
			$this->form_validation->set_rules('materno', 'Materno', 'required');
			$this->form_validation->set_rules('usuario', 'Usuario', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('direccion', 'Dirección', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'required');

			if($this->form_validation->run())
			{	
				$this->AdminModel->log($this->session->userdata('usuario'),"Registra Nuevo Mentor","SaveNewMentor");
				echo $this->AdminModel->SaveNewMentor();
			}
			else
			{
				echo 'ERROR_VALIDACION';
			}
		}
		else{

			redirect(base_url().'AdminController/Login');
		}
	}

	/* REGISTRAR NUEVO ESTUDIANTE */

	function SaveNewEstudiante()
	{	
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			$this->form_validation->set_rules('dni', 'Dni', 'required');
			$this->form_validation->set_rules('codigo', 'Código', 'required');
			$this->form_validation->set_rules('celular', 'Celular', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('paterno', 'Paterno', 'required');
			$this->form_validation->set_rules('materno', 'Materno', 'required');
			$this->form_validation->set_rules('usuario', 'Usuario', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('direccion', 'Dirección', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'required');

			if($this->form_validation->run())
			{
				$this->AdminModel->log($this->session->userdata('usuario'),"Registra Nuevo Estudiante","SaveNewEstudiante");
				echo $this->AdminModel->SaveNewEstudiante();
			}
			else
			{
				echo 'ERROR_VALIDACION';
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* REGISTRAR NUEVO ADMINISTRADOR */

	function SaveNewAdministrador()
	{	
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			$this->form_validation->set_rules('dni', 'Dni', 'required');
			$this->form_validation->set_rules('codigo', 'Código', 'required');
			$this->form_validation->set_rules('celular', 'Celular', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('paterno', 'Paterno', 'required');
			$this->form_validation->set_rules('materno', 'Materno', 'required');
			$this->form_validation->set_rules('usuario', 'Usuario', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('direccion', 'Dirección', 'required');
			$this->form_validation->set_rules('rol', 'Rol', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'required');

			if($this->form_validation->run())
			{	
				$this->AdminModel->log($this->session->userdata('usuario'),"Registra Nuevo Administrador","SaveNewAdministrador");
				echo $this->AdminModel->SaveNewAdministrador();
			}
			else
			{
				echo 'ERROR_VALIDACION';
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* REGISTRAR NUEVO EVENTO */

	function SaveNewEvento()
	{	
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			$this->form_validation->set_rules('titulo', 'Título', 'required');
			$this->form_validation->set_rules('lugar', 'Lugar', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'required');
			$this->form_validation->set_rules('fecha', 'Fecha', 'required');
			//$this->form_validation->set_rules('portada', 'Portada', 'required');

			if($this->form_validation->run())
			{	
				if($this->AdminModel->SaveNewEvento() == 'EXITO'){

					$this->AdminModel->log($this->session->userdata('usuario'),"Registra Nuevo Evento","SaveNewEvento");
					$EventoId = $this->AdminModel->LastEvento();

					$config = [
						"upload_path" => "./eventos_img",
						"allowed_types" => "jpeg|png|jpg",
						"file_name" => $EventoId,
						//"max_size" => "2000";
					];
	
					$this->load->library("upload",$config);
	
					if ($this->upload->do_upload('portada')) {
	
						$NombreFile = array("upload_data" => $this->upload->data());
						
						if($this->AdminModel->GuardarFile($EventoId,$NombreFile['upload_data']['file_name'])){

							echo 'EXITO';
						} else {

							echo 'ERROR_ARCHIVO';
						}
					} 
					else {
		
						//echo $this->upload->display_errors();
						echo 'ERROR_SUBIDA';
					}
				} else {

					echo 'ERROR_INSERCION';
				}
			}
			else
			{
				echo 'ERROR_VALIDACION';
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* REGISTRAR NUEVA CONVOCATORIA */

	function SaveNewConvocatoria()
	{	
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			$this->form_validation->set_rules('titulo', 'Título', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'required');
			$this->form_validation->set_rules('fecha_ini', 'Fecha Inicio', 'required');
			$this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');

			if($this->form_validation->run())
			{
				$this->AdminModel->log($this->session->userdata('usuario'),"Registra Nueva Convocatoria","SaveNewConvocatoria");
				echo $this->AdminModel->SaveNewConvocatoria();
			}
			else
			{
				echo 'ERROR_VALIDACION';
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* ELIMINAR UN MENTOR */

	function DeleteMentor($id_mentor)
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			if($this->AdminModel->DeleteMentor($id_mentor))
			{
				$this->AdminModel->log($this->session->userdata('usuario'),"Eliminar Mentor","DeleteMentor");
				redirect(base_url().'AdminController/ShowMentores');
			}
			else
			{
				return false;
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* ELIMINAR UN ESTUDIANTE */

	function DeleteEstudiante($id_estudiante)
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			if($this->AdminModel->DeleteEstudiante($id_estudiante))
			{
				$this->AdminModel->log($this->session->userdata('usuario'),"Eliminar Estudiante","DeleteEstudiante");
				redirect(base_url().'AdminController/ShowEstudiantes');
			}
			else
			{
				return false;
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* ELIMINAR UN ADMINISTRADOR */

	function DeleteAdministrador($id_administrador)
	{
		if($this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin')
		{
			if($this->AdminModel->DeleteAdministrador($id_administrador))
			{
				$this->AdminModel->log($this->session->userdata('usuario'),"Eliminar Administrador","DeleteAdministrador");
				redirect(base_url().'AdminController/ShowAdministradores');
			}
			else
			{
				return false;
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* ELIMINAR UN EVENTO */

	function DeleteEvento($id_evento)
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			if($this->AdminModel->DeleteEvento($id_evento))
			{
				$this->AdminModel->log($this->session->userdata('usuario'),"Eliminar Evento","DeleteEvento");
				redirect(base_url().'AdminController/ShowEventos');
			}
			else
			{
				return false;
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* ELIMINAR UNA CONVOCATORIA */

	function DeleteConvocatoria($id_convocatoria)
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			if($this->AdminModel->DeleteConvocatoria($id_convocatoria))
			{
				$this->AdminModel->log($this->session->userdata('usuario'),"Eliminar Convocatoria","DeleteConvocatoria");
				redirect(base_url().'AdminController/ShowConvocatorias');
			}
			else
			{
				return false;
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* ACTUALIZA LA INFORMACIÓN DE UN EVENTO */

	function UpdateEvento()
	{
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			$this->form_validation->set_rules('update_titulo', 'Título', 'required');
			$this->form_validation->set_rules('update_lugar', 'Lugar', 'required');
			$this->form_validation->set_rules('update_descripcion', 'Descripción', 'required');
			$this->form_validation->set_rules('update_fecha', 'Fecha', 'required');

			if($this->form_validation->run())
			{	
				$id = $this->input->post('update_id');
				$this->AdminModel->log($this->session->userdata('usuario'),"Actualizar Evento","UpdateEvento");
				echo $this->AdminModel->UpdateEvento($id);
			}
			else
			{
				echo 'ERROR_VALIDACION';
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}

	/* ACTUALIZA LA INFORMACIÓN DE UNA CONVOCATORIA */

	function UpdateConvocatoria()
	{	
		if( $this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'superadmin' ||
			$this->session->userdata('usuario') != '' && $this->session->userdata('rol') == 'editor'
		  )
		{
			$this->form_validation->set_rules('update_titulo', 'Título', 'required');
			$this->form_validation->set_rules('update_descripcion', 'Descripción', 'required');
			$this->form_validation->set_rules('update_fecha_ini', 'Fecha Inicio', 'required');
			$this->form_validation->set_rules('update_fecha_fin', 'Fecha Fin', 'required');

			if($this->form_validation->run())
			{	
				$id = $this->input->post('update_id');
				$this->AdminModel->log($this->session->userdata('usuario'),"Actualizar Convocatoria","UpdateConvocatoria");
				echo $this->AdminModel->UpdateConvocatoria($id);
			}
			else
			{
				echo 'ERROR_VALIDACION';
			}
		}
		else
		{
			redirect(base_url().'AdminController/Login');
		}
	}
}