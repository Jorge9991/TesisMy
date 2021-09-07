<?php
require_once '../conexion/DataBase.php';
require_once '../model/Requisitos.php';
require_once '../interface/Irequisistos.php';
require_once '../dao/daoRequisitos.php';
class ctrRequisitos {
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getRequisitos($idusuario) {
        $Dao = new daoRequisitos();
        return $Dao->listar($idusuario);
    }
    public static function getCantidadRequisitos() {
        $Dao = new daoRequisitos();
        return $Dao->listarcantidad();
    }
    public static function getstatus($idusuario) {
        $Dao = new daoRequisitos();
        return $Dao->status($idusuario);
    }
    public static function getobservacion($idusuario) {
        $Dao = new daoRequisitos();
        return $Dao->observacion($idusuario);
    }

    public static function aprobar() {
        $datosForm = self::validate();
        $modelo = new Requisitos();      
        $modelo->setIdUsuario($datosForm->idUsuario);
        $dao = new daoRequisitos();
        switch ($datosForm->opc) {
            case 'A': if ($dao->aprobar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function aprobarrequisitos() {
        $datosForm = self::validate();
        $modelo = new Requisitos();      
        $modelo->setIdUsuario($datosForm->idUsuario);
        $dao = new daoRequisitos();
        switch ($datosForm->opc) {
            case 'R': if ($dao->aprobarrequisitos($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function noaprobarrequisitos() {
        $datosForm = self::validate();
        $modelo = new Requisitos();      
        $modelo->setIdUsuario($datosForm->idUsuario);
        $modelo->setDescripcion($datosForm->descripcion);
        $dao = new daoRequisitos();
        switch ($datosForm->opc) {
            case 'N': if ($dao->noaprobarrequisitos($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function cancelar() {
        $datosForm = self::validate();
        $modelo = new Requisitos();      
        $modelo->setIdUsuario($datosForm->idUsuario);
        $dao = new daoRequisitos();
        switch ($datosForm->opc) {
            case 'C': if ($dao->cancelar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
      //envio de correo
       public static function enviarcorreo() {
        include('../controller/ctrEmail.php');
        $datosForm = self::validate();
        $datos = $datosForm->idUsuario;
        enviorequisitos($datos);
    }

}
