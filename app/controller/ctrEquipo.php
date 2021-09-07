<?php

require_once '../conexion/DataBase.php';
require_once '../model/Equipo.php';
require_once '../interface/Iequipo.php';
require_once '../dao/daoEquipo.php';

class ctrEquipo {

    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getYatieneequipo($idusuario) {
        $Dao = new daoEquipo();
        return $Dao->listar($idusuario);
    }
    public static function getnombregrupo($idequipo) {
        $Dao = new daoEquipo();
        return $Dao->nombreequipo($idequipo);
    }
    public static function getequipodeuno($idequipo) {
        $Dao = new daoEquipo();
        return $Dao->equiposolo($idequipo);
    }
    public static function getSolicitudenviada($idusuario) {
        $Dao = new daoEquipo();
        return $Dao->solicitudenviada($idusuario);
    }

    public static function getsolicitudes($idusuario) {
        $Dao = new daoEquipo();
        return $Dao->listarSolicitudes($idusuario);
    }
    
    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Equipo();
        $modelo->setIdUsuario($datosForm->idUsuario);
        $modelo->setIdUsuario2($datosForm->idusuario2);
        $dao = new daoEquipo();
        switch ($datosForm->opc) {
            case 'E': if ($dao->crear($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function grabarsolo() {
        $datosForm = self::validate();
        $modelo = new Equipo();
        $modelo->setIdUsuario($datosForm->idUsuario);
        $dao = new daoEquipo();
        switch ($datosForm->opc) {
            case 'S': if ($dao->crearsolo($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function cancelarsolicitud() {
        $datosForm = self::validate();
        $modelo = new Equipo();
        $modelo->setIdUsuario($datosForm->idUsuario);
        $dao = new daoEquipo();
        switch ($datosForm->opc) {
            case 'C': if ($dao->cancelarsolicitud($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function aceptarsolicitud() {
        $datosForm = self::validate();
        $modelo = new Equipo();
        $modelo->setIdEquipo($datosForm->idEquipo);
        $dao = new daoEquipo();
        switch ($datosForm->opc) {
            case 'A': if ($dao->aceptar($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function eliminarsolicitud() {
        $datosForm = self::validate();
        $modelo = new Equipo();
        $modelo->setIdEquipo($datosForm->idEquipo);
        $dao = new daoEquipo();
        switch ($datosForm->opc) {
            case 'D': if ($dao->eliminar($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

}
