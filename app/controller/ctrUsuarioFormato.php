<?php
require_once '../conexion/DataBase.php';
require_once '../model/UsuarioFormato.php';
require_once '../interface/Iusuarioformato.php';
require_once '../dao/daoUsuarioFormato.php';

class ctrUsuarioFormato {
    
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getUsuarioformatos() {
        $Dao = new daoUsuarioFormato();
        return $Dao->listar();
    }
    public static function getUsuarioformatos2() {
        $Dao = new daoUsuarioFormato();
        return $Dao->listar2();
    }
    public static function getcantidadformatos() {
        $Dao = new daoUsuarioFormato();
        return $Dao->cantidad();
    }

 
}
