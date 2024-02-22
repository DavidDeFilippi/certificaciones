<?php

/**
 * Login_model
 *
 * Description...
 *
 * @version 0.0.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reserva_model extends CI_Model {

    function getExamen($data) {

        $id_postulacion = $data['id_postulacion'];

        $sql = " CALL sp_get_examen(?);";

        $query = $this->db->query($sql, array($id_postulacion));
        return $query->result_array();
    }
    function getSedes($data) {

        $id_postulacion = $data['id_postulacion'];

        $sql = " CALL sp_listar_sedes(?);";

        $query = $this->db->query($sql, array($id_postulacion));
        return $query->result_array();
    }

    function getFechasCupos($data) {

        $id_sede = $data['id_sede'];

        $sql = " CALL sp_get_fechas_cupos(?);";

        $query = $this->db->query($sql, array($id_sede));
        return $query->result_array();
    }

    function getCupos($data) {

        $id_sede = $data['id_sede'];
        $fecha = $data['fecha'];

        $sql = " CALL sp_get_cupos(?,?);";

        $query = $this->db->query($sql, array($id_sede, $fecha));
        return $query->result_array();
    }
    
    function setReserva($data) {

        $id_postulacion = $data['id_postulacion'];
        $id_sede = $data['id_sede'];
        $id_certificacion = $data['id_certificacion'];
        $fecha = $data['fecha'];
        $hora = $data['hora'];

        $sql = " CALL sp_set_reserva(?,?,?,?,?);";

        $query = $this->db->query($sql, array($id_postulacion,$id_sede, $id_certificacion,$fecha,$hora));
        return $query->result_array();
    }

}