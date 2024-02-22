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

class Panel_model extends CI_Model {

    function get_datos_usuario($data) {

        $id_usuario = $data['id_usuario'];

        $sql = " CALL sp_get_datos_usuario(?);";

        $query = $this->db->query($sql, array($id_usuario));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function get_modulos($id_usuario) {

        $sql = " CALL sp_get_modulos_usuario(?);";

        $query = $this->db->query($sql, array(
            $id_usuario
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

}
