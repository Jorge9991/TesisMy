<?php
require '../controller/ctrUsuarioHabilidad.php';
$action = $_POST["action"];
$habilidad = new ctrUsuarioHabilidad($_POST);

switch ($action) {
    case "add":
        echo $habilidad->grabar();

        break;

    case "elim":
        echo $habilidad->eliminar();

        break;

    case "edit":
        echo $habilidad->editar();

        break;

    default:
        break;
}