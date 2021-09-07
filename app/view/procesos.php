<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 5 and $Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4 and $Sesion->getIdTipoUsuario() != 2) {
    header('Location: principal.php');
}
error_reporting(0);
$idequipoproceso = $_POST["idequipo"];
?>
<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Egresados-seguimiento</title>
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
        <link rel="stylesheet" href="../../static/assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../../static/assets/css/lib/datatable/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../../static/assets/css/lib/chosen/chosen.min.css">
        <link rel="shortcut icon" href="../../static/img/gestoria.png" type="image/png"/>
    </head>

    <body>
        <!-- menu izquierdo -->
        <?php include "navbar.php" ?>

        <div id="right-panel" class="right-panel">
            <!-- cabezera -->
            <?php include "principaltop.php" ?>
            <?php
            $status1 = ctrFormato::getstatus($idequipoproceso);
            $status2 = ctrAnteproyecto::getstatus($idequipoproceso);
            $status3 = ctrTesisLink::getstatus($idequipoproceso);
            $status4 = ctrTesis::getstatus($idequipoproceso);

            if ($status1[0] == 3) {
                $porcentaje = 25;
                if ($status2[0] == 3) {
                    $porcentaje = 50;
                    if ($status3[0] == 9) {
                        $porcentaje = 75;
                        if ($status4[0] == 2) {
                            $porcentaje = 100;
                        }
                    }
                }
            } else {
                $porcentaje = 0;
            }
            ?>

            <div class="content">
                <div class="animated fadeIn">
                    <!-- los 4 cuadros  -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <form action="observacion.php" role="form" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="opcion" id="opcion" value="1"/> 
                                    <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipoproceso ?>"/>                           
                                    <button type="submit" class="btn btn-link btn-block"> 
                                        <div class="card-body">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib flat-color-2">
                                                    <i class="pe-7s-copy-file"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"></div>
                                                        <div class="stat-heading">Formatos</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button> 
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <form action="observacion.php" role="form" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="opcion" id="opcion" value="2"/>
                                    <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipoproceso ?>"/>                           
                                    <button type="submit" class="btn btn-link btn-block"> 
                                        <div class="card-body">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib flat-color-5">
                                                    <i class="pe-7s-note2"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"></div>
                                                        <div class="stat-heading">Tema</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button> 
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <form action="observacion.php" role="form" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="opcion" id="opcion" value="3"/>
                                    <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipoproceso ?>"/>                           
                                    <button type="submit" class="btn btn-link btn-block"> 
                                        <div class="card-body">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib flat-color-3">
                                                    <i class="pe-7s-news-paper"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"></div>
                                                        <div class="stat-heading">Anteproyecto</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button> 
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <form action="observacion.php" role="form" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="opcion" id="opcion" value="4"/>
                                    <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipoproceso ?>"/>                           
                                    <button type="submit" class="btn btn-link btn-block">       
                                        <div class="card-body">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib flat-color-4">
                                                    <i class="pe-7s-notebook"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"></div>
                                                        <div class="stat-heading">Tesis</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button> 
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <form action="observacion.php" role="form" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="opcion" id="opcion" value="5"/>
                                    <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipoproceso ?>"/>                           
                                    <button type="submit" class="btn btn-link btn-block">  
                                        <div class="card-body">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib flat-color-1">
                                                    <i class="pe-7s-display1"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"></div>
                                                        <div class="stat-heading">Calificación</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button> 
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- /fin los 4 cuadros -->
                    <!--  layout  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Progreso </h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body">
                                            <p class="muted">Porcentaje haciendo referencia a los procesos completados</p>

                                            <?php if ($porcentaje == 25) { ?>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar progress-bar-striped  bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($porcentaje == 50) { ?>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar progress-bar-striped  bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($porcentaje == 75) { ?>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($porcentaje == 100) { ?>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                                </div>
                                            <?php } ?>

                                            <?php if ($porcentaje == 0) { ?>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar progress-bar-striped  bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                aun no ha completado los formatos
                                                </div>
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
        <script src="../../static/lib/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="../../static/assets/js/lib/data-table/datatables.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/jszip.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="../../static/assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/buttons.colVis.min.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="../../static/assets/js/main.js"></script>
        <script src="../../static/assets/js/lib/chosen/chosen.jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#tdatos').DataTable();
            });
        </script>
        <script>
            jQuery(document).ready(function () {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });

        </script>
    </body>

</html>