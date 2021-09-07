<?php

require_once '../conexion/DataBase.php';
require_once '../model/Usuario.php';
require_once '../interface/Iusuario.php';
require_once '../dao/daoUsuario.php';

class ctrUsuario {

    private static $array;

    public function __construct($array = array()) {
        self::$array = $array;
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    public static function getUsuarios() {
        $Dao = new daoUsuario();
        return $Dao->listar();
    }
    public static function getcantidadUsuariosegresado() {
        $Dao = new daoUsuario();
        return $Dao->listarcantidadegresado();
    }
    
    public static function getUsuariostutor() {
        $Dao = new daoUsuario();
        return $Dao->listartutor();
    }
    public static function getUsuarios2() {
        $Dao = new daoUsuario();
        return $Dao->listargestor();
    }
    public static function getUsuariosjurados() {
        $Dao = new daoUsuario();
        return $Dao->listadejurado();
    }
    
    public static function getHabilidad($idusuario) {
        $Dao = new daoUsuario();
        return $Dao->habilidades($idusuario);
    }
 public static function getusuariosegresados($idusuario) {
        $Dao = new daoUsuario();
        return $Dao->listaregresado($idusuario);
    }
    public static function getequipo($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listarequipo($idequipo);
    }
    public static function getparciego($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listadeusuarioparciego($idequipo);
    }
    public static function getparciego2($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listadeusuarioparciego2($idequipo);
    }
    public static function getlistaparciego($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listaparciego($idequipo);
    }
public static function getlistaparciegoprueba($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listaparciego2($idequipo);
    }
    
     public static function getlistaparciegotesis($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listaparciegotesis($idequipo);
    }
public static function getlistaparciegopruebatesis($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listaparciego2tesis($idequipo);
    }
    
public static function getlistajuradopruebatesis($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listajurado3tesis($idequipo);
    }
    
    public static function getlistajuradotesis($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listajuradotesis($idequipo);
    }
    public static function getlistajurado2tesis($idequipo) {
        $Dao = new daoUsuario();
        return $Dao->listajurado2tesis($idequipo);
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Usuario($datosForm->idUsuario, $datosForm->cedula, $datosForm->nombre, $datosForm->apellido, $datosForm->direccion, $datosForm->telefono, $datosForm->correo, $datosForm->usuario, $datosForm->contrasena, $datosForm->idTipoUsuario, $datosForm->estado);
        $dao = new daoUsuario();
        switch ($datosForm->opc) {
            //nuevo
            case 'I': if ($dao->crear($modelo)) {

                    return '{"ok":true}';
                }
            //finnuevo
            default : if ($dao->editar($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

    public static function editar() {
        //$datosForm = (object)self::$array;
        $datosForm = self::validate();
        $dao = new daoUsuario();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }
    public static function perfil($idperfil) {
        $Dao = new daoUsuario();
        return $Dao->listarId($idperfil);
    }

    public static function eliminar() {
        $datosForm = self::validate();
        $dao = new daoUsuario();
        $modelo = new Usuario($datosForm->id, "", "", "", "", "", "", "", "", "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function login() {
        $datosForm = self::validate();
        $dao = new daoUsuario();
        $modelo = new Usuario();
        $modelo->setUsuario($datosForm->usuario);
        $modelo->setClave($datosForm->contrasena);
        return $dao->login($modelo);
    }

}
