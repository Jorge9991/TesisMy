<?php
include '../../api-drive/vendor/autoload.php';
//archivo con la llave
putenv('GOOGLE_APPLICATION_CREDENTIALS=mytesis-315323-b5401bd59510.json');

$cliente = new Google_Client();
$cliente->useApplicationDefaultCredentials();
$cliente->setScopes(['https://www.googleapis.com/auth/drive.file']);

$servicios = new Google_Service_Drive($cliente);

$resultado = $servicios->files->listFiles();

foreach ($resultado as $elemento){
    $ruta = 'https://drive.google.com/open?id=' . $elemento->id;
    echo '<a href="'.$ruta. '"target="_blank">'. $elemento->id. '</a> <br/ >';
}
