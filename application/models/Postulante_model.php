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

    function get_datos_postulante($data) {

        $id_postulante = $data['id_postulante'];

        $sql = " CALL sp_get_postulante(?);";

        $query = $this->db->query($sql, array($id_postulante));
        return $query->result_array();
    }

    function upPostulante($data) {
        
        $id_postulante = $data['id_postulante'];
        $nombre = $data['nombre'];
        $apellido_paterno = $data['apellido_paterno'];
        $apellido_materno = $data['apellido_materno'];
        $sexo = $data['sexo'];
        $fecha_nacimiento = $data['fecha_nacimiento'];
        $nacionalidad = $data['nacionalidad'];
        $region = $data['region'];
        $comuna = $data['comuna'];
        $direccion = $data['direccion'];
        $laboral = $data['laboral'];
        $telefono_celular = $data['telefono_celular'];
        $correo_electronico = $data['correo_electronico'];

        $sql = " CALL sp_set_datos_postulante(?,?,?,?,?,?,?,?,?,?,?,?,?);";

        $query = $this->db->query($sql, array(
            $id_postulante,
            $nombre,
            $apellido_paterno,
            $apellido_materno,
            $sexo,
            $fecha_nacimiento,
            $nacionalidad,
            $region,
            $comuna,
            $direccion,
            $laboral,
            $telefono_celular,
            $correo_electronico
        ));

        return $query->result_array();
    }

}
