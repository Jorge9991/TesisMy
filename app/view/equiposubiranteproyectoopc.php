<?php

require '../controller/ctrAnteproyecto.php';
$action = $_POST["action"];
$anteproyecto = new ctrAnteproyecto($_POST);

switch ($action) {

    case "apr":
        echo $anteproyecto->aprobar();

        break;
    case "can":
        echo $anteproyecto->cancelar();

        break;
    case "rea":
        $anteproyecto->enviarcorreo();
        echo $anteproyecto->aprobaranteproyecto();
        break;

    case "nrea":
        echo $anteproyecto->noaprobaranteproyecto();

        break;

    case "upd":
        $anteproyecto->enviarcorreo();
        echo $anteproyecto->actualizaranteproyecto();  
        break;

    default:
        break;
}
