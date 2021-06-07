<?php
class GeneralModel extends CI_Model
{
    /* OBTIENE SOLO 3 EVENTOS DESDE EL MÁS ANTIGUO AL MÁS NUEVO */
    
    function ShowSelectedEventos()
    {
        $this->db->select('*');
        $this->db->from('eventos');
        $this->db->order_by('id','desc');
        $this->db->limit('3');
        $eventos = $this->db->get();
        return $eventos->result();
    }

    /* OBTIENE TODOS LOS EVENTOS DESDE EL MÁS ANTIGU AL MÁS NUEVO */

    function ShowAllEventos()
    {
        $this->db->select('*');
        $this->db->from('eventos');
        $this->db->order_by('id','desc');
        $eventos = $this->db->get();
        return $eventos->result();
    }

    /* GUARDA LOS DATOS DEL CONTACTO */

    function ContactoValidation()
    {   
        $email_contacto = $this->db->select('*')->from('comentarios')->where('Email =',$this->input->post('email'))->get();

        if($email_contacto->num_rows() == 0){
            $insert_data = array(
            'Nombres' => $this->input->post('nombre'),
            'Email' => $this->input->post('email'),
            'Mensaje' => $this->input->post('mensaje'),
            );

            if($this->db->insert('comentarios', $insert_data)){

                return 'EXITO';
            } else {

                return 'ERROR_REGISTRO';
            }
        } else {

            return 'ERROR_EXISTENCIA';
        }
    }

    /* GUARDA LOS DATOS DE LA SUSCRIPCION */

    function SuscriptionValidation()
    {
        $email_suscripcion = $this->db->select('*')->from('suscripciones')->where('Email =',$this->input->post('email'))->get();
        
        if($email_suscripcion->num_rows() == 0){

            $insert_data = array(
            'Email' => $this->input->post('email'),
            );
            
            if($this->db->insert('suscripciones', $insert_data)){

                return 'EXITO';

            } else {

                return 'ERROR_REGISTRO';
            }
        } else {

            return 'ERROR_EXISTENCIA';
        }
    }
}