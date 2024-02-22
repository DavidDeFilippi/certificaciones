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

class Postulante_model extends CI_Model {

    function getPostulante($id_postulante) {

        $sql = "SELECT * FROM tbl_postulante WHERE id_postulante = ?;";

        $query = $this->db->query($sql, array($id_postulante));

        $result = $query->result_array();
        // $query->next_result();
        $query->free_result();
        return $result;
    }

    function setPostulante($data) {

        $id_postulante  = $data['id_postulante'];
        $rut  = $data['rut'];
        $dv  = $data['dv'];
        $nombre  = $data['nombre'];
        $apellido_paterno  = $data['apellido_paterno'];
        $apellido_materno  = $data['apellido_materno'];
        $fecha_nacimiento  = $data['fecha_nacimiento'];
        $sexo  = $data['sexo'];
        $correo_electronico  = $data['correo_electronico'];
        $telefono_celular  = $data['telefono_celular'];
        $direccion  = $data['direccion'];
        $comuna  = $data['comuna'];
        $region  = $data['region'];
        $laboral  = $data['laboral'];

        $sql = "CALL sp_update_postulante_from_admin(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

        $query = $this->db->query($sql, array(
            $id_postulante,
            $rut,
            $dv,
            $nombre,
            $apellido_paterno,
            $apellido_materno,
            $fecha_nacimiento,
            $sexo,
            $correo_electronico,
            $telefono_celular,
            $direccion,
            $comuna,
            $region,
            $laboral
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

}
