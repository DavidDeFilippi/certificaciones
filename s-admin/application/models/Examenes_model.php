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

class Examenes_model extends MY_Model {

    // function getExamenes() {

    //     $sql = " CALL sp_get_examenes();";

    //     $query = $this->db->query($sql, array());
    //     return $query->result_array();
        
    // }
    function getExamenes($id_sede) {

        $sql = " CALL sp_get_examenes_by_sede(?);";

        $query = $this->db->query($sql, array($id_sede));
        return $query->result_array();
        
    }

    function getSalas($id_sede) {

        $sql = " CALL sp_get_salas_by_sede(?);";

        $query = $this->db->query($sql, array($id_sede));
        return $query->result_array();
    }

    function getSalasCuposTotales($id_sede) {

        $sql = " CALL sp_get_salas_cupos_totales_by_sede(?);";

        $query = $this->db->query($sql, array($id_sede));
        return $query->result_array();
    }

    function getExamen($id_certificacion) {

        $sql = " CALL sp_get_examen_para_admin(?);";

        $query = $this->db->query($sql, array($id_certificacion));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }
    function getSede($id_sede) {

        $sql = " CALL sp_get_sede_para_admin(?);";

        $query = $this->db->query($sql, array($id_sede));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function getSedes($id_certificacion) {

        $sql = " CALL sp_get_sedes_by_id_certificacion(?);";

        $query = $this->db->query($sql, array($id_certificacion));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function getSedesTodas() {

        $sql = " CALL sp_get_sedes();";

        $query = $this->db->query($sql, array());

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
        
        return $query->result_array();
    }

    function setDatosBasicos($data) {

        $id_certificacion = $data['id_certificacion'];
        $nombre_certificacion = $data['nombre_certificacion'];
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_termino = $data['fecha_termino'];
        $valor_certificacion = $data['valor_certificacion'];

        $sql = " CALL sp_update_certificacion(?,?,?,?,?);";

        $query = $this->db->query($sql, array(
            $id_certificacion,
            $nombre_certificacion,
            $fecha_inicio,
            $fecha_termino,
            $valor_certificacion
        ));
        
        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function setPostulante($data) {

        $id_sede = $data['id_sede'];
        $rut = $data['rut'];
        $dv = $data['dv'];
        $nombre = $data['nombre'];
        $apellido_paterno = $data['apellido_paterno'];
        $apellido_materno = $data['apellido_materno'];
        $correo_electronico = $data['correo_electronico'];
        $telefono = $data['telefono'];
        $examen = $data['examen'];

        $sql = "CALL sp_set_postulante(?,?,?,?,?,?,?,?,?);";

        $query = $this->db->query($sql, array(
            $id_sede,
            $rut,
            $dv,
            $nombre,
            $apellido_paterno,
            $apellido_materno,
            $correo_electronico,
            $telefono,
            $examen 
        ));
        
        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function setSala($data) {

        $id_sede = $data['id_sede'];
        $nombre_sala = $data['nombre_sala'];
        $capacidad_sala = $data['capacidad_sala'];

        $sql = "CALL sp_set_sala(?,?,?);";

        $query = $this->db->query($sql, array(
            $id_sede,
            $nombre_sala,
            $capacidad_sala
        ));
        
        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function setExamen($data) {
        $id_sede = $data['id_sede'];
        $nombre_certificacion = $data['nombre_certificacion'];
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_termino = $data['fecha_termino'];
        $valor_certificacion = $data['valor_certificacion'];
        $estado = $data['estado'];

        $sql = "CALL sp_set_certificacion(?,?,?,?,?,?);";

        $query = $this->db->query($sql, array(
            $id_sede,
            $nombre_certificacion,
            $fecha_inicio,
            $fecha_termino,
            $valor_certificacion,
            $estado
        ));
        
        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }
    function updateSede($data) {

        $id_sede = $data['id_sede'];
        $nombre_sede = $data['nombre_sede'];
        $direccion_sede = $data['direccion_sede'];
        $fono_sede = $data['fono_sede'];

        $sql = " CALL sp_update_sede(?,?,?,?);";

        $query = $this->db->query($sql, array(
            $id_sede ,
            $nombre_sede ,
            $direccion_sede ,
            $fono_sede 
        ));
        
        return $query->result_array();
    }

    function setSedeSinExamen($data) {
        $nombre_sede = $data['nombre_sede'];
        $direccion_sede = $data['direccion_sede'];
        $fono_sede = $data['fono_sede'];

        $sql = " CALL sp_set_sede_sin_examen(?,?,?);";

        $query = $this->db->query($sql, array(
            $nombre_sede ,
            $direccion_sede ,
            $fono_sede 
        ));
        
        return $query->result_array();
    }

    function setExamenfromCBX($data) {

        $id_certificacion = $data['id_certificacion'];
        $id_sede = $data['id_sede'];

        $sql = " CALL sp_set_certificacion_sede(?,?);";

        $query = $this->db->query($sql, array(
            $id_certificacion ,
            $id_sede
        ));
        
        return $query->result_array();
    }

    function aprobarRechazarTransferenciaBancaria($data) {

        $id_postulacion = $data['id_postulacion'];
        $resultado_pago = $data['resultado_pago'];

        $sql = " CALL sp_aprobarRechazarTransferenciaBancaria(?,?);";

        $query = $this->db->query($sql, array(
            $id_postulacion ,
            $resultado_pago
        ));
        
        return $query->result_array();
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
        $sql = "CALL sp_get_bloques_sala_by_fecha(?,?);";

        $query = $this->db->query($sql, array($id_sala, $fecha));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }
    function getCuposbyIdBloque($data) {
        $id_bloque = $data['id_bloque'];
        $sql = "CALL sp_get_cupos_by_id_bloque(?);";

        $query = $this->db->query($sql, array($id_bloque));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }
    
    function getExamenesCBXALL($data) {
        $id_sede = $data['id_sede'];
        $sql = "CALL sp_get_examenes_cbx(?);";

        $query = $this->db->query($sql, array($id_sede));

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

    function getDatosTransferenciaBancaria($data) {
        $id_postulacion = $data['id_postulacion'];
        $sql = "CALL sp_get_datos_transferencia_by_id_postulacion(?);";

        $query = $this->db->query($sql, array(
            $id_postulacion
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function setHorariosSala($data) {
        $id_sala = $data['id_sala'];
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_termino = $data['fecha_termino'];

        $sql = "CALL sp_set_horarios_sala(?,?,?);";

        $query = $this->db->query($sql, array(
            $id_sala,
            $fecha_inicio,
            $fecha_termino
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function setCupo($id_bloque) {

        $sql = "CALL sp_set_cupo(?);";

        $query = $this->db->query($sql, array(
            $id_bloque,
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        if($result[0]['respuesta'] == 1){
            return 1;
        }else{
            return 0;
        }
        
    }

    function getPostulantes($id_sede) {

        $sql = "CALL sp_get_postulantes_by_id_sede(?);";

        $query = $this->db->query($sql, array(
            $id_sede
        ));

        $result = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $result;
    }

    function cambiarEstadoSede($id_sede) {

        $sql = "CALL sp_update_estado_sede(?);";

        $query = $this->db->query($sql, array(
            $id_sede
        ));
        
        return $query->result_array();
    }

    function cambiarEstadoExamen($id_certificacion) {

        $sql = "CALL sp_update_estado_certificacion(?);";

        $query = $this->db->query($sql, array(
            $id_certificacion
        ));
        
        return $query->result_array();
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

        return $query->result_array();
    }

    function setPostulanteCM($data){

        $id_sede = $data['id_sede'];
        $id_certificacion= $data['postulante']['id_certificacion'];
        unset($data['postulante']['id_certificacion']);
        $postulante_data = $data['postulante'];
        $columnas_data = $data['postulante'];
        $columnas = array();
        $interrogacion_columnas = '';
        $valores = array();
        $rutparavalidarexistencia;
        $rut_completo;

        foreach ($columnas_data as $key => $value){
            switch ($key) {
                case 'rut_completo':
                    $columnas[] = 'rut';
                    $columnas[] = 'dv';
                    $columnas[] = 'rut_completo';
                    $xrut;
                    if($this->RUTconCaracteresInvalidos($postulante_data[trim($key)])){
                        $resultado[0]['resultado'] = 0;
                        $resultado[0]['mensaje'] = 'RUT INVÁLIDO';
                        return $resultado;
                        die();
                    }else{
                        if($this->validaRut($postulante_data[$key])){
                            if(strpos($postulante_data[$key],"-")==false){
                                $xrut[0] = substr($postulante_data[$key], 0, -1);
                                $xrut[1] = substr($postulante_data[$key], -1);
                            }else{
                                $xrut = explode("-", trim($postulante_data[$key]));
                            }
                            $rutparavalidarexistencia = $xrut[0];
                            $valores[] = $xrut[0];
                            $valores[] = $xrut[1];
                        }else{
                            $resultado[0]['resultado'] = 0;
                            $resultado[0]['mensaje'] = 'RUT INVÁLIDO';
                            return $resultado;
                            die();
                        }
                    }
                    $valores[] = $postulante_data[$key];
                    break;
                case 'rut':
                    $columnas[] = 'rut';
                    $valores[] = $postulante_data[$key];
                    $rut_completo .= $postulante_data[$key].'-';
                    break;
                case 'dv':
                    $columnas[] = 'dv';
                    $valores[] = $postulante_data[$key];
                    $rut_completo .= $postulante_data[$key];
                    break;
                case 'nombre_completo':
                    $nombre_en_pedazos;
                    $nombre_en_pedazos_inverso;
                    if($postulante_data[$key] != ''){
                        $nombre_en_pedazos = explode(' ', $postulante_data[$key]);
                        if(count($nombre_en_pedazos) > 0){
                            $nombre_en_pedazos_inverso = array_reverse($nombre_en_pedazos);
                            if(count($nombre_en_pedazos_inverso) >= 4){
                                $columnas[] = 'apellido_materno';
                                $columnas[] = 'apellido_paterno';
                                $columnas[] = 'nombre';
                                $valores[] = $nombre_en_pedazos_inverso[0];
                                $valores[] = $nombre_en_pedazos_inverso[1];
                                $valores[] = $nombre_en_pedazos_inverso[3].' '.$nombre_en_pedazos_inverso[2];
                            }else if(count($nombre_en_pedazos_inverso) >= 3){
                                $columnas[] = 'apellido_materno';
                                $columnas[] = 'apellido_paterno';
                                $columnas[] = 'nombre';
                                $valores[] = $nombre_en_pedazos_inverso[0];
                                $valores[] = $nombre_en_pedazos_inverso[1];
                                $valores[] = $nombre_en_pedazos_inverso[2];
                            }else if(count($nombre_en_pedazos_inverso) >= 2){
                                $columnas[] = 'apellido_paterno';
                                $columnas[] = 'nombre';
                                $valores[] = $nombre_en_pedazos_inverso[0];
                                $valores[] = $nombre_en_pedazos_inverso[1];
                            }else if(count($nombre_en_pedazos_inverso) >= 1){
                                $columnas[] = 'nombre';
                                $valores[] = $nombre_en_pedazos_inverso[0];
                            }
                        }
                    }
                    break;
                case 'nombres':
                    $columnas[] = 'nombre';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'apellidos':
                    $columnas[] = 'apellido_paterno';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'apellido_paterno':
                    $columnas[] = 'apellido_paterno';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'apellido_materno':
                    $columnas[] = 'apellido_materno';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'telefono':
                    $columnas[] = 'telefono_celular';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'email':
                    $columnas[] = 'correo_electronico';
                    if($postulante_data[$key] == ''){
                        $numero_aleatorio = rand(0,1000);
                        $numero_aleatorio2 = rand(0,1000);
                        $postulante_data[$key] = $id_certificacion.$id_sede.$numero_aleatorio.$numero_aleatorio2.'@postulante.segacy';
                    }
                    $valores[] = $postulante_data[$key];
                    break;
                case 'genero':
                    $columnas[] = 'sexo';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'f_nac':
                    $columnas[] = 'fecha_nacimiento';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'nacionalidad':
                    $columnas[] = 'nacionalidad';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'direccion':
                    $columnas[] = 'direccion';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'comuna':
                    $columnas[] = 'comuna';
                    $valores[] = $postulante_data[$key];
                    break;
                case 'region':
                    $columnas[] = 'region';
                    $valores[] = $postulante_data[$key];
                    break;
                case 's_laboral':
                    $columnas[] = 'laboral';
                    $valores[] = $postulante_data[$key];
                    break;
            }
        }
        if(isset($rut_completo)){
            $columnas[] = 'rut_completo';
            $valores[] = $rut_completo;
        }

        if($this->existePostulante($rutparavalidarexistencia)){
            $this->db->select('id_postulante');
            $this->db->where('rut',$rutparavalidarexistencia);
            $query = $this->db->get('tbl_postulante', 1);
            $resultadodb = json_decode(json_encode($query->result()));
            $resultadodb = json_decode(json_encode($resultadodb[0]), true);

            if($this->existePostulanteEnPostulacion($id_certificacion, $resultadodb['id_postulante'])){
                $resultado[0]['resultado'] = 0;
                $resultado[0]['mensaje'] = 'POSTULANTE YA SE ENCUENTRA REGISTRADO EN ESTE EXAMEN.';
                return $resultado;
            }else{
                $query = $this->db->set('id_postulante', $resultadodb['id_postulante']); 
                $query = $this->db->set('id_certificacion', $id_certificacion); 
                $query = $this->db->set('id_sede', $id_sede); 
                $query = $this->db->insert('tbl_postulacion'); 
                if($this->db->affected_rows() > 0) {
                    $postulacion_id = $this->db->insert_id();
                    $resultado[0]['resultado'] = 2;
                    $resultado[0]['mensaje'] = 'POSTULANTE YA SE ECUENTRA REGISTRADO; HA QUEDADO INSCRITO EN EL EXAMEN.';
                    return $resultado;
                }else{
                    $resultado[0]['resultado'] = 0;
                    $resultado[0]['mensaje'] = 'ERROR 500';
                    return $resultado;
                }
            }
        }else{
            for ($i=0; $i < count($columnas) ; $i++) { 
                $query = $this->db->set($columnas[$i], $valores[$i]); 
            }
            $query = $this->db->insert('tbl_postulante'); 
            if($this->db->affected_rows() > 0) {
                $postulante_id = $this->db->insert_id();
                $query = $this->db->set('id_postulante', $postulante_id); 
                $query = $this->db->set('id_certificacion', $id_certificacion); 
                $query = $this->db->set('id_sede', $id_sede); 
                $query = $this->db->insert('tbl_postulacion'); 
                if($this->db->affected_rows() > 0) {
                    $postulacion_id = $this->db->insert_id();
                    $resultado[0]['resultado'] = 1;
                    $resultado[0]['mensaje'] = 'OK';
                    return $resultado;
                }else{
                    $resultado[0]['resultado'] = 0;
                    $resultado[0]['mensaje'] = 'ERROR 500';
                    return $resultado;
                }
            }else{
                $resultado[0]['resultado'] = 0;
                $resultado[0]['mensaje'] = 'ERROR 500';
                return $resultado;
            }
        }
    }

    function validaRut($rut){
        $xrut;
        if(strpos($rut,"-")==false){
            $xrut[0] = substr($rut, 0, -1);
            $xrut[1] = substr($rut, -1);
        }else{
            $xrut = explode("-", trim($rut));
        }
        $elRut = str_replace(".", "", trim($xrut[0]));
        $factor = 2;
        $suma=0;
        for($i = strlen($elRut)-1; $i >= 0; $i--):
            $factor = $factor > 7 ? 2 : $factor;
            $suma += $elRut{$i}*$factor++;
        endfor;
        $resto = $suma % 11;
        $dv = 11 - $resto;
        if($dv == 11){
            $dv=0;
        }else if($dv == 10){
            $dv="k";
        }else{
            $dv=$dv;
        }
       if($dv == trim(strtolower($xrut[1]))){
           return true;
       }else{
           return false;
       }
    }

    function RUTconCaracteresInvalidos($rut){
        if(
            strpos($rut, "_") !== false ||
            strpos($rut, " ") !== false ||
            strpos($rut, "@") !== false ||
            strpos($rut, "/") !== false ||
            strpos($rut, "'") !== false ||
            strpos($rut, "]") !== false ||
            strpos($rut, "[") !== false ||
            strpos($rut, "#") !== false ||
            strpos($rut, "&") !== false ||
            strpos($rut, "*") !== false ||
            strpos($rut, "^") !== false ||
            strpos($rut, "!") !== false ||
            strpos($rut, "?") !== false ||
            strpos($rut, "{") !== false ||
            strpos($rut, "}") !== false 
           ){return true;}else{return false;}
    }
    function existePostulante($key)
{
    $this->db->where('rut',$key);
    $query = $this->db->get('tbl_postulante');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}
    function existePostulanteEnPostulacion($key1, $key2)
{
    $this->db->where('id_certificacion',$key1);
    $this->db->where('id_postulante',$key2);
    $query = $this->db->get('tbl_postulacion');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}

}