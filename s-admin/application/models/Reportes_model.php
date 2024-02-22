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

class Reportes_model extends CI_Model {

    function getReporte($data) {

        $id_sede = $data['id_sede'];
        $tipo_reporte = $data['tipo_reporte'];
        $sql;

        switch ($tipo_reporte) {
            case '1':
                $sql = " CALL sp_get_reporte_1(?);";
                break;
            case '2':
                $sql = " CALL sp_get_reporte_2(?);";
                break;
            case '3':
                $sql = " CALL sp_get_reporte_3(?);";
                break;
            case '4':
                $sql = " CALL sp_get_reporte_4(?);";
                break;
            case '5':
                $sql = " CALL sp_get_reporte_5(?);";
                break;
        }
        $query = $this->db->query($sql, array($id_sede));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

}
