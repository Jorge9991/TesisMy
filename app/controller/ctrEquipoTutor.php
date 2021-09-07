<?php

require_once '../conexion/DataBase.php';
require_once '../model/EquipoTutor.php';
require_once '../interface/Iequipotutor.php';
require_once '../dao/daoEquipoTutor.php';

class ctrEquipoTutor {

    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getYatieneequipo($idequipo) {
        $Dao = new daoEquipoTutor();
        return $Dao->listar($idequipo);
    }

    public static function getnombregrupo($idequipo) {
        $Dao = new daoEquipo();
        return $Dao->nombreequipo($idequipo);
    }

    public static function getSolicitudenviada($idequipo) {
        $Dao = new daoEquipoTutor();
        return $Dao->solicitudenviada($idequipo);
    }

    public static function getsolicitudes($idusuario) {
        $Dao = new daoEquipoTutor();
        return $Dao->listarSolicitudes($idusuario);
    }

    public static function getsolicitudes2($idusuario) {
        $Dao = new daoEquipoTutor();
        return $Dao->listarSolicitudes2($idusuario);
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new EquipoTutor();
        $modelo->setIdUsuario($datosForm->idusuario);
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoEquipoTutor();
        switch ($datosForm->opc) {
            case 'E': if ($dao->crear($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

    public static function cancelarsolicitud() {
        $datosForm = self::validate();
        $modelo = new EquipoTutor();
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoEquipoTutor();
        switch ($datosForm->opc) {
            case 'C': if ($dao->cancelarsolicitud($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error "}';
    }

    public static function aceptarsolicitud() {
        $datosForm = self::validate();
        $modelo = new EquipoTutor();
        $modelo->setIdUsuario($datosForm->idusuario);
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoEquipoTutor();
        switch ($datosForm->opc) {
            case 'A': if ($dao->aceptar($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

    public static function eliminarsolicitud() {
        $datosForm = self::validate();
        $modelo = new EquipoTutor();
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoEquipoTutor();
        switch ($datosForm->opc) {
            case 'D': if ($dao->eliminar($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

}
