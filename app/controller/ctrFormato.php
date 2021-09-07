<?php
require_once '../conexion/DataBase.php';
require_once '../model/Formato.php';
require_once '../interface/Iformato.php';
require_once '../dao/daoFormato.php';

class ctrFormato {
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getFormatos($idequipo) {
        $Dao = new daoFormato();
        return $Dao->listar($idequipo);
    }
    public static function getCantidadFormatosx2() {
        $Dao = new daoFormato();
        return $Dao->listarcantidadx2();
    }
    public static function getCantidadFormatos() {
        $Dao = new daoFormato();
        return $Dao->listarcantidad();
    }
    public static function getFormatostodos($idequipo) {
        $Dao = new daoFormato();
        return $Dao->listartodo($idequipo);
    }
    public static function getTema($idequipo) {
        $Dao = new daoFormato();
        return $Dao->listartema($idequipo);
    }
    public static function getHabilidad($idequipo) {
        $Dao = new daoFormato();
        return $Dao->listarhabilidades($idequipo);
    }
    public static function getstatus($idequipo) {
        $Dao = new daoFormato();
        return $Dao->status($idequipo);
    }
    public static function getstatus2($idequipo) {
        $Dao = new daoFormato();
        return $Dao->status2($idequipo);
    }
    public static function getobservacion($idequipo) {
        $Dao = new daoFormato();
        return $Dao->observacion($idequipo);
    }

    public static function aprobar() {
        $datosForm = self::validate();
        $modelo = new Formato();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoFormato();
        switch ($datosForm->opc) {
            case 'A': if ($dao->aprobar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function aprobarformato() {
        $datosForm = self::validate();
        $modelo = new Formato();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoFormato();
        switch ($datosForm->opc) {
            case 'R': if ($dao->aprobarformato($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function noaprobarformato() {
        $datosForm = self::validate();
        $modelo = new Formato();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setDescripcion($datosForm->descripcion);
        $dao = new daoFormato();
        switch ($datosForm->opc) {
            case 'N': if ($dao->noaprobarformato($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function cancelar() {
        $datosForm = self::validate();
        $modelo = new Formato();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoFormato();
        switch ($datosForm->opc) {
            case 'C': if ($dao->cancelar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
        //envio de correo a egresado
       public static function enviarcorreo() {
        include('../controller/ctrEmail.php');
        $datosForm = self::validate();
        $datos = $datosForm->idequipo;
        envioformatos($datos);
    }
    
}
