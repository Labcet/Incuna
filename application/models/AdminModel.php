<?php
class AdminModel extends CI_Model
{
	/* RECUPERA LA CANTIDAD DE ESTUDIANTES */

	function AllEstudiantes()
	{
		return $this->db->count_all('Estudiantes');
	}

	/* RECUPERA LA CANTIDAD DE MENTORES */

	function AllMentores()
	{
		return $this->db->count_all('Mentores');
	}

	/* RECUPERA LA CANTIDAD DE EVENTOS */

	function AllEventos()
	{
		return $this->db->count_all('Eventos');
	}

	/* RECUPERA LA CANTIDAD DE CONVOCATORIAS */

	function AllConvocatorias()
	{
		return $this->db->count_all('Convocatorias');
	}

	/* CONSULTA SI EL USUARIO ES SUPERADMIN */
	
	function AdminLogin($username, $password)
	{
		$this->db->select('*')
             ->from('administradores')
             ->where('Usuario', $username)
			 ->where('Rol', 'superadmin');
		
		$result = $this->db->get();

		if($result->num_rows() > 0)
		{
			$row = $result->row();
	
			if(password_verify($password, $row->Password))
			{
				return 'EXITO';

			} else {
				
				return 'ERROR';
			}

		} else {

			return 'ERROR';
		}
	}

	/* CONSULTA SI EL USUARIO ES SUPERADMIN */
	
	function EditorLogin($username, $password)
	{
		$this->db->select('*')
             ->from('administradores')
             ->where('Usuario', $username)
			 ->where('Rol', 'editor');
		
		$result = $this->db->get();

		if($result->num_rows() > 0)
		{
			$row = $result->row();
	
			if(password_verify($password, $row->Password))
			{
				return 'EXITO';

			} else {
				
				return 'ERROR_PASSWORD';
			}

		} else {

			return 'ERROR_NO_EXISTE';
		}
	}

	/* ACTUALIZA LOS DATOS DEL ADMINISTRADOR */

	function UpdateAdminData($username)
	{
		$update_data = array(
			//'dni' => $this->input->post('dni'),
			//'codigo' => $this->input->post('codigo'),
			'celular' => $this->input->post('celular'),
			'Nombre' => $this->input->post('nombre'),
			'Paterno' => $this->input->post('paterno'),
			'Materno' => $this->input->post('materno'),
			//'Usuario' => $this->input->post('usuario'),
			'Email' => $this->input->post('email'),
			'Direccion' => $this->input->post('direccion'),
			'Descripcion' => $this->input->post('descripcion'),
		);

		$this->db->where('Usuario =',$username);

		if($this->db->update('administradores', $update_data)){
			return true;
		}
		else{
			return false;
		}
	}
	
	/* REGISTRA LOG */

	function log($iduser,$actividad,$controlador){
		date_default_timezone_set('America/Lima');
		$tiempo = date('Y-m-d H:i:s');
		$ip = 'Ipaddress';
		$insert_data = array(   'Usuario' => $iduser,
								'Actividad' => $actividad,
								'Controlador' => $controlador,
								'Timestamp' => $tiempo,
								'Ipaddress' => $ip,);
		if($this->db->insert('log', $insert_data)){
			return true;
		}
		else{
			return false;
		}
	}

	/* RECUPERA A TODOS LOS ESTUDIANTES */

	function RecuperaEstudiantes()
	{
		$estudiantes = $this->db->select('*')->from('estudiantes')->get();
		return $estudiantes->result();
	}

	/* RECUPERA A TODOS LOS ADMINISTRADORES */

	function RecuperaAdministradores()
	{
		$administradores = $this->db->select('*')->from('administradores')->get();
		return $administradores->result();
	}

	/* RECUPERA A TODOS LOS MENTORES */

	function RecuperaMentores()
	{
		$mentores = $this->db->select('*')->from('mentores')->get();
		return $mentores->result();
	}

	/* RECUPERA A TODOS LOS EVENTOS */

	function RecuperaEventos()
	{
		$eventos = $this->db->select('*')->from('eventos')->order_by('Id','desc')->get();
		return $eventos->result();
	}

	/* RECUPERA A TODOS LAS CONVOCATORIAS */

	function RecuperaConvocatorias()
	{
		$rid = $this->db->select('*')->from('convocatorias')->order_by('Id','desc')->get();
		return $rid->result();
	}

	/* RECUPERA A TODOS LOS LOGS */

	function RecuperaLogs()
	{
		$rid = $this->db->select('*')->from('log')->order_by('Id','desc')->limit('50')->get();
		return $rid->result();
	}

	/* RECUPERA EL ID DEL USUARIO */

	function recupera_id($usuario)
	{
		$rid = $this->db->select('*')->from('administradores')->where('Usuario =', $usuario)->get();
		return $rid->result();
	}

	/* GUARDA UN NUEVO MENTOR */

	function SaveNewMentor()
	{	
		$usuario_existente = $this->db->select('*')->from('mentores')->where('Usuario =', $this->input->post('usuario'))->get();

		if($usuario_existente->num_rows() == 0){

			$hash = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

			$insert_data = array(
				'dni' => $this->input->post('dni'),
				'codigo' => $this->input->post('codigo'),
				'celular' => $this->input->post('celular'),
				'Nombre' => $this->input->post('nombre'),
				'Paterno' => $this->input->post('paterno'),
				'Materno' => $this->input->post('materno'),
				'Usuario' => $this->input->post('usuario'),
				'Password' => $hash,
				'Email' => $this->input->post('email'),
				'Direccion' => $this->input->post('direccion'),
				'Descripcion' => $this->input->post('descripcion')
			);

			if($this->db->insert('mentores', $insert_data)){
				return 'EXITO';
			} else {
				return 'ERROR_INSERCION';
			}
		} else {
			return 'ERROR_EXISTENCIA';
		}
	}

	/* GUARDA UN NUEVO ESTUDIANTE */

	function SaveNewEstudiante()
	{	
		$usuario_existente = $this->db->select('*')->from('estudiantes')->where('Usuario =', $this->input->post('usuario'))->get();

		if($usuario_existente->num_rows() == 0){

			$hash = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

			$insert_data = array(
				'Dni' => $this->input->post('dni'),
				'Codigo' => $this->input->post('codigo'),
				'Celular' => $this->input->post('celular'),
				'Nombre' => $this->input->post('nombre'),
				'Paterno' => $this->input->post('paterno'),
				'Materno' => $this->input->post('materno'),
				'Usuario' => $this->input->post('usuario'),
				'Password' => $hash,
				'Email' => $this->input->post('email'),
				'Direccion' => $this->input->post('direccion'),
				'Descripcion' => $this->input->post('descripcion')
			);

			if($this->db->insert('estudiantes', $insert_data)){
				return 'EXITO';
			} else {
				return 'ERROR_INSERCION';
			}
		} else {
			return 'ERROR_EXISTENCIA';
		}
	}

	/* GUARDA UN NUEVO ADMINISTRADOR */

	function SaveNewAdministrador()
	{
		$usuario_existente = $this->db->select('*')->from('administradores')->where('Usuario =', $this->input->post('usuario'))->get();

		if($usuario_existente->num_rows() == 0){

			$hash = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

			$insert_data = array(
				'Dni' => $this->input->post('dni'),
				'Codigo' => $this->input->post('codigo'),
				'Celular' => $this->input->post('celular'),
				'Nombre' => $this->input->post('nombre'),
				'Paterno' => $this->input->post('paterno'),
				'Materno' => $this->input->post('materno'),
				'Usuario' => $this->input->post('usuario'),
				'Email' => $this->input->post('email'),
				'Direccion' => $this->input->post('direccion'),
				'Rol' => $this->input->post('rol'),
				'Descripcion' => $this->input->post('descripcion'),
				'Password' => $hash,
			);

			if($this->db->insert('administradores', $insert_data)){
				return 'EXITO';
			} else {
				return 'ERROR_INSERCION';
			}
		} else {

			return 'ERROR_EXISTENCIA';
		}
	}

	/* GUARDA UN NUEVO EVENTO */

	function SaveNewEvento()
	{
		$insert_data = array(

			'titulo' => $this->input->post('titulo'),
			'lugar' => $this->input->post('lugar'),
			'descripcion' => $this->input->post('descripcion'),
			'fecha' => $this->input->post('fecha')
		);
		if($this->db->insert('eventos', $insert_data)){
			return 'EXITO';
		}
		else{
			return 'ERROR_INSERCION';
		}
	}

	/* GUARDA UNA NUEVA CONVOCATORIA */

	function SaveNewConvocatoria()
	{
		$insert_data = array(

			'Titulo' => $this->input->post('titulo'),
			'Descripcion' => $this->input->post('descripcion'),
			'Fecha_ini' => $this->input->post('fecha_ini'),
			'Fecha_fin' => $this->input->post('fecha_fin'),
			'Participantes' => 0,
		);
		if($this->db->insert('convocatorias', $insert_data)){
			return 'EXITO';
		}
		else{
			return 'ERROR_INSERCION';
		}
	}

	/* ELIMINAR UN MENTOR */

	function DeleteMentor($mentor_id)
	{
		if($this->db->delete('mentores', array('id' => $mentor_id))){

			return true;
		}
		else {

			return false;
		}
	}

	/* ELIMINAR UN ESTUDIANTE */

	function DeleteEstudiante($estudiante_id)
	{
		if($this->db->delete('estudiantes', array('id' => $estudiante_id))){

			return true;
		}
		else {

			return false;
		}
	}

	/* ELIMINAR UN ADMINISTRADOR */

	function DeleteAdministrador($administrador_id)
	{
		if($this->db->delete('administradores', array('id' => $administrador_id))){

			return true;
		}
		else {

			return false;
		}
	}

	/* ELIMINAR UN EVENTO */

	function DeleteEvento($evento_id)
	{
		$query = $this->db->select('*')->from('eventos')->where('Id',$evento_id)->get();
		$filename = $query->row()->Portada;

		if($this->db->delete('eventos', array('id' => $evento_id))){
			unlink('./eventos_img/'.$filename);
			return true;
		}
		else {

			return false;
		}
	}

	/* ELIMINAR UNA CONVOCATORIA */

	function DeleteConvocatoria($convocatoria_id)
	{
		if($this->db->delete('convocatorias', array('id' => $convocatoria_id))){

			return true;
		}
		else {

			return false;
		}
	}

	/* ACTUALIZAR UN EVENTO */

	function UpdateEvento($evento_id)
	{
		$update_data = array(

			'Titulo' => $this->input->post('update_titulo'),
			'Lugar' => $this->input->post('update_lugar'),
			'Descripcion' => $this->input->post('update_descripcion'),
			'Fecha' => $this->input->post('update_fecha'),
		);
		$this->db->where('Id =',$evento_id);

		if($this->db->update('eventos', $update_data)){
			return 'EXITO';
		}
		else{
			return 'ERROR_ACTUALIZACION';
		}
	}

	/* ACTUALIZAR UNA CONVOCATORIA */

	function UpdateConvocatoria($convocatoria_id)
	{
		$update_data = array(

			'Titulo' => $this->input->post('update_titulo'),
			'Descripcion' => $this->input->post('update_descripcion'),
			'Fecha_ini' => $this->input->post('update_fecha_ini'),
			'Fecha_fin' => $this->input->post('update_fecha_fin'),
		);
		$this->db->where('Id =',$convocatoria_id);

		if($this->db->update('convocatorias', $update_data)){
			return 'EXITO';
		}
		else{
			return 'ERROR_ACTUALIZACION';
		}
	}

	/* OBTIENE EL ID DEL ULTIMO EVENTO REGISTRADO */

	function LastEvento()
	{
		$query = $this->db->select('*')->from('eventos')->order_by('Id','desc')->limit('1')->get();
		return $query->row()->Id;
	}

	/* GUARDAR LA IMAGEN DE PORTADA DEL EVENTO */

	function GuardarFile($IdEvento,$FileName)
	{
		$update_data = array(
			'Portada' => $FileName,
		);

		$this->db->where('Id =',$IdEvento);
		if($this->db->update('eventos', $update_data)){
			return true;
		}
		else{
			return false;
		}
	}
}