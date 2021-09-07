<?php
require '../controller/ctrTesis.php';
$action = $_POST["action"];
$tesis = new ctrTesis($_POST);

switch ($action) {


    case "apr":
        echo $tesis->aprobar();

        break;
    case "can":
        echo $tesis->cancelar();

        break;

    default:
        break;
}

