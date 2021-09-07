<?php

require_once '../conexion/DataBase.php';
require_once '../model/Cronograma.php';
require_once '../interface/Icronograma.php';
require_once '../dao/daoCronograma.php';

class ctrCronograma {

    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }
    
    public static function getCronogramas() {
        $Dao = new daoCronograma();
        return $Dao->listar();
    }
    
    public static function update() {
        $datosForm = self::validate();
        $modelo = new Cronograma();
        $modelo->setIdCronograma1($datosForm->idcronograma1); 
        $modelo->setFechainicio1($datosForm->fechainicio1);
        $modelo->setFechafin1($datosForm->fechafinal1);
        $modelo->setIdCronograma2($datosForm->idcronograma2);
        $modelo->setFechainicio2($datosForm->fechainicio2);
        $modelo->setFechafin2($datosForm->fechafinal2);
        $modelo->setIdCronograma3($datosForm->idcronograma3);
        $modelo->setFechainicio3($datosForm->fechainicio3);
        $modelo->setFechafin3($datosForm->fechafinal3);
        $modelo->setIdCronograma4($datosForm->idcronograma4);
        $modelo->setFechainicio4($datosForm->fechainicio4);
        $modelo->setFechafin4($datosForm->fechafinal4);
        $modelo->setIdCronograma5($datosForm->idcronograma5);
        $modelo->setFechainicio5($datosForm->fechainicio5);
        $modelo->setFechafin5($datosForm->fechafinal5);
        $modelo->setIdCronograma6($datosForm->idcronograma6);
        $modelo->setFechainicio6($datosForm->fechainicio6);
        $modelo->setFechafin6($datosForm->fechafinal6);
        $modelo->setLink($datosForm->link);  
        $dao = new daoCronograma();
        switch ($datosForm->opc) {
            case 'A': if ($dao->editar($modelo))
                    return '{"ok":true}';
         
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

}
