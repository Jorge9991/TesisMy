<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 2) {
    header('Location: principal.php');
}
error_reporting(0);
$idusuarioformato = $_POST["idusuarioanteproyecto"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Calificar</title>
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

            <div class="content">
                <?php
                $idequipo = $idusuarioformato;
                $idusuario = $Sesion->getIdUsuario();
                $temas = ctrFormato::getTema($idequipo);
                $notas = ctrNota::getNotas($idusuario, $idequipo);
                $nombreequipo = ctrEquipo::getnombregrupo($idequipo);

                $x = 0;
                ?>
                <?php $status = ctrTesisLink::getstatus($idequipo); ?>

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Asignar calificación</strong>
                                </div>

                                <div class="card-body">
                                    <a href="calificar.php" class="btn btn-outline-info float-left mr-3">Regresar a listado</a>

                                </div>



                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">

                                            <strong class="card-title ">Tesis de  <?php
                                                foreach ($nombreequipo as $nombreequip) {
                                                    echo $nombreequip->getNombres();
                                                }
                                                ?></strong>  


                                            <?php if ($status[0] == 8) { ?>
                                                <div class="alert alert-danger float-right mb-0" role="alert"> Tesis por calificar</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 9) { ?>
                                                <div class="alert alert-success float-right mb-0" role="alert">Tesis Calificada</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="row form-group col col-sm-12">
                                            <div class="col col-sm-1"><label class="">Tema: </label></div>
                                            <div class="col col-sm-11"><input type="text" id="_tema" name="tema" placeholder="tema..."  class="form-control" <?php if ($temas) { ?> value="<?= $temas->tema ?>" <?php } ?> disabled=""></div>
                                        </div>
                                        <form  role="form" id="frmCalificar" class="float-left mr-3">  
                                            <div class="row form-group col col-sm-12">
                                                <div class="col col-sm-1"><label class="">Nota: </label></div>
                                                <div class="col col-sm-2"><input type="number" id="nota" min="0" max="10" step="any" name="nota" placeholder="0.00"  class="form-control" required="true" <?php if ($notas) { ?> value="<?php foreach ($notas as $nota) {
                                                    echo $nota->getNota();
                                                } ?>" <?php } ?>></div>
                                            </div>
<?php if (!$notas) { ?>
                                                <button type="submit" class="btn btn-outline-info" > Calificar</button> 
                                                <input type="hidden" name="action" id="_action" value="c">
                                                <input type="hidden" name="idusuario" id="idusuario" value="<?= $idusuario ?>"/> 
                                                <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                                <input type="hidden" name="opc" id="_opc" value="C"/>
<?php } ?>
<?php if ($notas) { ?>
                                                <button type="submit" class="btn btn-outline-info" > Actualizar</button> 
                                                <input type="hidden" name="action" id="_action" value="a">

                                                <input type="hidden" name="idusuario" id="idusuario" value="<?= $idusuario ?>"/> 
                                                <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                                <input type="hidden" name="opc" id="_opc" value="A"/>
<?php } ?>
                                        </form>
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


        </script>


    </body>
</html>
