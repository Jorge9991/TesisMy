<?php

require_once '../conexion/DataBase.php';
require_once '../model/Nota.php';
require_once '../interface/Inota.php';
require_once '../dao/daoNota.php';

class ctrNota {

    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getNotastodas() {
        $Dao = new daoNota();
        return $Dao->listarall();
    }
    public static function getNotas($idusuario,$idequipo) {
        $Dao = new daoNota();
        return $Dao->listar($idusuario,$idequipo);
    }
    public static function getNotasgrupo($idequipo) {
        $Dao = new daoNota();
        return $Dao->listarnota($idequipo);
    }

    public static function crear() {
        $datosForm = self::validate();
        $modelo = new Nota();
        $modelo->setIdUsuario($datosForm->idusuario);
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setNota($datosForm->nota);
        $dao = new daoNota();
        switch ($datosForm->opc) {
            case 'C': if ($dao->crear($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function actualizar() {
        $datosForm = self::validate();
        $modelo = new Nota();
        $modelo->setIdUsuario($datosForm->idusuario);
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setNota($datosForm->nota);
        $dao = new daoNota();
        switch ($datosForm->opc) {
            case 'A': if ($dao->actualizar($modelo))
                    return '{"ok":false}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

}
