<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4) {
    header('Location: principal.php');
}
?>
<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reportes</title>
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
        <link rel="shortcut icon" href="../../static/img/gestoria.png" type="image/png"/>
    </head>

    <body>
        <!-- menu izquierdo -->
        <?php include "navbar.php" ?>

        <div id="right-panel" class="right-panel">
            <!-- cabezera -->
            <?php include "principaltop.php" ?>

            <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                       <div class="col-lg-4 col-md-6">
                            <div class="card">
                                
                                <a href="../reportes/reportetodosegresados.php" target="blank">                       
                                    <button type="submit" class="btn btn-link btn-block"> 
                                        <div class="card-body">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib flat-color-2">
                                                    <i class="ti-printer"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"></div>
                                                        <div class="stat-heading">Reporte de todos <br>los egresados</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button> 
                                </a>
                            </div>
                        </div>
<div class="col-lg-4 col-md-6">
                            <div class="card">
                                
                                <a href="../reportes/reporteegresados.php" target="blank">                       
                                    <button type="submit" class="btn btn-link btn-block"> 
                                        <div class="card-body">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib flat-color-3">
                                                    <i class="ti-printer"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"></div>
                                                        <div class="stat-heading">Egresados que han<br> terminado el proceso</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button> 
                                </a>
                            </div>
                        </div>
                    
                              <div class="col-lg-4 col-md-6">
                            <div class="card">
                                
                                <a href="../reportes/reportenotas.php" target="blank">                       
                                    <button type="submit" class="btn btn-link btn-block"> 
                                        <div class="card-body">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib flat-color-1">
                                                    <i class="ti-printer"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"></div>
                                                        <div class="stat-heading">Reporte estadisticos <br> de notas</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button> 
                                </a>
                            </div>
                        </div>
                        
                </div>
                <!-- /Widgets -->
                <?php
                $cantidadrequisitos = ctrRequisitos::getCantidadRequisitos();
                $cantidadformatox2 = ctrFormato::getCantidadFormatosx2();
                $cantidadformato = ctrFormato::getCantidadFormatos();
                $cantidadanteproyectox2 = ctrAnteproyecto::getCantidadAnteproyectox2();
                $cantidadanteproyecto = ctrAnteproyecto::getCantidadAnteproyecto();
                $cantidadtesislinkx2 = ctrTesisLink::getCantidadTesislinkx2();
                $cantidadtesislink = ctrTesisLink::getCantidadTesislink();
                $cantidadtesisx2 = ctrTesis::getCantidadTesisx2();
                $cantidadtesis = ctrTesis::getCantidadTesis();
                $total1 = ctrUsuario::getcantidadUsuariosegresado();
                $total = count($total1);
                ?>
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                    
                            <div class="row">
                               
                                <div class="col-lg-12">
                                    <div class="card-body">
                                        <div class="progress-box progress-1">
                                            <h4 class="por-title">Egresados que han completado el proceso de envio de requisitos </h4>
                                           
                                            <div class="por-txt"><?php echo count($cantidadrequisitos); ?> Users (<?php echo bcdiv(count($cantidadrequisitos) * 100 / $total, '1', 2); ?>%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: <?php echo bcdiv(count($cantidadrequisitos) * 100 / $total, '1', 2); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Egresados que han completado el proceso de envio de formatos y tema</h4>
                                            <div class="por-txt"><?php echo count($cantidadformato) + (count($cantidadformatox2) * 2) ; ?> Users (<?php echo bcdiv((count($cantidadformato) + (count($cantidadformatox2) * 2)) * 100 / $total, '1', 2); ?>%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: <?php echo bcdiv((count($cantidadformato) + (count($cantidadformatox2) * 2)) * 100 / $total, '1', 2); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Egresados que han completado el proceso de envio de anteproyecto</h4>
                                             <div class="por-txt"><?php echo count($cantidadanteproyecto) + (count($cantidadanteproyectox2) * 2) ; ?> Users (<?php echo bcdiv((count($cantidadanteproyecto) + (count($cantidadanteproyectox2) * 2)) * 100 / $total, '1', 2); ?>%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: <?php echo bcdiv((count($cantidadanteproyecto) + (count($cantidadanteproyectox2) * 2)) * 100 / $total, '1', 2); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                             <h4 class="por-title">Egresados que han completado el proceso de envio de tesis</h4>                                        
                                            <div class="por-txt"><?php echo count($cantidadtesislink) + (count($cantidadtesislinkx2) * 2) ; ?> Users (<?php echo bcdiv((count($cantidadtesislink) + (count($cantidadtesislinkx2) * 2)) * 100 / $total, '1', 2); ?>%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: <?php echo bcdiv((count($cantidadtesislink) + (count($cantidadtesislinkx2) * 2)) * 100 / $total, '1', 2); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="progress-box progress-2">
                                             <h4 class="por-title">Egresados que han cumplido con los procesos</h4>
                                              <div class="por-txt"><?php echo count($cantidadtesis) + (count($cantidadtesisx2) * 2) ; ?> Users (<?php echo bcdiv((count($cantidadtesis) + (count($cantidadtesisx2) * 2)) * 100 / $total, '1', 2); ?>%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-5" role="progressbar" style="width: <?php echo bcdiv((count($cantidadtesis) + (count($cantidadtesisx2) * 2)) * 100 / $total, '1', 2); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                       
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
        </div>
</div></div>
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="../../static/assets/js/main.js"></script>
        
    </body>

</html>