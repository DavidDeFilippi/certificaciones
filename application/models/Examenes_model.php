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

class Examenes_model extends CI_Model {

    function getExamenes($data) {

        $id_postulante = $data['id_postulante'];

        $sql = " CALL sp_get_datos_certificacion(?);";

        $query = $this->db->query($sql, array($id_postulante));

       $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function setPago($data) {
        
        $id_postulacion = $data['id_postulacion'];

        $sql = " CALL sp_get_postulacion(?);";

        $query = $this->db->query($sql, array(
            $id_postulacion
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function getCuentaTransferencias() {

        $sql = " CALL sp_get_cuenta_bancaria();";

        $query = $this->db->query($sql, array());

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function saveWPResult($data){
        $data = json_decode(json_encode($data), true);

        $buyOrder = $data['detailOutput']['buyOrder'];
        $responseCode = $data['detailOutput']['responseCode'];
        $sessionId = $data['sessionId'];
        $cardNumber = $data['cardDetail']['cardNumber'];
        $cardExpirationDate = $data['cardDetail']['cardExpirationDate'];
        $accountingDate = $data['accountingDate'];
        $transactionDate = $data['transactionDate'];
        $VCI = $data['VCI'];
        $paymentTypeCode = $data['detailOutput']['paymentTypeCode'];
        $amount = $data['detailOutput']['amount'];
        $sharesNumber = $data['detailOutput']['sharesNumber'];
        $commerceCode = $data['detailOutput']['commerceCode'];

        $sql = " CALL sp_insert_webpay(?,?,?,?,?,?,?,?,?,?,?,?);";

        $query = $this->db->query($sql, array(
            $buyOrder,
            $responseCode,
            $sessionId,
            $cardNumber,
            $cardExpirationDate,
            $accountingDate,
            $transactionDate,
            $VCI,
            $paymentTypeCode,
            $amount,
            $sharesNumber,
            $commerceCode
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function getExamenesCBXBySede($data) {
        $id_sede = $data['id_sede'];
        $sql = "CALL sp_get_examenes_cbx_by_sede(?);";

        $query = $this->db->query($sql, array(
            $id_sede
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function updateCertificacion($data) {
        $id_postulacion = $data['id_postulacion'];
        $id_certificacion = $data['id_certificacion'];
        $sql = "CALL sp_update_certificacion_postulacion(?,?);";

        $query = $this->db->query($sql, array(
            $id_postulacion,$id_certificacion
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

}