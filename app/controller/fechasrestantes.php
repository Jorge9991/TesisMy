<!-- fecha restante -->
<?php

function requisitosfecha() {
    date_default_timezone_set('America/Guayaquil');
    $fechaActual = date('Y-m-d');
    $fechaactualrestar = new DateTime($fechaActual);

    $cronogramas = ctrCronograma::getCronogramas();
    $fechafinalmysql = $cronogramas[0]['fechafinal'];

    $fechafinal = new DateTime($fechafinalmysql);
    $fechadiferencia = $fechafinal->diff($fechaactualrestar);
    if($fechadiferencia->m > 0){
        if($fechadiferencia->m == 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el envio de los requisitos es: ". $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dia";
        }
        if($fechadiferencia->m == 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de los requisitos es: ". $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de los requisitos es: ". $fechadiferencia->m . " meses y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el envio de los requisitos es: ". $fechadiferencia->m . " meses y " . $fechadiferencia->d . " dia";
        }
        
    }else {
        if($fechadiferencia->d == 1){
            echo "Su tiempo restante para el envio de los requisitos es de un dia";
        }
        if($fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de los requisitos es: " . $fechadiferencia->d . " dias";
        }
    }
    
}

date_default_timezone_set('America/Guayaquil');
$fechaActual = date('Y-m-d');
$fechaactualrestar = new DateTime($fechaActual);
$cronogramas = ctrCronograma::getCronogramas();
$fechafinalmysql = $cronogramas[0]['fechafinal'];
$fechafinal = new DateTime($fechafinalmysql);
$fechadiferencia = $fechafinal->diff($fechaactualrestar);
//0 es negativo y 1 es positivo
$requisitosfechaposigativo = $fechadiferencia->invert;

function formatosfecha() {
    date_default_timezone_set('America/Guayaquil');
    $fechaActual = date('Y-m-d');
    $fechaactualrestar = new DateTime($fechaActual);

    $cronogramas = ctrCronograma::getCronogramas();
    $fechafinalmysql = $cronogramas[1]['fechafinal'];

    $fechafinal = new DateTime($fechafinalmysql);
    $fechadiferencia = $fechafinal->diff($fechaactualrestar);
     if($fechadiferencia->m > 0){
        if($fechadiferencia->m == 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el envio de los formatos es: ". $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dia";
        }
        if($fechadiferencia->m == 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de los formatos es: ". $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de los formatos es: ". $fechadiferencia->m . " meses y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el envio de los formatos es: ". $fechadiferencia->m . " meses y " . $fechadiferencia->d . " dia";
        }
        
    }else {
        if($fechadiferencia->d == 1){
            echo "Su tiempo restante para el envio de los formatos es de un dia";
        }
        if($fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de los formatos es: " . $fechadiferencia->d . " dias";
        }
    }
}

$fechafinalmysql2 = $cronogramas[1]['fechafinal'];
$fechafinal2 = new DateTime($fechafinalmysql2);
$fechadiferencia2 = $fechafinal2->diff($fechaactualrestar);
//0 es negativo y 1 es positivo
$formatosfechaposigativo = $fechadiferencia2->invert;

function anteproyectofecha() {
    date_default_timezone_set('America/Guayaquil');
    $fechaActual = date('Y-m-d');
    $fechaactualrestar = new DateTime($fechaActual);

    $cronogramas = ctrCronograma::getCronogramas();
    $fechafinalmysql = $cronogramas[2]['fechafinal'];

    $fechafinal = new DateTime($fechafinalmysql);
    $fechadiferencia = $fechafinal->diff($fechaactualrestar);
     if($fechadiferencia->m > 0){
        if($fechadiferencia->m == 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el envio de su Anteproyecto es: ". $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dia";
        }
        if($fechadiferencia->m == 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de su Anteproyecto es: ".$fechadiferencia->m . " mes y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de su Anteproyecto es: ".$fechadiferencia->m . " meses y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el envio de su Anteproyecto es: ".$fechadiferencia->m . " meses y " . $fechadiferencia->d . " dia";
        }
        
    }else {
        if($fechadiferencia->d == 1){
            echo "Su tiempo restante para el envio de su Anteproyecto es de un dia";
        }
        if($fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de su Anteproyecto es: " . $fechadiferencia->d . " dias";
        }
    }
}

$fechafinalmysql3 = $cronogramas[2]['fechafinal'];
$fechafinal3 = new DateTime($fechafinalmysql3);
$fechadiferencia3 = $fechafinal3->diff($fechaactualrestar);
//0 es negativo y 1 es positivo
$anteproyectofechaposigativo = $fechadiferencia3->invert;

function tesisfecha() {
    date_default_timezone_set('America/Guayaquil');
    $fechaActual = date('Y-m-d');
    $fechaactualrestar = new DateTime($fechaActual);

    $cronogramas = ctrCronograma::getCronogramas();
    $fechafinalmysql = $cronogramas[4]['fechafinal'];

    $fechafinal = new DateTime($fechafinalmysql);
    $fechadiferencia = $fechafinal->diff($fechaactualrestar);

     if($fechadiferencia->m > 0){
        if($fechadiferencia->m == 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el envio de su tesis es: ".  $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dia";
        }
        if($fechadiferencia->m == 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de su tesis es: ". $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de su tesis es: ". $fechadiferencia->m . " meses y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el envio de su tesis es: ". $fechadiferencia->m . " meses y " . $fechadiferencia->d . " dia";
        }
        
    }else {
        if($fechadiferencia->d == 1){
            echo "Su tiempo restante para el envio de su tesis es de un dia";
        }
        if($fechadiferencia->d != 1){
            echo " Su tiempo restante para el envio de su tesis es: " . $fechadiferencia->d . " dias";
        }
    }
}

$fechafinalmysql4 = $cronogramas[4]['fechafinal'];
$fechafinal4 = new DateTime($fechafinalmysql4);
$fechadiferencia4 = $fechafinal4->diff($fechaactualrestar);
//0 es negativo y 1 es positivo
$tesisfechaposigativo = $fechadiferencia4->invert;

function sustentacionfecha() {
    date_default_timezone_set('America/Guayaquil');
    $fechaActual = date('Y-m-d');
    $fechaactualrestar = new DateTime($fechaActual);

    $cronogramas = ctrCronograma::getCronogramas();
    $fechafinalmysql = $cronogramas[5]['fechafinal'];

    $fechafinal = new DateTime($fechafinalmysql);
    $fechadiferencia = $fechafinal->diff($fechaactualrestar);

     if($fechadiferencia->m > 0){
        if($fechadiferencia->m == 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el dia de sustentación de su tesis es: " . $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dia";
        }
        if($fechadiferencia->m == 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el dia de sustentación de su tesis es: " . $fechadiferencia->m . " mes y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d != 1){
            echo " Su tiempo restante para el dia de sustentación de su tesis es: " . $fechadiferencia->m . " meses y " . $fechadiferencia->d . " dias";
        }
        if($fechadiferencia->m != 1 && $fechadiferencia->d == 1){
            echo " Su tiempo restante para el dia de sustentación de su tesis es: " . $fechadiferencia->m . " meses y " . $fechadiferencia->d . " dia";
        }
        
    }else {
        if($fechadiferencia->d == 1){
            echo "Su tiempo restante para el dia de sustentación de su tesis es de un dia";
        }
        if($fechadiferencia->d != 1){
            echo " Su tiempo restante para el dia de sustentación de su tesis es: " . $fechadiferencia->d . " dias";
        }
    }
}

$fechafinalmysql5 = $cronogramas[5]['fechafinal'];
$fechafinal5 = new DateTime($fechafinalmysql5);
$fechadiferencia5 = $fechafinal5->diff($fechaactualrestar);
//0 es negativo y 1 es positivo
$sustentacionfechaposigativo = $fechadiferencia5->invert;
?>
