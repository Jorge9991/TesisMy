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
        <title>Calificación</title>
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
                $idequipos = ctrUsuario::getequipo($idusuario);
                $idequipo = $idequipos[0];
                $temas = ctrFormato::getTema($idequipo);
                $notas = ctrNota::getNotasgrupo($idequipo);
                $nombreequipo = ctrEquipo::getnombregrupo($idequipo);

                $status = ctrTesis::getstatus($idequipo);
                $tesis = ctrTesis::getTesis($idequipo);

                $x = 0;
                ?>

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert" >
                                Recuerde que debe subir su tesis con las firmas para completar con el proceso de titulación
                            </div> 
                            <div class="card">
                                <div class="card-header">
                                    <strong>Calificación</strong>
                                </div>


                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">

                                            <strong class="card-title ">Tesis de  <?php
                                                foreach ($nombreequipo as $nombreequip) {
                                                    echo $nombreequip->getNombres();
                                                }
                                                ?></strong>  



                                            <?php if ($status[0] == 9) { ?>
                                                <div class="alert alert-danger float-right mb-0" role="alert">Tesis Calificada</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="row form-group col col-sm-12">
                                            <div class="col col-sm-1"><label class="">Tema: </label></div>
                                            <div class="col col-sm-11"><input type="text" id="_tema" name="tema" placeholder="tema..."  class="form-control" <?php if ($temas) { ?> value="<?= $temas->tema ?>" <?php } ?> disabled=""></div>
                                        </div>

                                        <div class="row form-group col col-sm-12">
                                            <div class="col col-sm-1"><label class="">Nota: </label></div>
                                            <div class="col col-sm-2"> 
                                                <div class="alert alert-success" role="alert">
                                                    <?php
                                                    if ($notas) {
                                                        $cali = 0;
                                                        foreach ($notas as $nota) {
                                                            $cali = $cali + $nota->getNota();
                                                        }

                                                        echo bcdiv($cali / 3, '1', 2);
                                                    }
                                                    ?></div></div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Enviar Tesis</strong>
                                </div>

                                <div class="card-body">


                                    <?php if (!$tesis) { ?>  

                                        <button type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#documento">
                                            Subir Tesis
                                        </button>
                                    <?php } ?>




                                    <?php if ($status[0] == 1) { ?>  

                                        <form  role="form" id="frmTesis">  
                                            <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar"> Enviar tesis</button> 
                                            <input type="hidden" name="action" id="_action" value="apr">
                                            <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                   
                                            <input type="hidden" name="opc" id="_opc" value="A"/>
                                        </form>
                                    <?php } ?>



                                    <!-- cancelar envio-->
                                    <?php if ($status[0] == 2) { ?>

                                        <form  role="form" id="frmTesiscancelar">  
                                            <button type="submit" class="btn btn-outline-info float-left mr-3" > Cancelar envio</button> 
                                            <input type="hidden" name="action" id="_action" value="can">
                                            <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                            <input type="hidden" name="opc" id="_opc" value="C"/>
                                        </form>

                                    <?php } ?>

                                    <?php if ($status[0] == 1) { ?>
                                        <div class="alert alert-primary float-right mb-0" role="alert">Tesis sin enviar</div>
                                    <?php } ?>
                                    <?php if ($status[0] == 2) { ?>
                                        <div class="alert alert-warning float-right mb-0" role="alert"> Tesis entregada</div>
                                    <?php } ?>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">

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
                                                    foreach ($tesis as $tesi) {
                                                        ?>
                                                        <tr>
                                                            <td align="center"> <a href="<?= $tesi->getRuta() ?>" target="blank"><?= $tesi->getNombrearchivo() ?></a> </td>
                                                            <td align="center"><?= $tesi->getExtension() ?></td>
                                                            <td align="center">

                                                                <form action="../drive/eliminartesis.php" role="form" " method="POST" enctype="multipart/form-data" >

                                                                    <input type="hidden" name="idEquipo" id="idEquipo" value="<?= $idequipo ?>"/>
                                                                    <input type="hidden" name="iddrive" id="iddrive" value="<?= $tesi->getIddrive() ?>"/>


                                                                    <button type="submit" class="btn btn-outline-danger"> Eliminar Archivo</button> 



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
                                                <h6>Subir Tesis</h6>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal " action="../drive/subirtesis.php" role="form"  method="POST" enctype="multipart/form-data">

                                                    <input type="hidden" name="idEquipo" id="idEquipo" value="<?= $idequipo ?>"/>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Seleccionar</label></div>
                                                        <div class="col-12 col-md-9"><input type="file" id="archivos" name="archivos" class="form-control-file"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-group center-block">
                                                            <button type="submit" class="btn  btn-lg" ><span class="glyphicon glyphicon-bell"></span> Subir documento</button> 
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
        <script>

            $(function () {
                // aprobar 
                $('#frmCalificar').on({
                    submit: function () {
                        $.ajax({
                            url: "notasopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Nota asignada!", icon: "success", button: true, })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.reload();
                                                }
                                            })
                                    return;
                                }
                                if (data.ok == false) {
                                    swal({title: "Nota actualizada!", icon: "success", button: true, })
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
                                swal({title: "Error!", icon: "warning", dangerMode: true, })

                            }
                        });
                        return false;
                    }
                });

            });
            $(function () {
                // enviar anteproyecto para aprobacion
                $('#frmTesis').on({
                    submit: function () {
                        $.ajax({
                            url: "tesisopc.php",
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

                // cancelar envio
                $('#frmTesiscancelar').on({
                    submit: function () {
                        $.ajax({
                            url: "tesisopc.php",
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
