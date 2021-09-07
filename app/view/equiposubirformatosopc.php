<?php

require '../controller/ctrFormato.php';
$action = $_POST["action"];
$formato = new ctrFormato($_POST);

switch ($action) {

    case "apr":
        echo $formato->aprobar();

        break;
    case "can":
        echo $formato->cancelar();

        break;
    case "rea":
        echo $formato->aprobarformato();
        $formato->enviarcorreo();

        break;
    case "nrea":
        echo $formato->noaprobarformato();

        break;

    default:
        break;
}
