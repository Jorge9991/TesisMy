<?php
require '../controller/ctrNota.php';
$action = $_POST["action"];
$nota = new ctrNota($_POST);

switch ($action) {
    case "c":
        echo $nota->crear();

        break;
    case "a":
        echo $nota->actualizar();

        break;

    default:
        break;
}

