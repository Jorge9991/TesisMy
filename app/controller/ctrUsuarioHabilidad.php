<?php
require_once '../conexion/DataBase.php';
require_once '../model/UsuarioHabilidad.php';
require_once '../interface/Iusuariohabilidad.php';
require_once '../dao/daoUsuarioHabilidad.php';
class ctrUsuarioHabilidad {
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getHabilidadesusuarios($idusuario) {
        $Dao = new daoUsuarioHabilidad();
        return $Dao->listar($idusuario);
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new UsuarioHabilidad();
        $modelo->setIdUsuarioHabilidades($datosForm->idUsuarioHabilidad);
        $modelo->setIdHabilidades($datosForm->idHabilidad);
        $modelo->setIdUsuario($datosForm->idUsuario);
        $modelo->setEstado($datosForm->estado);
        $dao = new daoUsuarioHabilidad();
        switch ($datosForm->opc) {
            case 'I': if ($dao->crear($modelo))
                    return '{"ok":true}';
            default : if ($dao->editar($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoUsuarioHabilidad();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

    public static function eliminar() {
        $datosForm = self::validate();
        $dao = new daoUsuarioHabilidad();      
        $modelo = new UsuarioHabilidad($datosForm->id, 0,0, 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

}
