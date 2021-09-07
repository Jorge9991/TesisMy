<?php

require_once '../conexion/DataBase.php';
require_once '../model/Documento.php';
require_once '../interface/Idocumento.php';
require_once '../dao/daoDocumentos.php';

class ctrDocumento {

    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getDocumento1() {
        $Dao = new daoDocumentos();
        return $Dao->listarformatos();
    }

    public static function getDocumento2() {
        $Dao = new daoDocumentos();
        return $Dao->listaranteproyecto();
    }

    public static function getDocumento3() {
        $Dao = new daoDocumentos();
        return $Dao->listartesis();
    }

}
