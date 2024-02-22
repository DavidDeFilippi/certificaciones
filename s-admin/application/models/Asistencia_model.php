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

class Asistencia_model extends CI_Model {

    function getSedesCBX() {

        $sql = " CALL sp_get_sedes_cbx();";

        $query = $this->db->query($sql, array());

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function getSalasCBXBySede($data) {
        $id_sede = $data['id_sede'];
        $sql = "CALL sp_get_salas_cbx_by_sede(?);";

        $query = $this->db->query($sql, array(
            $id_sede
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function getFechasSalaCBX($data) {
        $id_sala = $data['id_sala'];
        $sql = "CALL sp_get_fechas_by_sala(?);";

        $query = $this->db->query($sql, array($id_sala));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function getBloquesFechaBySala($data) {
        $id_sala = $data['id_sala'];
        $fecha = $data['fecha'];
        $sql = "CALL sp_get_bloques_sala_by_fecha_asistencia(?,?);";

        $query = $this->db->query($sql, array($id_sala, $fecha));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }
    function getCuposbyIdBloque($data) {
        $id_bloque = $data['id_bloque'];
        $sql = "CALL sp_get_cupos_by_id_bloque_asistencia(?);";

        $query = $this->db->query($sql, array($id_bloque));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }
    function insertAsistenciaPostulante($data) {
        $id_bloque = $data['id_bloque'];
        $id_cupo = $data['id_cupo'];
        $asiste = $data['asiste'];
        $sql = "CALL sp_set_asistencia(?,?,?);";

        $query = $this->db->query($sql, array($id_bloque, $id_cupo, $asiste));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

}
