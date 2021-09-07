<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4) {
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
                <?php
                $idusuario = $Sesion->getIdUsuario();
                $documentos1 = ctrDocumento::getDocumento1();
                $documentos2 = ctrDocumento::getDocumento2();
                $documentos3 = ctrDocumento::getDocumento3();
                ?>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Actualizar formatos</strong>
                                </div>

                                <div class="card-body">                            
                                    <button type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#documento">
                                        Subir formatos
                                    </button>                            
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Actualizar formatos</strong>  
                                        </div>
                                        <div class="card-body">
                                            <table id="tdatos" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Ruta</th>
                                                        <th>Extension</th>
                                                        <th>Eliminar </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tdetalle">
                                                    <?php
                                                    foreach ($documentos1 as $documento1) {

                                                        $id = $documento1->getId();
                                                        ?>
                                                        <tr>
                                                            <td align="center"> <a href="<?= $documento1->getRuta() ?>" target="blank"><?= $documento1->getNombrearchivo() ?></a> </td>
                                                            <td align="center"><?= $documento1->getExtension() ?></td>
                                                            <td align="center">
                                                                <form action="../drive/eliminardocumentos.php" role="form" " method="POST" enctype="multipart/form-data" >
                                                                    <input type="hidden" name="iddrive" id="iddrive" value="<?= $documento1->getIddrive() ?>"/>
                                                                    <button type="submit" class="btn btn-outline-danger"> Eliminar</button> 
                                                                </form>
                                                            </td>
                                                        </tr>   
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="documento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h6>Solo subir formatos 1, 2 y 3</h6>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal " action="../drive/documentos.php" role="form" id="frmHabilidad" method="POST" enctype="multipart/form-data">

                                                    <input type="hidden" name="categoria" id="categoria" value="1"/>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Seleccionar</label></div>
                                                        <div class="col-12 col-md-9"><input type="file" id="archivos" name="archivos" class="form-control-file"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-group center-block">
                                                            <button type="submit" class="btn  btn-lg active" ><span class="glyphicon glyphicon-bell"></span> Subir documento</button> 
                                                            <button type="button" type="button" data-dismiss="modal" aria-label="Close" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button> 
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Actualizar estructura de anteproyecto</strong>
                                </div>

                                <div class="card-body">                            
                                    <button type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#documento2">
                                        Subir formato anteproyecto
                                    </button>                            
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Actualizar estructura de anteproyecto</strong>  
                                        </div>
                                        <div class="card-body">
                                            <table id="tdatos" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Ruta</th>
                                                        <th>Extension</th>
                                                        <th>Eliminar </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tdetalle">
                                                    <?php
                                                    foreach ($documentos2 as $documento2) {

                                                        $id = $documento2->getId();
                                                        ?>
                                                        <tr>
                                                            <td align="center"> <a href="<?= $documento2->getRuta() ?>" target="blank"><?= $documento2->getNombrearchivo() ?></a> </td>
                                                            <td align="center"><?= $documento2->getExtension() ?></td>
                                                            <td align="center">
                                                                <form action="../drive/eliminardocumentos.php" role="form" " method="POST" enctype="multipart/form-data" >
                                                                    <input type="hidden" name="iddrive" id="iddrive" value="<?= $documento2->getIddrive() ?>"/>
                                                                    <button type="submit" class="btn btn-outline-danger"> Eliminar</button> 
                                                                </form>
                                                            </td>
                                                        </tr>   
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="documento2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h6>Solo subir formato anteproyecto</h6>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal " action="../drive/documentos.php" role="form" id="frmHabilidad" method="POST" enctype="multipart/form-data">

                                                    <input type="hidden" name="categoria" id="categoria" value="2"/>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Seleccionar</label></div>
                                                        <div class="col-12 col-md-9"><input type="file" id="archivos" name="archivos" class="form-control-file"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-group center-block">
                                                            <button type="submit" class="btn  btn-lg active" ><span class="glyphicon glyphicon-bell"></span> Subir documento</button> 
                                                            <button type="button" type="button" data-dismiss="modal" aria-label="Close" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button> 
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Actualizar estructura de tesis</strong>
                                </div>

                                <div class="card-body">                            
                                    <button type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#documento3">
                                        Subir formato tesis
                                    </button>                            
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Actualizar estructura de tesis</strong>  
                                        </div>
                                        <div class="card-body">
                                            <table id="tdatos" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Ruta</th>
                                                        <th>Extension</th>
                                                        <th>Eliminar </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tdetalle">
                                                    <?php
                                                    foreach ($documentos3 as $documento3) {

                                                        $id = $documento3->getId();
                                                        ?>
                                                        <tr>
                                                            <td align="center"> <a href="<?= $documento3->getRuta() ?>" target="blank"><?= $documento3->getNombrearchivo() ?></a> </td>
                                                            <td align="center"><?= $documento3->getExtension() ?></td>
                                                            <td align="center">
                                                                <form action="../drive/eliminardocumentos.php" role="form" " method="POST" enctype="multipart/form-data" >
                                                                    <input type="hidden" name="iddrive" id="iddrive" value="<?= $documento3->getIddrive() ?>"/>
                                                                    <button type="submit" class="btn btn-outline-danger"> Eliminar</button> 
                                                                </form>
                                                            </td>
                                                        </tr>   
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="documento3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h6>Solo subir formato tesis</h6>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal " action="../drive/documentos.php" role="form" id="frmHabilidad" method="POST" enctype="multipart/form-data">

                                                    <input type="hidden" name="categoria" id="categoria" value="3"/>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Seleccionar</label></div>
                                                        <div class="col-12 col-md-9"><input type="file" id="archivos" name="archivos" class="form-control-file"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-group center-block">
                                                            <button type="submit" class="btn  btn-lg active" ><span class="glyphicon glyphicon-bell"></span> Subir documento</button> 
                                                            <button type="button" type="button" data-dismiss="modal" aria-label="Close" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button> 
                                                        </div>

                                                    </div>

                                                </form>
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
        <script src="../../static/assets/js/lib/data-table/datatables.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/jszip.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="../../static/assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="../../static/assets/js/lib/data-table/buttons.colVis.min.js"></script>
        <script src="../../static/assets/js/init/datatables-init.js"></script>
        <!-- Scripts -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="../../static/assets/js/main.js"></script>
        <script src="../../static/assets/js/lib/chosen/chosen.jquery.min.js"></script>


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

