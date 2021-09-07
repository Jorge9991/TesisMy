<?php
require_once '../conexion/DataBase.php';
require_once '../model/Tesis.php';
require_once '../interface/Itesis.php';
require_once '../dao/daoTesis.php';
require_once '../model/ParciegoTesis.php';
require_once '../interface/Iparciegotesis.php';
require_once '../dao/daoParCiegoTesis.php';
class ctrTesis {
    
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }
    
    public static function getCantidadTesisx2() {
        $Dao = new daoTesis();
        return $Dao->listarcantidadx2();
    }
    public static function getCantidadTesis() {
        $Dao = new daoTesis();
        return $Dao->listarcantidad();
    }

    public static function getTesis($idequipo) {
        $Dao = new daoTesis();
        return $Dao->listar($idequipo);
    }

    public static function getstatus($idequipo) {
        $Dao = new daoTesis();
        return $Dao->status($idequipo);
    }
    public static function getobservacion($idequipo) {
        $Dao = new daoTesis();
        return $Dao->observacion($idequipo);
    }

    public static function aprobar() {
        $datosForm = self::validate();
        $modelo = new Tesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesis();
        switch ($datosForm->opc) {
            case 'A': if ($dao->aprobar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    

    public static function aprobartesis() {
        $datosForm = self::validate();
        $modelo = new ParciegoTesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setIdUsuario($datosForm->idusuario);       
        $dao = new daoParCiegoTesis();
        switch ($datosForm->opc) {
            case 'R': if ($dao->aprobartesis($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function actualizartesis() {
        $datosForm = self::validate();
        $modelo = new ParciegoTesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setIdUsuario($datosForm->idusuario);
      
        $dao = new daoParCiegoTesis();
        switch ($datosForm->opc) {
            case 'U': if ($dao->editar($modelo))
                    return '{"ok":false}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function noaprobartesis() {
        $datosForm = self::validate();
        $modelo = new Tesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setDescripcion($datosForm->descripcion);
        $dao = new daoTesis();
        switch ($datosForm->opc) {
            case 'N': if ($dao->noaprobartesis($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function cancelar() {
        $datosForm = self::validate();
        $modelo = new Tesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesis();
        switch ($datosForm->opc) {
            case 'C': if ($dao->cancelar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
}
