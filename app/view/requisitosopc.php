<?php
require '../controller/ctrRequisitos.php';
$action = $_POST["action"];
$requisitos = new ctrRequisitos($_POST);

switch ($action) {

    case "apr":
        echo $requisitos->aprobar();

        break;
    case "can":
        echo $requisitos->cancelar();

        break;
    case "rea":
        echo $requisitos->aprobarrequisitos();
        $requisitos->enviarcorreo();

        break;
    case "nrea":
        echo $requisitos->noaprobarrequisitos();
        

        break;

    default:
        break;
}