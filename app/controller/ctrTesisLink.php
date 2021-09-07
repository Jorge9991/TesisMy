<?php
require_once '../conexion/DataBase.php';
require_once '../model/TesisLink.php';
require_once '../interface/Itesislink.php';
require_once '../dao/daoTesisLink.php';
require_once '../model/ParciegoTesis.php';
require_once '../interface/Iparciegotesis.php';
require_once '../dao/daoParCiegoTesis.php';
class ctrTesisLink {
    
    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getCantidadTesislinkx2() {
        $Dao = new daoTesisLink();
        return $Dao->listarcantidadx2();
    }
    public static function getCantidadTesislink() {
        $Dao = new daoTesisLink();
        return $Dao->listarcantidad();
    }
    
    public static function getTesis($idequipo) {
        $Dao = new daoTesisLink();
        return $Dao->listar($idequipo);
    }

    public static function getstatus($idequipo) {
        $Dao = new daoTesisLink();
        return $Dao->status($idequipo);
    }
    public static function getobservacion($idequipo) {
        $Dao = new daoTesisLink();
        return $Dao->observacion($idequipo);
    }

    public static function aprobar() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'A': if ($dao->aprobar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function aprobarcorrecion() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'AC': if ($dao->aprobarcorrecion($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function correcionhecha() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'CH': if ($dao->correcionhecha($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function cancelarcorrecion() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'CC': if ($dao->cancelarcorrecion($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function cancelar2() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'CA2': if ($dao->cancelar2($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function cancelarfecha() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'CF': if ($dao->cancelarfecha($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function crear() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setLink($datosForm->link);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'G': if ($dao->crear($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function actualizar() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setLink($datosForm->link);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'A': if ($dao->actualizar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function asignarfecha() {
        $datosForm = self::validate();
        $modelo = new ParciegoTesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setIdUsuario($datosForm->idusuario);
        $modelo->setFechasustentacion($datosForm->fechasustentacion);
        $dao = new daoParCiegoTesis();
        switch ($datosForm->opc) {
            case 'TF': if ($dao->asignarfecha($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function actualizarfecha() {
        $datosForm = self::validate();
        $modelo = new ParciegoTesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setIdUsuario($datosForm->idusuario);
        $modelo->setFechasustentacion($datosForm->fechasustentacion);
        $dao = new daoParCiegoTesis();
        switch ($datosForm->opc) {
            case 'AF': if ($dao->actualizarfecha($modelo))
                    return '{"ok":false}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function actualizar2() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setLink($datosForm->link);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'A2': if ($dao->actualizar2($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function aprobartesis() {
        $datosForm = self::validate();
        $modelo = new ParciegoTesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setIdUsuario($datosForm->idusuario);       
        $dao = new daoParCiegoTesis();
        switch ($datosForm->opc) {
            case 'R': if ($dao->aprobartesis($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    
    public static function actualizartesis() {
        $datosForm = self::validate();
        $modelo = new ParciegoTesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setIdUsuario($datosForm->idusuario);
      
        $dao = new daoParCiegoTesis();
        switch ($datosForm->opc) {
            case 'U': if ($dao->editar($modelo))
                    return '{"ok":false}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function noaprobartesis() {
        $datosForm = self::validate();
        $modelo = new Tesis();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $modelo->setDescripcion($datosForm->descripcion);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'N': if ($dao->noaprobartesis($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
    public static function cancelar() {
        $datosForm = self::validate();
        $modelo = new TesisLink();      
        $modelo->setIdEquipo($datosForm->idequipo);
        $dao = new daoTesisLink();
        switch ($datosForm->opc) {
            case 'C': if ($dao->cancelar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }
          //envio de correo
       public static function enviarcorreo() {
        include('../controller/ctrEmail.php');
        $datosForm = self::validate();
        $datos = $datosForm->idusuario;
        parciegocorreo($datos);
    }
    //envio de correo a egresado
       public static function enviarcorreo2() {
        include('../controller/ctrEmail.php');
        $datosForm = self::validate();
        $datos = [$datosForm->idequipo,$datosForm->idusuario,$datosForm->fechasustentacion];
        enviotesis($datos);
        enviojuradotesis($datos);
        return '{"ok":true}';
    }
}
