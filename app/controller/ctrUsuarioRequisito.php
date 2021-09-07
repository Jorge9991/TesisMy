<?php
require_once '../conexion/DataBase.php';
require_once '../model/UsuarioRequisitos.php';
require_once '../interface/Iusuariorequisito.php';
require_once '../dao/daoUsuarioRequisito.php';

class ctrUsuarioRequisito {
    
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getUsuariorequisitos() {
        $Dao = new daoUsuarioRequisito();
        return $Dao->listar();
    }
    public static function getcantidadrequisitos() {
        $Dao = new daoUsuarioRequisito();
        return $Dao->cantidad();
    }

 
}
