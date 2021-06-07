<?php
class MentorModel extends CI_Model
{

  /* RECUPERA EL ID DEL MENTOR */

  function recupera_id($usuario)
  {
    $rid = $this->db->select('Id')->from('mentores')->where('Usuario =', $usuario)->get();
    return $rid->result();
  }

  /* RECUPERA TODA LA INFORMACION DEL MENTOR */

  function MentorData($usuario)
  {
    $rid = $this->db->select('*')->from('mentores')->where('Usuario =', $usuario)->get();
    return $rid->result();
  }

  /* ACTUALIZA LA INFORMACION DE UN MENTOR */

  function ActualizaMentorData($username)
  {
    $update_data = array(

			'Nombre' => $this->input->post('nombre'),
			'Paterno' => $this->input->post('paterno'),
			'Materno' => $this->input->post('materno'),
			'Celular' => $this->input->post('celular'),
			//'Usuario' => $this->input->post('usuario'),
			'Email' => $this->input->post('email'),
			'Direccion' => $this->input->post('direccion'),
			'Descripcion' => $this->input->post('descripcion'),
		);

		$this->db->where('Usuario =',$username);

		if($this->db->update('mentores', $update_data)){
			return true;
		}
		else{
			return false;
		}
  }

  /* VERIFICA LAS CREDENCIALES DEL MENTOR */

  function LoginMentor($username, $password)
  {  
    $this->db->select('*')
             ->from('mentores')
             ->where('Usuario', $username);
    
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

  function can_registro()
  {

    $insert_data = array(
      'Dni' => $this->input->post('dni'),
      'Codigo' => $this->input->post('codigo'),
      'Nombre' => $this->input->post('nombre'),
      'Paterno' => $this->input->post('paterno'),
      'Materno' => $this->input->post('materno'),
      'Usuario' => $this->input->post('usuario'),
      'Password' => $this->input->post('password'),
    );

    if($this->db->insert('mentores', $insert_data)){
        return true;
    }
    else{
      return false;
    }
  }

    function VerPostulantes($usuario)
      {
        foreach ($usuario as $v) {
        $query = $this->db->select('*')->from('mentores,estudiantes')->where('mentores.Id',$v->Id)->like('estudiantes.Escuela_Profesional=mentores.Escuela_Profesional')->get();
        return $query->result();
      {
        return true;
      }
    }
  }
    
  /* VER IDEAS ASIGNADAS AL MENTOR */

  function VerIdeasAsignadas($MentorId)
  {
    $Ideas = $this->db->select('*')->from('ideas')->where('IdMentor',$MentorId)->get();
    return $Ideas->result();
  }

  /* OBTENER UNA IDEA EN ESPECIFICO */

  function ObtenerIdea($IdIdea)
  {
    $IdeaEspecifica = $this->db->select('*')->from('ideas')->where('Id',$IdIdea)->get();
    return $IdeaEspecifica->result();
  }

  /* ACEPTAR IDEA */

  function AceptarIdea($IdIdea)
  {
    $update_data = array(
      'Estado' => 2
    );

    $this->db->where('Id =',$IdIdea);
    if($this->db->update('ideas', $update_data)){
      return true;
    }
    else{
      return false;
    }
  }

  /* RECHAZAR IDEA */

  function RechazarIdea($IdIdea)
  {
    $update_data = array(
      'Estado' => 3
    );

    $this->db->where('Id =',$IdIdea);
    if($this->db->update('ideas', $update_data)){
      return true;
    }
    else{
      return false;
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

}