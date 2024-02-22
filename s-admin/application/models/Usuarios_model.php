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

class Usuarios_model extends CI_Model {

    function setUsuario($data) {

        $rut = $data['rut'];
        $dv = $data['dv'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $email = $data['email'];

        $sql = " CALL sp_set_usuario(?,?,?,?,?);";

        $query = $this->db->query($sql, array(
            $rut ,
            $dv ,
            $nombre ,
            $apellido ,
            $email
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function setUsuarioPrivilegio($data) {

        $id_usuario = $data['id_usuario'];
        $privilegio = $data['privilegio'];

        $sql = " CALL sp_set_usuario_privilegio(?,?);";

        $query = $this->db->query($sql, array($id_usuario,$privilegio));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function getUsuarios() {

        $sql = " CALL sp_get_usuarios();";

        $query = $this->db->query($sql, array());

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function cambiarEstadoUsuario($id_usuario) {

        $sql = "CALL sp_update_estado_usuario(?);";

        $query = $this->db->query($sql, array(
            $id_usuario
        ));
        
        return $query->result_array();
    }

    function enviarContrasena($data) {
        $id_usuario = $data['id_usuario'];
        $sql = "CALL sp_reset_password_usuario(?);";

        $query = $this->db->query($sql, array(
            $id_usuario
        ));
        
        return $query->result_array();
    }

}
