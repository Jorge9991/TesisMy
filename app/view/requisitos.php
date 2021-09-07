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
        <title>Requisitos</title>
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
        <link rel="stylesheet" href="../../static/assets/css/style.css">
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
                $requisitos = ctrRequisitos::getRequisitos($idusuario);
                ?>
                <?php $status = ctrRequisitos::getstatus($idusuario); ?>

                <?php if (count($requisitos) == 6 and $status[0] == 1) { ?>

                    <?php if ($requisitosfechaposigativo == 0) { ?>  
                        <div class="alert alert-danger" role="alert">
                            La fecha límite para la recepcion a caducado!, consulte al gestor académico.
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                            <?php requisitosfecha(); ?>    
                        </div>
                    <?php } ?>
                <?php } ?> 
                <?php if (count($requisitos) != 6) { ?>

                    <?php if ($requisitosfechaposigativo == 0) { ?>  
                        <div class="alert alert-danger" role="alert">
                            La fecha límite para la recepcion a caducado!, consulte al gestor académico.
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                            <?php requisitosfecha(); ?>    
                        </div>
                    <?php } ?>
                <?php } ?> 
                <?php if (count($requisitos) == 6 and $status[0] == 2) { ?>
                    <div class="alert alert-warning" role="alert" >
                        Los requisitos han sido enviados para su aprobación.
                    </div>

                <?php } ?> 
                <?php if (count($requisitos) == 6 and $status[0] == 3) { ?>
                    <div class="alert alert-success" role="alert" >
                        Dirigase a formatos para descargar y continuar con el proceso
                    </div>
                <?php } ?> 

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Envío de requisitos</strong>
                                </div>

                                <div class="card-body">
                                    <?php
                                    if ($status[0] == 4) {
                                        $observacion = ctrRequisitos::getobservacion($idusuario);
                                        ?>

                                        <div class="alert alert-info" role="alert">
                                            <span class="badge badge-pill badge-info">Observaciones</span>
                                            <?php echo $observacion[0] ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (count($requisitos) != 6) { ?>
                                        <button type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#documento">
                                            Subir archivo
                                        </button>
                                    <?php } ?>
                                    <?php if (count($requisitos) == 6 and $status[0] == 1 and $requisitosfechaposigativo == 1) { ?>

                                        <form  role="form" id="frmRequisitos">  


                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> Enviar requisitos</button> 
                                            <input type="hidden" name="action" id="_action" value="apr">
                                            <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $Sesion->getIdUsuario() ?>"/>                                   
                                            <input type="hidden" name="opc" id="_opc" value="A"/>

                                        </form>

                                    <?php } ?>
                                    <?php if (count($requisitos) == 6 and $status[0] == 1 and $requisitosfechaposigativo == 0) { ?>

                                        <form  role="form" id="frmRequisitos">  


                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> Enviar requisitos</button> 


                                        </form>

                                    <?php } ?>

                                    <?php if (count($requisitos) == 6 and $status[0] == 4 and $requisitosfechaposigativo == 1) { ?>

                                        <form  role="form" id="frmRequisitos">  


                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> Volver a enviar requisitos corregidos</button> 
                                            <input type="hidden" name="action" id="_action" value="apr">
                                            <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $Sesion->getIdUsuario() ?>"/>                                   
                                            <input type="hidden" name="opc" id="_opc" value="A"/>

                                        </form>

                                    <?php } ?>
                                    <?php if (count($requisitos) == 6 and $status[0] == 4 and $requisitosfechaposigativo == 0) { ?>

                                        <form  role="form" id="frmRequisitos">  


                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar" disabled=""> Volver a enviar requisitos corregidos</button> 

                                        </form>

                                    <?php } ?>
                                    <?php if (count($requisitos) == 6 and $status[0] == 2 and $requisitosfechaposigativo == 1) { ?>

                                        <form  role="form" id="frmRequisitoscancelar">  


                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> Cancelar envio</button> 
                                            <input type="hidden" name="action" id="_action" value="can">
                                            <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $Sesion->getIdUsuario() ?>"/>                                   
                                            <input type="hidden" name="opc" id="_opc" value="C"/>

                                        </form>

                                    <?php } ?>
                                    <?php if (count($requisitos) == 6 and $status[0] == 2 and $requisitosfechaposigativo == 0) { ?>

                                        <form  role="form" id="frmRequisitoscancelar">  


                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar" disabled=""> Cancelar envio</button> 

                                        </form>

                                    <?php } ?>
                                    <?php if (count($requisitos) == 6 and $status[0] == 3) { ?>

                                        <a href="formatosdescarga.php" class="btn btn-outline-info">Descargar formatos</a>

                                    <?php } ?>

                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Requisitos (6 archivos)</strong>  

                                            <?php if ($status[0] == 1) { ?>
                                                <div class="alert alert-primary float-right mb-0" role="alert">Requisitos sin enviar</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 2) { ?>
                                                <div class="alert alert-warning float-right mb-0" role="alert"> Requisitos entregados</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 3) { ?>
                                                <div class="alert alert-success float-right mb-0" role="alert">Requisitos aprobado</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 4) { ?>
                                                <div class="alert alert-danger float-right mb-0" role="alert">Requisitos rechazados</div>
                                            <?php } ?>


                                        </div>
                                        <div class="card-body">
                                            <table id="tdatos" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Ruta</th>
                                                        <th>Extension</th>
                                                        <th>Archivo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tdetalle">
                                                    <?php
                                                    foreach ($requisitos as $requisito) {

                                                        $id = $requisito->getIdRequisitos();
                                                        ?>
                                                        <tr>
                                                            <td align="center"> <a href="<?= $requisito->getRuta() ?>" target="blank"><?= $requisito->getNombrearchivo() ?></a> </td>
                                                            <td align="center"><?= $requisito->getExtension() ?></td>
                                                            <td align="center">
                                                                <?php if ($status[0] == 2 or $status[0] == 3 or $requisitosfechaposigativo == 0) { ?>

                                                                    <button class="btn btn-outline-danger" disabled=""> Eliminar Archivo</button> 

                                                                <?php } ?>
                                                                <form action="../drive/eliminar.php" role="form" " method="POST" enctype="multipart/form-data" >

                                                                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $idusuario ?>"/>
                                                                    <input type="hidden" name="iddrive" id="iddrive" value="<?= $requisito->getIddrive() ?>"/>

                                                                    <?php if ($status[0] == 1 or $status[0] == 4) { ?>
                                                                        <?php if ($requisitosfechaposigativo == 1) { ?>
                                                                            <button type="submit" class="btn btn-outline-danger"> Eliminar Archivo</button> 
                                                                        <?php } ?>
                                                                    <?php } ?>


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
                                                <h6>Subir documento</h6>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal " action="../drive/subir.php" role="form" id="frmHabilidad" method="POST" enctype="multipart/form-data">

                                                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $idusuario ?>"/>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Seleccionar</label></div>
                                                        <div class="col-12 col-md-9"><input type="file" id="archivos" name="archivos" class="form-control-file"></div>
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <div class="form-group center-block ">
                                                            <button type="submit" class="btn  btn-lg active float-left" ><span class="glyphicon glyphicon-bell"></span> Subir documento</button> 
                                                            <button type="button" type="button" data-dismiss="modal" aria-label="Close" class="btn btn-lg btn-danger float-left"><span class="glyphicon glyphicon-remove"></span> Cancelar</button> 
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
            $(function () {
                // enviar requisistos para aprobacion
                $('#frmRequisitos').on({
                    submit: function () {
                        $.ajax({
                            url: "requisitosopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Enviado!", icon: "success", button: true, })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.reload();
                                                }
                                            })
                                    return;
                                }
                                alert(data.error);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                swal({title: "Error al enviar!", icon: "warning", dangerMode: true, })

                            }
                        });
                        return false;
                    }
                });

                // cancelar requisistos
                $('#frmRequisitoscancelar').on({
                    submit: function () {
                        $.ajax({
                            url: "requisitosopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Cancelado!", icon: "success", button: true, })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.reload();
                                                }
                                            })
                                    return;
                                }
                                alert(data.error);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                swal({title: "Error al cancelar!", icon: "warning", dangerMode: true, })

                            }
                        });
                        return false;
                    }
                });
            });

        </script>


    </body>
</html>

