<?php

require '../controller/ctrTesisLink.php';
$action = $_POST["action"];
$tesis = new ctrTesisLink($_POST);

switch ($action) {

    case "apr":
        echo $tesis->aprobar();

        break;
    case "aprc":
        echo $tesis->aprobarcorrecion();

        break;

    case "cre":
        echo $tesis->crear();

        break;

    case "cc":
        echo $tesis->cancelarcorrecion();

        break;
    case "can2":
        echo $tesis->cancelar2();

        break;

    case "ch":
        echo $tesis->correcionhecha();

        break;

    case "act":
        echo $tesis->actualizar();

        break;

    case "act2":
        echo $tesis->actualizar2();

        break;

    case "can":
        echo $tesis->cancelar();

        break;
    case "rea":
        $tesis->enviarcorreo();
        echo $tesis->aprobartesis();

        break;
    case "nrea":
        echo $tesis->noaprobartesis();

        break;

    case "upd":
        echo $tesis->actualizartesis();

        break;

    case "tf":
        $tesis->enviarcorreo2();
        echo $tesis->asignarfecha();

        break;

    case "af":
        $tesis->enviarcorreo2();
        echo $tesis->actualizarfecha();

        break;

    case "cf":
        echo $tesis->cancelarfecha();

        break;
    default:
        break;
}
