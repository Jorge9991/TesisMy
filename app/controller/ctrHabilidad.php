<?php
require_once '../conexion/DataBase.php';
require_once '../model/Habilidad.php';
require_once '../interface/Ihabilidad.php';
require_once '../dao/daoHabilidad.php';

class ctrHabilidad {
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getHabilidades() {
        $Dao = new daoHabilidad();
        return $Dao->listar();
    }
    
    public static function getHabilidadesid($id) {
        $Dao = new daoHabilidad();
        return $Dao->listarId($id);
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Habilidad();
        $modelo->setIdHabilidad($datosForm->idHabilidad);
        $modelo->setDescripcion($datosForm->descripcion);
        $modelo->setEstado($datosForm->estado);
        $dao = new daoHabilidad();
        switch ($datosForm->opc) {
            case 'I': if ($dao->crear($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

    public static function editar() {
      $datosForm = self::validate();
        $modelo = new Habilidad();
        $modelo->setIdHabilidad($datosForm->idHabilidad);
        $modelo->setDescripcion($datosForm->descripcion);
        $dao = new daoHabilidad();
        switch ($datosForm->opc) {
            case 'E': if ($dao->editar($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

    public static function eliminar() {
        $datosForm = self::validate();
        $modelo = new Habilidad();
        $modelo->setIdHabilidad($datosForm->idHabilidad);
        $dao = new daoHabilidad();
        switch ($datosForm->opc) {
            case 'D': if ($dao->delete($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

}
