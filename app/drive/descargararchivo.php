<?php
include '../../api-drive/vendor/autoload.php';
//archivo con la llave
putenv('GOOGLE_APPLICATION_CREDENTIALS=mytesis-315323-b5401bd59510.json');
$nombre = $_POST["name"];
$opcion = $_POST["tesis"];
$id = $_POST["idusuario"];
$cliente = new Google_Client();
$cliente->useApplicationDefaultCredentials();
$cliente->setScopes(['https://www.googleapis.com/auth/drive.file']);

$servicios = new Google_Service_Drive($cliente);

$resultado = $servicios->files->listFiles([
    'q' => "name='$nombre'",
    'fields' => 'files(id, size,name)'
]);
$num = count($resultado);

//$id = $resultado[0];
//echo $id;
$fileId = $resultado[0]->id;
$fileSize = $resultado[0]->size;
// Get the authorized Guzzle HTTP client
    $http = $cliente->authorize();

    // Open a file for writing
    $fp = fopen($resultado[0]->name, 'w');

    // Download in 1 MB chunks
    $chunkSizeBytes = 1 * 1024 * 1024;
    $chunkStart = 0;

    // Iterate over each chunk and write it to our file
    while ($chunkStart < $fileSize) {
      $chunkEnd = $chunkStart + $chunkSizeBytes;
      $response = $http->request(
        'GET',
        sprintf('/drive/v3/files/%s', $fileId),
        [
          'query' => ['alt' => 'media'],
          'headers' => [
            'Range' => sprintf('bytes=%s-%s', $chunkStart, $chunkEnd)
          ]
        ]
      );
      $chunkStart = $chunkEnd + 1;
      fwrite($fp, $response->getBody()->getContents());
    }
    // close the file pointer
    fclose($fp);
   if($opcion == 28){
    header("Location: ../view/correcion.php?id=$id"); 
   }
   if($opcion == 06){
     header('Location: ../view/formatosdescarga.php');  
   }
