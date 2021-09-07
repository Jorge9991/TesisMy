<?php

require_once '../conexion/DataBase.php';
require_once '../model/UsuarioAnteproyecto.php';
require_once '../interface/Iusuarioanteproyecto.php';
require_once '../dao/daoUsuarioAnteproyecto.php';

class ctrUsuarioAnteproyecto {

    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getUsuarioanteproyecto() {
        $Dao = new daoUsuarioAnteproyecto();
        return $Dao->listar();
    }

    public static function getUsuarioanteproyecto2() {
        $Dao = new daoUsuarioAnteproyecto();
        return $Dao->listar2();
    }

    public static function getcantidadanteproyectos() {
        $Dao = new daoUsuarioAnteproyecto();
        return $Dao->cantidad();
    }

    // lista para jurados

    public static function getlistadeanteproyectos($idusuario) {
        $Dao = new daoUsuarioAnteproyecto();
        return $Dao->listaranteproyectos($idusuario);
    }

    public static function getlistadeanteproyectos2($idusuario) {
        $Dao = new daoUsuarioAnteproyecto();
        return $Dao->listaranteproyectos2($idusuario);
    }

    public static function getcantidadanteproyectosjurado($idusuario) {
        $Dao = new daoUsuarioAnteproyecto();
        return $Dao->cantidadproyectos($idusuario);
    }

}
