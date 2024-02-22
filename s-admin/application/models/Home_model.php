<?php

/**
 * Login_model
 *
 * Description...
 *
 * @version 0.0.1
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model {

    function getUsuario($data) {

        $rut = $data['rut'];
        $dv = $data['dv'];
        $contrasena = $data['contrasena'];

        $sql = "CALL sp_login_user(?,?,?);";

        $query = $this->db->query($sql, array($rut, $dv, $contrasena));
        return $query->result_array();
    }
    function updatePass($data) {

        $id_usuario = $data['id_usuario'];
        $contrasena_actual = $data['contrasena_actual'];
        $contrasena_nueva = $data['contrasena_nueva'];

        $sql = "CALL sp_user_update_pass(?,?,?);";

        $query = $this->db->query($sql, array($id_usuario,$contrasena_actual, $contrasena_nueva));
        return $query->result_array();
    }

}
