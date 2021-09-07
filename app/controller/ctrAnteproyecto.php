<?php
require_once '../conexion/DataBase.php';
require_once '../model/Anteproyecto.php';
require_once '../interface/Ianteproyecto.php';
require_once '../dao/daoAnteproyecto.php';
require_once '../model/Parciego.php';
require_once '../interface/Iparciego.php';
require_once '../dao/daoParCiego.php';

class ctrAnteproyecto {
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getCantidadAnteproyectox2() {
        $Dao = new daoAnteproyecto();
        return $Dao->listarcantidadx2();
    }
    public static function getCantidadAnteproyecto() {
        $Dao = new daoAnteproyecto();
        return $Dao->listarcantidad();
    }
    
    public static function getAnteproyectos($idequipo) {
        $Dao = new daoAnteproyecto();
        return $Dao->listar($idequipo);
    }

    public static function getstatus($idequipo) {
        $Dao = new daoAnteproyecto();
        return $Dao->status($idequipo);
    }
    public static function getobservacion($idequipo) {
        $Dao = new daoAnteproyecto();
        return $Dao->observacion($idequipo);
    }

    public static function aprobar() {
        $datosForm = self::validate();
        $modelo = new Anteproyecto();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoAnteproyecto();
        switch ($datosForm->opc) {
            case 'A': if ($dao->aprobar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function aprobaranteproyecto() {
        $datosForm = self::validate();
        $modelo = new Parciego();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setIdUsuario($datosForm->idusuario);
        $modelo->setFechasustentacion($datosForm->fechasustentacion);
        $dao = new daoParCiego();
        switch ($datosForm->opc) {
            case 'R': if ($dao->aprobaranteproyecto($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function actualizaranteproyecto() {
        $datosForm = self::validate();
        $modelo = new Parciego();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setIdUsuario($datosForm->idusuario);
        $modelo->setFechasustentacion($datosForm->fechasustentacion);
        $dao = new daoParCiego();
        switch ($datosForm->opc) {
            case 'U': if ($dao->editar($modelo))
                    return '{"ok":false}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function noaprobaranteproyecto() {
        $datosForm = self::validate();
        $modelo = new Anteproyecto();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setDescripcion($datosForm->descripcion);
        $dao = new daoAnteproyecto();
        switch ($datosForm->opc) {
            case 'N': if ($dao->noaprobaranteproyecto($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function cancelar() {
        $datosForm = self::validate();
        $modelo = new Anteproyecto();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoAnteproyecto();
        switch ($datosForm->opc) {
            case 'C': if ($dao->cancelar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    //envio de correo a egresado
       public static function enviarcorreo() {
        include('../controller/ctrEmail.php');
        $datosForm = self::validate();
        $datos = [$datosForm->idequipo,$datosForm->idusuario,$datosForm->fechasustentacion];
        envioanteproyecto($datos);
        enviojuradoanteproyecto($datos);
        return '{"ok":true}';
    }
    
}
