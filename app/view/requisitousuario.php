<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4) {
    header('Location: principal.php');
}
$idusuariorequisito = $_POST["idusuariorequisito"];
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
                $idusuario = $idusuariorequisito;
                $requisitos = ctrRequisitos::getRequisitos($idusuario);
                $perfiluser = ctrUsuario::perfil($idusuario);
                ?>
                <?php $status = ctrRequisitos::getstatus($idusuario); ?>

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Aprobar requisitos</strong>
                                </div>

                                <div class="card-body" id="hello">


                                    <?php if (count($requisitos) == 6 and $status[0] == 2) { ?>
                                        <form  role="form" id="frmRequisitosaprobar" class="float-left mr-3">  
                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> Aprobar</button> 
                                            <input type="hidden" name="action" id="_action" value="rea">
                                            <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $idusuario ?>"/>                                   
                                            <input type="hidden" name="opc" id="_opc" value="R"/>
                                        </form>
                                    <?php } ?>
                                    <?php if (count($requisitos) == 6 and $status[0] == 2) { ?>
                                        <button type="button" class="btn btn-outline-info float-left mr-3" data-toggle="modal" data-target="#exampleModalCenter">
                                            Requisitos no validos
                                        </button>

                                    <?php } ?>

                                    <?php if (count($requisitos) == 6 and $status[0] != 2) { ?>
                                        <form  role="form" id="frmRequisitos" class="float-left mr-3">  
                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> cancelar</button> 
                                            <input type="hidden" name="action" id="_action" value="apr">
                                            <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $idusuario ?>"/>                                   
                                            <input type="hidden" name="opc" id="_opc" value="A"/>
                                        </form>
                                    <?php } ?>
                                    <a href="revisionderequisitos.php" class="btn btn-outline-info">Regresar a listado</a>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Requisitos de <?= $perfiluser->apellido ?> <?= $perfiluser->nombre ?></strong>  

                                            <?php if ($status[0] == 2) { ?>
                                                <div class="alert alert-primary float-right mb-0" role="alert">Requisitos por revisar</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 3) { ?>
                                                <div class="alert alert-success float-right mb-0" role="alert"> Requisitos aprobado</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 4) { ?>
                                                <div class="alert alert-danger float-right mb-0" role="alert">Requisitos rechazado</div>
                                            <?php } ?>



                                        </div>
                                        <div class="card-body">
                                            <table id="tdatos" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Ruta</th>
                                                        <th>Extension</th>

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

                                                        </tr>   
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h6>Observación</h6>
                                            </div>
                                            <div class="modal-body">
                                                <form  role="form" id="frmRequisitosnoaprobar">  
                                                    <label class="control-label col-xs-7">Observación:</label>
                                                    <div class="col-xs-7">
                                                        <textarea id="_descripcion" name="descripcion" rows="3" placeholder="Detalle el motivo por lo cual no fue aprobado los requisitos" class="form-control"></textarea>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="aprobar" id="aprobar">Enviar</button> 
                                                    <button type="button" type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger"> Cancelar</button> 

                                                    <input type="hidden" name="action" id="_action" value="nrea">
                                                    <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $idusuario ?>"/>                                   
                                                    <input type="hidden" name="opc" id="_opc" value="N"/>
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
                // aprobar requisitos
                $('#frmRequisitosaprobar').on({
                    submit: function () {
                        $.ajax({
                            url: "requisitosopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            beforeSend: function () {
                                swal({
                                    title: "Enviando correo a egresado..",
                                    text: "Por favor espere",
                                    icon: "../../static/img/loader.gif",
                                    button: false,
                                    closeOnClickOutside: false,
                                    closeOnEsc: false
                                });
                            },
                            success: function (data, textStatus, jqXHR) {

                                if (data.ok == true) {
                                    swal({title: "Requisitos Aprobados!", icon: "success", button: true, })
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
                                swal({title: "Error al aprobar!", icon: "warning", dangerMode: true, })

                            }
                        });
                        return false;
                    }
                });

                // no aprobar requisistos
                $('#frmRequisitosnoaprobar').on({
                    submit: function () {
                        $.ajax({
                            url: "requisitosopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Requisistos no validos!", icon: "success", button: true, })
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

                // cancelar
                $('#frmRequisitos').on({
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
                                swal({title: "Error!", icon: "warning", dangerMode: true, })

                            }
                        });
                        return false;
                    }
                });
            });


        </script>


    </body>
</html>
