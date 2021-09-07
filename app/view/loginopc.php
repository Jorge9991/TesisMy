<?php
require '../controller/ctrUsuario.php';
session_start();
$usuario = new ctrUsuario($_POST);
$sUsuario = $usuario->login();
$inicio = "0";

if (count($sUsuario)) {
    $dato = (object) $sUsuario;
    $modelo = new Usuario($dato->idUsuario, $dato->cedula, $dato->nombre, $dato->apellido, $dato->direccion, $dato->telefono, $dato->correo, $dato->usuario, $dato->contrasena, $dato->idTipoUsuario);
    $_SESSION['usuario'] = serialize($modelo);
    $inicio = $modelo->getIdTipoUsuario();
}

switch ($inicio) {
    case "4":
        echo '{"ok":true,"url":"principal.php"}';
        break;

    case "0":
        echo '{"ok":false}';
        break;

    default:
        echo '{"ok":true,"url":"principal.php"}';
        break;
}
?>
