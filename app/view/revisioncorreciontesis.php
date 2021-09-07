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
        <title>Asignación</title>
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
                $idequipo = $idusuarioformato;
                $tesis = ctrTesisLink::getTesis($idequipo);
                $nombreequipo = ctrEquipo::getnombregrupo($idequipo);
                $misparesciegos2 = ctrUsuario::getlistaparciegopruebatesis($idusuarioformato);
                $x = 0;
                ?>
                <?php $status = ctrTesisLink::getstatus($idequipo); ?>

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Asignar pares ciego</strong>
                                </div>

                                <div class="card-body">
                                    <a href="tesiscorregidas.php" class="btn btn-outline-info float-left mr-3">Regresar a listado</a>

                                    <?php if ($status[0] == 7 or $status[0] == 5) { ?>
                                        <form  role="form" id="frmTesisCancelar" class="float-left mr-3">  
                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> cancelar</button> 
                                            <input type="hidden" name="action" id="_action" value="can2">
                                            <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                            <input type="hidden" name="opc" id="_opc" value="CA2"/>
                                        </form>
                                    <?php } ?>
                                    <?php if ($status[0] != 7) { ?>
                                        <form  role="form" id="frmTesisCorregida" class="float-left mr-3">  
                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> Enviar a egresado para correción</button> 
                                            <input type="hidden" name="action" id="_action" value="ch">
                                            <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                            <input type="hidden" name="opc" id="_opc" value="CH"/>
                                        </form>
                                    <?php } ?>
                                    <?php if ($status[0] != 7) { ?>
                                        <form  role="form" id="frmTesisAprobadaCorregida" class="float-left mr-3">  
                                            <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> Aprobar tesis</button> 
                                            <input type="hidden" name="action" id="_action" value="aprc">
                                            <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                            <input type="hidden" name="opc" id="_opc" value="AC"/>
                                        </form>
                                    <?php } ?>
                                </div>



                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">

                                            <strong class="card-title ">Tesis de  <?php
                                                foreach ($nombreequipo as $nombreequip) {
                                                    echo $nombreequip->getNombres();
                                                }
                                                ?></strong>  


                                            <?php if ($status[0] == 3) { ?>
                                                <div class="alert alert-success float-right mb-0" role="alert"> Tesis por revisar</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 5) { ?>
                                                <div class="alert alert-danger float-right mb-0" role="alert">Tesis con correciones realizada</div>
                                            <?php } ?>
                                        </div>
                                        <div class="card-body">
                                            <table id="tdatos" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Link</th>


                                                    </tr>
                                                </thead>
                                                <tbody id="tdetalle">
                                                    <?php
                                                    foreach ($tesis as $tesi) {
                                                        ?>
                                                        <tr>
                                                            <td align="center"> <a href="<?= $tesi->getLink() ?>" target="blank"><?= $tesi->getLink() ?></a> </td>


                                                        </tr>   
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

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
                $('#frmTesisCancelar').on({
                    submit: function () {
                        $.ajax({
                            url: "equiposubirtesisopc.php",
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


                $('#frmTesisCorregida').on({
                    submit: function () {
                        $.ajax({
                            url: "equiposubirtesisopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Enviado a egresado!", icon: "success", button: true, })
                                            .then((willDelete) => {
                                                if (willDelete) {

                                                    window.location.href = 'tesiscorregidas.php';
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

                $('#frmTesisAprobadaCorregida').on({
                    submit: function () {
                        $.ajax({
                            url: "equiposubirtesisopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Aprobada!", icon: "success", button: true, })
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

