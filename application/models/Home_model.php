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

    function getDataByRUT($data) {
        $rut = $data['rut'];
        $dv = $data['dv'];

        $sql = "CALL sp_login_by_rut(?,?);";

        $query = $this->db->query($sql, array($rut, $dv));
        return $query->result_array();
    }

    function getDataByEmail($data) {
        $correo = $data['correo'];

        $sql = "CALL sp_login_by_email(?);";

        $query = $this->db->query($sql, array($correo));
        return $query->result_array();
    }

}
