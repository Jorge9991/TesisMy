<?php
require '../controller/ctrCronograma.php';
$action = $_POST["action"];
$cronograma = new ctrCronograma($_POST);

switch ($action) {
    case "act":
        echo $cronograma->update();

        break;

    default:
        break;
}

