<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 3) {
    header('Location: principal.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Formatos</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
        <link rel="stylesheet" href="../../static/assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../../static/assets/css/style.css">
        <link rel="stylesheet" href="../../static/assets/css/estilos.css">
        <link rel="stylesheet" href="../../static/assets/css/lib/chosen/chosen.min.css">
        <link rel="shortcut icon" href="../../static/img/gestoria.png" type="image/png"/>

    </head>
    <body>
        <!-- menu izquierdo -->
        <?php include "navbar.php" ?>
        <div id="right-panel" class="right-panel">
            <!-- cabezera -->
            <?php include "principaltop.php" ?>

            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">
                                De click en uno de los formatos para descargar.  
                            </div>
                            <div class="card">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card-body">

                                            <div class="card-body">
                                                <h4 class="box-title">Formatos </h4>
                                            </div>
                                            <div id="traffic-chart" class="traffic-chart">
                                                <?php
                                                $idusuario = $Sesion->getIdUsuario();
                                                $documentos1 = ctrDocumento::getDocumento1();
                                                $documentos2 = ctrDocumento::getDocumento2();
                                                $documentos3 = ctrDocumento::getDocumento3();
                                                ?>
                                                <?php $status = ctrRequisitos::getstatus($idusuario); ?>
                                                <?php if ($status[0] == 3) { ?>
                                                    <?php foreach ($documentos1 as $documento1) { ?>
                                                        <form action="../drive/descargararchivo.php" role="form" " method="POST" enctype="multipart/form-data" >
                                                            <div class="col-lg-4 col-md-6 float-left" >
                                                                <div class="card text-center" style="background: #eae9e9;">
                                                                    <a href="<?= $documento1->getRuta() ?>" target="blank">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-five">
                                                                                <div class="text-left dib">                                
                                                                                    <div class="stat-heading" style="color: #354388; font-size: 16px;"><?= $documento1->getNombrearchivo() ?></div>
                                                                                </div>   
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <input type="hidden" name="tesis" id="tesis" value="06"/>
                                                                    <input type="hidden" name="name" id="name" value="<?= $documento1->getNombrearchivo() ?>"/>
                                                                    <button type="submit" class="btn btn-outline-success"> Descargar archivo</button> 
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php } ?>
                                                <?php } ?>



                                                <?php
                                                $idequipos = ctrUsuario::getequipo($idusuario);
                                                $idequipo = $idequipos[0];
                                                $statusFormatos = ctrFormato::getstatus($idequipo);
                                                ?>
                                                <?php if ($statusFormatos[0] == 3) { ?>
                                                    <div class="card-body">
                                                        <h4 class="box-title">Estructura para Anteproyecto </h4>
                                                    </div>
                                                    <?php foreach ($documentos2 as $documento2) { ?>
                                                        <form action="../drive/descargararchivo.php" role="form" " method="POST" enctype="multipart/form-data" >
                                                            <div class="col-lg-4 col-md-6 float-left" >
                                                                <div class="card text-center" style="background: #eae9e9;">
                                                                    <a href="<?= $documento2->getRuta() ?>" target="blank">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-five">
                                                                                <div class="text-left dib">                                
                                                                                    <div class="stat-heading" style="color: #354388; font-size: 16px;"><?= $documento2->getNombrearchivo() ?></div>
                                                                                </div>   
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <input type="hidden" name="tesis" id="tesis" value="06"/>
                                                                    <input type="hidden" name="name" id="name" value="<?= $documento2->getNombrearchivo() ?>"/>
                                                                    <button type="submit" class="btn btn-outline-success"> Descargar archivo</button> 
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php
                                                $statusanteproyecto = ctrFormato::getstatus2($idequipo);
                                                ?>
                                                <?php if ($statusanteproyecto[0] == 3) { ?>
                                                    <div class="card-body">
                                                        <h4 class="box-title">Estructura para Tesis </h4>
                                                    </div>
                                                    <?php foreach ($documentos3 as $documento3) { ?>
                                                        <form action="../drive/descargararchivo.php" role="form" " method="POST" enctype="multipart/form-data" >
                                                            <div class="col-lg-4 col-md-6 float-left" >
                                                                <div class="card text-center" style="background: #eae9e9;">
                                                                    <a href="<?= $documento3->getRuta() ?>" target="blank">
                                                                        <div class="card-body">
                                                                            <div class="stat-widget-five">
                                                                                <div class="text-left dib">                                
                                                                                    <div class="stat-heading" style="color: #354388; font-size: 16px;"><?= $documento3->getNombrearchivo() ?></div>
                                                                                </div>   
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <input type="hidden" name="tesis" id="tesis" value="06"/>
                                                                    <input type="hidden" name="name" id="name" value="<?= $documento3->getNombrearchivo() ?>"/>
                                                                    <button type="submit" class="btn btn-outline-success"> Descargar archivo</button> 
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>




                                        </div>


                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="../../static/lib/jquery-2.2.4.min.js" type="text/javascript"></script>
        <!-- Scripts -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="../../static/assets/js/main.js"></script>
        <script src="../../static/assets/js/lib/chosen/chosen.jquery.min.js"></script>





    </body>
</html>

