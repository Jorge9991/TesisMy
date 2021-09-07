<?php
require_once '../conexion/DataBase.php';
require_once '../model/UsuarioTesis.php';
require_once '../interface/Iusuariotesis.php';
require_once '../dao/daoUsuarioTesis.php';

class ctrUsuarioTesis {
    
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getUsuariotesis() {
        $Dao = new daoUsuarioTesis();
        return $Dao->listar();
    }
    public static function getUsuariotesis2() {
        $Dao = new daoUsuarioTesis();
        return $Dao->listar2();
    }
    public static function getcantidadtesis() {
        $Dao = new daoUsuarioTesis();
        return $Dao->cantidad();
    }
    
    // lista para jurados

    public static function getlistadetesis($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->listartesis($idusuario);
    }

    public static function getlistadetesis2($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->listartesis2($idusuario);
    }

    public static function getcantidadtesisjurado($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->cantidadtesis($idusuario);
    }

    // lista para jurados correcion

    public static function getlistacorreciondetesis($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->listarcorreciontesis($idusuario);
    }

    public static function getlistacorreciondetesis2($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->listarcorreciontesis2($idusuario);
    }

    public static function getcantidadcorreciontesisjurado($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->cantidadcorreciontesis($idusuario);
    }
 
    // lista para ASIGNACION FECHA

    public static function getlistafechadetesis() {
        $Dao = new daoUsuarioTesis();
        return $Dao->listarfechatesis();
    }

    public static function getlistafechadetesis2() {
        $Dao = new daoUsuarioTesis();
        return $Dao->listarfechatesis2();
    }

    public static function getcantidadfechatesisjurado() {
        $Dao = new daoUsuarioTesis();
        return $Dao->cantidadfechatesis();
    }
    
    
       // lista para jurados nota

    public static function getlistanotadetesis($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->listarcalificaciontesis($idusuario);
    }

    public static function getlistanotadetesis2($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->listarcalificaciontesis2($idusuario);
    }

    public static function getcantidadnotatesisjurado($idusuario) {
        $Dao = new daoUsuarioTesis();
        return $Dao->cantidadcalificaciontesis($idusuario);
    }
}
