<?php
require_once '../conexion/DataBase.php';
require_once '../model/UsuarioTutor.php';
require_once '../interface/Iusuariotutor.php';
require_once '../dao/daoUsuarioTutor.php';
class ctrUsuarioTutor {
    
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getUsuario($idusuario) {
        $Dao = new daoUsuarioTutor();
        return $Dao->listar($idusuario);
    }
    public static function getsoytutor($idusuario) {
        $Dao = new daoUsuarioTutor();
        return $Dao->soytutor($idusuario);
    }

    public static function getUsuario2($idusuario) {
        $Dao = new daoUsuarioTutor();
        return $Dao->listar2($idusuario);
    }
    
    //todo
    public static function getUsuariotodo() {
        $Dao = new daoUsuarioTutor();
        return $Dao->listartodo();
    }

    public static function getUsuariotodo2() {
        $Dao = new daoUsuarioTutor();
        return $Dao->listartodo2();
    }

}
