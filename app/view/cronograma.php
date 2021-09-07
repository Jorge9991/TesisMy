<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4 ) {
    header('Location: principal.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cronograma</title>

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
                            <div class="card">
                                <div class="card-header">
                                    <strong>Actualizar fechas</strong>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Cronograma</strong>  
                                        </div>
                                        <div class="card-body">
                                            <form  role="form" id="frmCronograma" class="form-horizontal">  
                                                <div class="card-body card-block">

                                                    <?php
                                                    $cronogramas = ctrCronograma::getCronogramas();
                                                    ?>

                                                    <div class="row form-group">
                                                        <input type="hidden" name="idcronograma1" id="idcronograma1" value="<?= $cronogramas[0]['idcronograma'] ?>"/>
                                                        <div class="col col-md-5"><label  class=" form-control-label"><?= $cronogramas[0]['descripcion'] ?></label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechainicio1" id="fechainicio1" class="form-control"<?php if ($cronogramas[0]['fechainicio']) { ?> value="<?= $cronogramas[0]['fechainicio'] ?>" <?php } ?>></div>
                                                        <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechafinal1" id="fechafinal1" class="form-control"<?php if ($cronogramas[0]['fechafinal']) { ?> value="<?= $cronogramas[0]['fechafinal'] ?>" <?php } ?>></div>


                                                    </div>

                                                    <div class="row form-group">
                                                        <input type="hidden" name="idcronograma2" id="idcronograma2" value="<?= $cronogramas[1]['idcronograma'] ?>"/>
                                                        <div class="col col-md-5"><label  class=" form-control-label"><?= $cronogramas[1]['descripcion'] ?></label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechainicio2" id="fechainicio2" class="form-control"<?php if ($cronogramas[1]['fechainicio']) { ?> value="<?= $cronogramas[1]['fechainicio'] ?>" <?php } ?>></div>
                                                        <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechafinal2" id="fechafinal2" class="form-control"<?php if ($cronogramas[1]['fechafinal']) { ?> value="<?= $cronogramas[1]['fechafinal'] ?>" <?php } ?>></div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <input type="hidden" name="idcronograma3" id="idcronograma3" value="<?= $cronogramas[2]['idcronograma'] ?>"/>
                                                        <div class="col col-md-5"><label  class=" form-control-label"><?= $cronogramas[2]['descripcion'] ?></label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechainicio3" id="fechainicio3" class="form-control"<?php if ($cronogramas[2]['fechainicio']) { ?> value="<?= $cronogramas[2]['fechainicio'] ?>" <?php } ?>></div>
                                                        <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechafinal3" id="fechafinal3" class="form-control"<?php if ($cronogramas[2]['fechafinal']) { ?> value="<?= $cronogramas[2]['fechafinal'] ?>" <?php } ?>></div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <input type="hidden" name="idcronograma4" id="idcronograma4" value="<?= $cronogramas[3]['idcronograma'] ?>"/>
                                                        <div class="col col-md-5"><label  class=" form-control-label"><?= $cronogramas[3]['descripcion'] ?></label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechainicio4" id="fechainicio4" class="form-control"<?php if ($cronogramas[3]['fechainicio']) { ?> value="<?= $cronogramas[3]['fechainicio'] ?>" <?php } ?>></div>
                                                        <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechafinal4" id="fechafinal4" class="form-control"<?php if ($cronogramas[3]['fechafinal']) { ?> value="<?= $cronogramas[3]['fechafinal'] ?>" <?php } ?>></div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <input type="hidden" name="idcronograma5" id="idcronograma5" value="<?= $cronogramas[4]['idcronograma'] ?>"/>
                                                        <div class="col col-md-5"><label  class=" form-control-label"><?= $cronogramas[4]['descripcion'] ?></label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechainicio5" id="fechainicio5" class="form-control"<?php if ($cronogramas[4]['fechainicio']) { ?> value="<?= $cronogramas[4]['fechainicio'] ?>" <?php } ?>></div>
                                                        <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechafinal5" id="fechafinal5" class="form-control"<?php if ($cronogramas[4]['fechafinal']) { ?> value="<?= $cronogramas[4]['fechafinal'] ?>" <?php } ?>></div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <input type="hidden" name="idcronograma6" id="idcronograma6" value="<?= $cronogramas[5]['idcronograma'] ?>"/>
                                                        <div class="col col-md-5"><label  class=" form-control-label"><?= $cronogramas[5]['descripcion'] ?></label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechainicio6" id="fechainicio6" class="form-control"<?php if ($cronogramas[5]['fechainicio']) { ?> value="<?= $cronogramas[5]['fechainicio'] ?>" <?php } ?>></div>
                                                        <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                        <div class="col-12 col-md-3"><input type="date" name="fechafinal6" id="fechafinal6" class="form-control"<?php if ($cronogramas[5]['fechafinal']) { ?> value="<?= $cronogramas[5]['fechafinal'] ?>" <?php } ?>></div>
                                                    </div>
                                                    <div class="row form-group">

                                                        <div class="col col-md-12"><label class=" form-control-label">Enlace para zoom:</label></div>
                                                        <input type="text" id="link" name="link" placeholder="Link" class="form-control" <?php if ($cronogramas[2]['link']) { ?> value="<?= $cronogramas[2]['link'];
                                                    } ?> "/>
                                                    </div>
                                                    <button type="submit" class="btn btn-outline-info" > Actualizar</button> 
                                                    <input type="hidden" name="action" id="_action" value="act">
                                                    <input type="hidden" name="opc" id="_opc" value="A"/>

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
                $('#frmCronograma').on({
                    submit: function () {
                        $.ajax({
                            url: "cronogramaopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Cronograma actualizado!", icon: "success", button: true, })
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
                                swal({title: "Error al Actualizar!", icon: "warning", dangerMode: true, })
                            }
                        });
                        return false;
                    }
                });
            });
        </script>
    </body>
</html>

