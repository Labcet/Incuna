<?php  
 class Main_model extends CI_Model  
 {  
 	function can_evento()
			{
				$this->db->select('*');
				$this->db->from('eventos');
				$this->db->order_by('id','desc');
				$this->db->limit('3');
				$eventos = $this->db->get();
				return $eventos->result();
			}

			/*function p_login($username, $password){

				$data = $this->db->get_where('estudiantes',array('Usuario' => $username, 'Password' => $password),1);
				if(!$data->result()){
						return false;
				}
				return $data->result();
			}*/

			/*function can_login($username, $password)  
			{  
					 $this->db->where('Usuario', $username);  
					 $this->db->where('Password', $password);  
					 $query = $this->db->get('estudiantes');  
					 //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
					 if($query->num_rows() > 0)  
					 {  
								return true;  
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

				if($this->db->insert('estudiantes', $insert_data)){
						return true;
				}
				else{
					return false;
				}
			}

			function can_registro_empresa()
			{

				$insert_data = array(
					'Nombre' => $this->input->post('nombre'),
					'RazonSocial' => $this->input->post('razon_social'),
					'Ruc' => $this->input->post('ruc'),
					'Direccion' => $this->input->post('direccion'),
					'NombreRep' => $this->input->post('nombre_rep'),
					'PaternoRep' => $this->input->post('paterno_rep'),
					'MaternoRep' => $this->input->post('materno_rep'),
					'DniRep' => $this->input->post('dni_rep'),
					'Usuario' => $this->input->post('usuario'),
					'Password' => $this->input->post('password'),
				);

				if($this->db->insert('empresas', $insert_data)){
						return true;
				}
				else{
					return false;
				}
			}

			function can_update($username)
			{

				$insert_data = array(
					'Nombre' => $this->input->post('nombre'),
					'Paterno' => $this->input->post('paterno'),
					'Materno' => $this->input->post('materno'),
					'Celular' => $this->input->post('celular'),
					'Usuario' => $this->input->post('usuario'),
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


			function can_contactos()
			{

				$insert_data = array(
					'Nombres' => $this->input->post('nombre'),
					'Email' => $this->input->post('email'),
					'mensaje' => $this->input->post('mensaje'),
				);

				if($this->db->insert('comentarios', $insert_data)){
						return true;
				}
				else{
					return false;
				}
			}

			function can_test_v2()
			{
				$query = $this->db->select('*')->from('tblpreguntas')->get();
				return $query->result();
			}

			

			function recupera_id($usuario)
			{
				$rid = $this->db->select('*')->from('estudiantes')->where('Usuario =', $usuario)->get();
				return $rid->result();
			}

			function can_test($i,$uname)
			{
					foreach ($uname as $v) {
						$insert_data = array(
						'IdUsuario' => $v->Id,
						'IdPregunta' => $i,
						'Respuesta' => $this->input->post('r'.$i),
						);
					}
					
					if($this->db->insert('tbltest1', $insert_data)){
							return true;
					}
					else{
						return false;
					}
			}

			function suma_test($usuario){

					foreach ($usuario as $s_var) {
						$suma_t= $this->db->select('*')->from('tbltest1')->where('IdUsuario =', $s_var->Id)->get();
					}
					return $suma_t->result();
			}*/

		 }