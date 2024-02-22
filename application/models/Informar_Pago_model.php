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

class Informar_Pago_model extends CI_Model {

    function get_datos_postulante($data) {

        $id_postulante = $data['id_postulante'];

        $sql = " CALL sp_get_postulante(?);";

        $query = $this->db->query($sql, array($id_postulante));
        return $query->result_array();
    }

    function setTransferenciaBancaria($data) {
        
        $id_postulacion = $data['id_postulacion'];
        $comprobante = $data['comprobante'];
        $fecha_pago = $data['fecha_pago'];
        $hora_pago = $data['hora_pago'];
        $observaciones = $data['observaciones'];

        $sql = " CALL sp_set_transferencia_bancaria(?,?,?,?,?);";

        $query = $this->db->query($sql, array(
            $id_postulacion,
            $comprobante,
            $fecha_pago,
            $hora_pago,
            $observaciones
        ));

        return $query->result_array();
    }

    function getCuentaTransferencias() {

        $sql = " CALL sp_get_cuenta_bancaria();";

        $query = $this->db->query($sql, array());

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

}
