<?php
class EmprendedorModel extends CI_Model  
{
  /* RECUPERA EL ID DEL ESTUDIANTE */

  function recupera_id($usuario)
  {
    $rid = $this->db->select('*')->from('estudiantes')->where('Usuario =', $usuario)->get();
    return $rid->result();
  }
  
  /* VERIFICA SI EL ESTUDIANTE ESTA INSCRITO EN UNA CONVOCATORIA ACTUAL O NO */

  function PertenenciaConvocatoria($usuario){

    $this->db->select('*');
		$this->db->from('convocatoria_usuarios');
    $this->db->where('IdEstudiante', $usuario);
		$this->db->order_by('id','desc');
		$this->db->limit('1');
		$query = $this->db->get();
		if($query->num_rows() > 0){
      
      $convocatoria = $this->db->select('*')->from('convocatorias')->where('Id =',$query->row()->IdConvocatoria)->get();
      
      if($convocatoria->row()->Fecha_ini <= date('Y-m-d') && $convocatoria->row()->Fecha_fin >= date('Y-m-d')){

        return $convocatoria->row()->Id;
      }else{
        return 0;
      }
      
    }
    else{
      return 0;
    }
  }

  /* REALIZA LA INSCRIPCION DE UN ESTUDIANTE A UNA CONVOCATORIA ACTUAL */

  function InscripcionConvocatoria($idConvocatoria, $idEstudiante){
    
    $num_participantes = $this->db->select('*')->from('convocatorias')->where('Id =',$idConvocatoria)->get();

    $update_data = array(
      'Participantes' => $num_participantes->row()->Participantes + 1,
    );

    $this->db->where('Id', $idConvocatoria);
    $this->db->update('convocatorias', $update_data);

    $insert_data = array(
      'IdConvocatoria' => $idConvocatoria,
      'IdEstudiante' => $idEstudiante,
    );

    if($this->db->insert('convocatoria_usuarios', $insert_data)){
      return true;
    }
    else{
      return false;
    }
  }

  /* REGISTRA UN NUEVO ESTUDIANTE */
  
  function RegistraNuevoEstudiante()
  {
    $usuario_existente = $this->db->select('*')->from('estudiantes')->where('Usuario =', $this->input->post('usuario'))->get();

    if($usuario_existente->num_rows() == 0){

      $hash = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

      $insert_data = array(
        'Dni' => $this->input->post('dni'),
        'Codigo' => $this->input->post('codigo'),
        'Nombre' => $this->input->post('nombre'),
        'Paterno' => $this->input->post('paterno'),
        'Materno' => $this->input->post('materno'),
        'Usuario' => $this->input->post('usuario'),
        'Password' => $hash,
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

  /* ACTUALIZA LOS DATOS DEL ESTUDIANTE */

	function can_update($username)
	{
		$insert_data = array(
			'Nombre' => $this->input->post('nombre'),
			'Paterno' => $this->input->post('paterno'),
			'Materno' => $this->input->post('materno'),
			'Celular' => $this->input->post('celular'),
			//'Usuario' => $this->input->post('usuario'),
			'Email' => $this->input->post('email'),
			'Pais' => $this->input->post('pais'),
			'Departamento' => $this->input->post('departamento'),
			'Provincia' => $this->input->post('provincia'),
			'Distrito' => $this->input->post('distrito'),
			'Direccion' => $this->input->post('direccion'),
			'Descripcion' => $this->input->post('descripcion'),
		);

		$this->db->where('Usuario =',$username);

		if($this->db->update('estudiantes', $insert_data)){
			return true;
		}
		else{
			return false;
		}
	}

  /* MUESTRA LA LISTA DE CONVOCATORIAS ACTUALES Y PASADAS */

  function ConvocatoriaShowUser()
  {

    $query = $this->db->select('*')->from('convocatorias')->order_by('id','desc')->get();
    return $query->result();
  }

  /* INSERTA UNA NUEVA IDEA */

	function IdeaInsert($usuario)
	{
		foreach ($usuario as $v) {
			$insert_data = array(	
        'IdUsuario' => $v->Id,
				'Titulo' => $this->input->post('titulo'),
				'Descripcion' => $this->input->post('descripcion'),
				'Estado' => 0,
        'Convocatoria' => $this->session->userdata('convocatoria'),
        'PuntajeMacro' => 0,
        'PuntajeMicro' => 0,
      );
			if($this->db->insert('ideas', $insert_data))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
	}

  /* REGISTRA LAS ACCIONES PARA EL LOG */

	function log($iduser,$actividad,$controlador){
		date_default_timezone_set('America/Lima');
		$tiempo = date('Y-m-d H:i:s');
		$ip = 'Ipaddress';
		$insert_data = array( 'Usuario' => $iduser,
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

  /* ACTUALIZA EL PUNTAJE DE UNA IDEA - MACROFILTRO */

  public function UpdatePuntajeMacro($UserId,$IdIdea,$Puntaje1,$Puntaje2,$Puntaje3,$Puntaje4,$Puntaje5,$Puntaje6,$Puntaje7){

    $PuntajeMacro = $Puntaje1 + $Puntaje2 + $Puntaje3 + $Puntaje4 + $Puntaje5 + $Puntaje6 + $Puntaje7;

    $insert_data = array(
      'IdUsuario' => $UserId,
      'IdIdea' => $IdIdea,
      'Criterio1' => $Puntaje1,
      'Criterio2' => $Puntaje2,
      'Criterio3' => $Puntaje3,
      'Criterio4' => $Puntaje4,
      'Criterio5' => $Puntaje5,
      'Criterio6' => $Puntaje6,
      'Criterio7' => $Puntaje7,
      'PuntajeMacro' => $PuntajeMacro
    );
    $this->db->insert('macrofiltro',$insert_data);
    
    //INSERTAR EL PUNTAJE MACROFILTRO TOTAL A LA IDEA
    
    $update_puntaje_macrofiltro = array(
      'PuntajeMacro' => $PuntajeMacro,
    );

    $this->db->where('Id =',$IdIdea);
    $this->db->update('ideas', $update_puntaje_macrofiltro);
  }

  /* ACTUALIZA EL PUNTAJE DE UNA IDEA - MICROFILTRO */

  public function UpdatePuntajeMicro($UserId,$IdIdea,$Puntaje1,$Puntaje2,$Puntaje3,$Puntaje4,$Puntaje5,$Puntaje6,$Puntaje7,$Puntaje8,$Puntaje9,$Puntaje10){

    $PuntajeMicro = $Puntaje1 + $Puntaje2 + $Puntaje3 + $Puntaje4 + $Puntaje5 + $Puntaje6 + $Puntaje7 + $Puntaje8 + $Puntaje9 + $Puntaje10;

    $insert_data = array(
      'IdUsuario' => $UserId,
      'IdIdea' => $IdIdea,
      'Criterio1' => $Puntaje1,
      'Criterio2' => $Puntaje2,
      'Criterio3' => $Puntaje3,
      'Criterio4' => $Puntaje4,
      'Criterio5' => $Puntaje5,
      'Criterio6' => $Puntaje6,
      'Criterio7' => $Puntaje7,
      'Criterio8' => $Puntaje8,
      'Criterio9' => $Puntaje9,
      'Criterio10' => $Puntaje10,
      'PuntajeMicro' => $PuntajeMicro
    );
    $this->db->insert('microfiltro',$insert_data);
    
    //INSERTAR EL PUNTAJE MACROFILTRO TOTAL A LA IDEA
    
    $update_puntaje_microfiltro = array(
      'PuntajeMicro' => $PuntajeMicro,
    );

    $this->db->where('Id =',$IdIdea);
    $this->db->update('ideas', $update_puntaje_microfiltro);
  }
  
	/* LOGIN ESTUDIANTE */
  
  function LoginEstudiante($usuario,$password)  
	{
    $this->db->select('*')
             ->from('estudiantes')
             ->where('Usuario', $usuario);
    
    $result = $this->db->get();

    if($result->num_rows() > 0)
    {
      $row = $result->row();

      if(password_verify($password, $row->Password))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    else
    {
      return false;
    }
	}

  /* MUESTRA LAS PREGUNTAS DEL TEST */
  
  function PreguntasTest()
  {
    $query = $this->db->select('*')->from('tblpreguntas')->get();
    return $query->result();
  }

  /* INSERTA EL PUNTAJE DEL TEST */

  function InsertaPuntaje($UsuarioId,
                          $r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,
                          $r11,$r12,$r13,$r14,$r15,$r16,$r17,$r18,$r19,$r20,
                          $r21,$r22,$r23,$r24,$r25,$r26,$r27,$r28,$r29,$r30,
                          $r31,$r32,$r33,$r34,$r35,$r36,$r37,$r38,$r39,$r40)
  {
    $Sumatoria = $r1+$r2+$r3+$r4+$r5+$r6+$r7+$r8+$r9+$r10+
                  $r11+$r12+$r13+$r14+$r15+$r16+$r17+$r18+$r19+$r20+
                  $r21+$r22+$r23+$r24+$r25+$r26+$r27+$r28+$r29+$r30+
                  $r31+$r32+$r33+$r34+$r35+$r36+$r37+$r38+$r39+$r40;
    $update_data = array(
      'PuntajeTest' => $Sumatoria
      );
    
    $this->db->where('Id =',$UsuarioId);
    if($this->db->update('estudiantes', $update_data)){
      return true;
    }
    else{
      return false;
    }
  }

  /* OBTIENE EL PUNTAJE DEL ESTUDIANTE */

  function ObtenerPuntaje($IdUsuario){

    $PuntajeTest = $this->db->select('*')->from('estudiantes')->where('Id =',$IdUsuario)->get();
    return $PuntajeTest->row()->PuntajeTest;
  }

  /* REGISTRA UN TOPICO EN EL FORO */
  
  function can_registro_foro()
  {

    $insert_data = array(
      'Nombre' => $this->input->post('nombre'),
      'Paterno' => $this->input->post('paterno'),
      'Materno' => $this->input->post('materno'),
      'Usuario' => $this->input->post('usuario'),
      'Password' => $this->input->post('password'),
    );

    if($this->db->insert('estudiantes', $insert_data)){
        return true;
    }
    else{
      return false;
    }
  }

  /* REGISTRA UNA PREGUNTA EN EL FORO */
  
  function can_registro_pregunta($usuario)
  {
    date_default_timezone_set('America/Lima');
    $tiempo = date('Y-m-d');
    $ant = 0;
    $insert_data = array(
      'Pregunta' => $this->input->post('pregunta'),
      'Descripcion' => $this->input->post('descripcion'),
      'Fecha' => $tiempo,
      'Usuario' => $usuario,
      'Antecesor' => $ant,
    );

    if($this->db->insert('foro', $insert_data)){
        return true;
    }
    else{
      return false;
    }
  }
  
  /* MUESTRA TODOS LOS TOPICOS DEL FORO */
  
  function can_mostrar_preguntas_foro()
  {
    //$query = $this->db->select('*')->from('foro')->get();
    $this->db->select('*');
    $this->db->from('foro');
    $this->db->order_by('id','desc');
    $this->db->where('Antecesor',0);
    $this->db->limit('5');
    $query = $this->db->get();
    return $query->result();
  }

  /* BUSCA ID DE UN TOPICO DEL FORO */
  
      function busca_id_foro($id_foro){

      $suma_t= $this->db->select('*')->from('foro')->where('Id =', $id_foro)->get();
      return $suma_t->result();
  }

  /* REGISTRA COMENTARIO EN EL FORO */

  function can_registro_comentario($usuario,$ant)
  {
    date_default_timezone_set('America/Lima');
    $tiempo = date('Y-m-d');
    $preg = "Este es un comentario";
    $insert_data = array(
      'Pregunta' => $preg,
      'Descripcion' => $this->input->post('comentario'),
      'Fecha' => $tiempo,
      'Usuario' => $usuario,
      'Antecesor' => $ant,
    );

    if($this->db->insert('foro', $insert_data)){
        return true;
    }
    else{
      return false;
    }
  }
  
  /* BUSCA RESPUESTAS DEL FORO */

  function busca_respuestas($id_respuesta){

    $query = $this->db->select('*')->from('foro')->where('Antecesor =', $id_respuesta)->get();
    return $query->result();
  }

  /* RECUPERA TODAS LAS IDEAS SIN EXCEPCION */

  function IdeasSinExcepcion($id)
  {
    $query = $this->db->select('*')->from('ideas')->order_by('Id','desc')->where('IdUsuario =', $id)->get();
    return $query->result();
  }

  /* RECUPERA TODAS LAS IDEAS CORRESPONDIENTES A UNA CONVOCATORIA */

  function IdeasTodas($id, $convocatoria)
  {
    $query = $this->db->select('*')->from('ideas')->where('IdUsuario =', $id)->where('Convocatoria =',$convocatoria)->get();
    return $query->result();
  }

  /* RECUPERA SOLO LAS IDEAS SELECCIONADAS */

  function IdeasSeleccionadas($id, $convocatoria)
  {
    $query = $this->db->select('*')->from('ideas')->order_by('PuntajeMacro','desc')->where('IdUsuario =', $id)->where('Convocatoria =', $convocatoria)->limit('4')->get();
    return $query->result();
  }

  /* VERIFICA SI LAS IDEAS PASARON POR EL MACROFILTRO */

  function VerificarIdeas($UserId,$ConvocatoriaId)
  {
    $this->db->select('*');
    $this->db->from('ideas');
    $this->db->where('IdUsuario =',$UserId);
    $this->db->where('Convocatoria =',$ConvocatoriaId);
    $this->db->limit('1');
    $idea = $this->db->get();

    if($ConvocatoriaId != 0){
      if($idea->num_rows() > 0){
        if($idea->row()->PuntajeMacro == 0){
          return 0;
        }else{
          return 1;
        }
      } else {
        return 0;
      }
    }else{
      return 1;
    }
  }

  /* VERIFICA SI LAS IDEAS PASARON POR EL MICROFILTRO */

  function VerificarIdeasMicro($UserId,$ConvocatoriaId)
  {
    $this->db->select('*');
    $this->db->from('ideas');
    $this->db->order_by('PuntajeMacro','desc');
    $this->db->where('IdUsuario =',$UserId);
    $this->db->where('Convocatoria =',$ConvocatoriaId);
    $this->db->limit('1');
    $idea = $this->db->get();

    if($ConvocatoriaId != 0){
      if($idea->num_rows() > 0){
        if($idea->row()->PuntajeMicro == 0){
          return 0;
        }else{
          return 1;
        }
      } else {
        return 0;
      }
    }else{
      return 1;
    }
  }

  /* DEVUELVE LA IDEA GANADORA */

  function IdeaGanadora($id,$convocatoria)
  {
    $query = $this->db->select('*')->from('ideas')->order_by('PuntajeMicro','desc')->where('IdUsuario =', $id)->where('Convocatoria =',$convocatoria)->limit('1')->get();
    return $query->result();
  }

  /* GUARDA EL ARCHIVO CANVAS DE LA IDEA */

  function GuardarFile($IdIdea,$FileName)
  {
    $update_data = array(
      'Estado' => 1,
      'CanvasFile' => $FileName,
    );

    $this->db->where('Id =',$IdIdea);
    if($this->db->update('ideas', $update_data)){
      return true;
    }
    else{
      return false;
    }
  }

  /* SELECCIONAR UN MENTOR ALEATORIO */

  function MentorAleatorio()
  {
    $this->db->order_by('Id', 'RANDOM');
    $this->db->limit(1);
    $query = $this->db->get('mentores');
    return $query->result();
  }

  /* ASIGNAR MENTOR A UNA IDEA GANADORA */

  function AsignarMentor($IdIdea)
  {
    $Mentor = $this->MentorAleatorio();

    $update_data = array(
      'IdMentor' => $Mentor[0]->Id,
    );

    $this->db->where('Id =',$IdIdea);
    if($this->db->update('ideas', $update_data)){
      return true;
    }
    else{
      return false;
    }
  }
}
