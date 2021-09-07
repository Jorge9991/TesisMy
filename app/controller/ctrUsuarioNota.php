<?php
require_once '../conexion/DataBase.php';
require_once '../model/UsuarioNota.php';
require_once '../interface/Iusuarionota.php';
require_once '../dao/daoUsuarioNota.php';
class ctrUsuarioNota {
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getUsuarionota() {
        $Dao = new daoUsuarioNota();
        return $Dao->listar();
    }
    public static function getUsuarionota2() {
        $Dao = new daoUsuarioNota();
        return $Dao->listar2();
    }

}
