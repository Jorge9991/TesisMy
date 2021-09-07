<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 3) {
    header('Location: principal.php');
}
?>
<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Subir Tesis</title>
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
            <?php
// si sale 1 es por que ya estoy en un equipo
            $idusuario = $Sesion->getIdUsuario();
            $idequipos = ctrUsuario::getequipo($idusuario);
            $idequipo = $idequipos[0];
            $status = ctrTesisLink::getstatus($idequipo);
            $tesis = ctrTesisLink::getTesis($idequipo);
            
            ?>

            <div class="content">

                <?php if ($status[0] != 2 and $status[0] != 3 and $status[0] != 5 and $status[0] != 6 and $status[0] != 7 and $status[0] != 8 and $status[0] != 9) { ?>
                    <?php if ($tesisfechaposigativo == 0) { ?>  
                        <div class="alert alert-danger" role="alert">
                            La fecha límite para la recepcion a caducado, consulte al gestor académico.
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                            <?php tesisfecha(); ?>    
                        </div>

                    <?php } ?> 
                <?php } ?>
                <?php if ($status[0] == 2) { ?>
                    <div class="alert alert-warning" role="alert" >
                        La tesis esta en estado de revision
                    </div>                                                    
                <?php } ?>

                <?php if ($status[0] == 3) { ?>
                    <div class="alert alert-warning" role="alert" >
                        La tesis esta siendo revisada por los pares ciego
                    </div>                                                    
                <?php } ?>
                <?php if ($status[0] == 5) { ?>
                    <div class="alert alert-warning" role="alert" >
                        La tesis ha sido revisada, por favor debe corrigir las observaciones y al finalizar actualizar el link con el documento modificado
                    </div>                                                    
                <?php } ?>
                <?php if ($status[0] == 7) { ?>
                    <div class="alert alert-warning " role="alert">
                        Tesis lista! por favor espere a que el gestor le asigne fecha para su sustentación
                    </div>
                <?php } ?>
                <?php if ($status[0] == 8) { ?>
                    <div class="alert alert-success " role="alert">
                        Su proyecto de investigación fue aprobado, deberá sustentar según la fecha asignada.
                    </div>
                <?php } ?>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Tesis </strong>  

                                            <?php if ($status[0] == 1) { ?>
                                                <div class="alert alert-primary float-right mb-0" role="alert">Tesis sin enviar</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 2) { ?>
                                                <div class="alert alert-warning float-right mb-0" role="alert"> Tesis entregada</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 3) { ?>
                                                <div class="alert alert-warning float-right mb-0" role="alert">Tesis siendo revisada por pares ciego</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 4) { ?>
                                                <div class="alert alert-danger float-right mb-0" role="alert">Rechazada</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 5) { ?>
                                                <div class="alert alert-warning float-right mb-0" role="alert">Correción</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 6) { ?>
                                                <div class="alert alert-warning float-right mb-0" role="alert">Tesis enviada con correciones realizada</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 7) { ?>
                                                <div class="alert alert-warning float-right mb-0" role="alert">Tesis lista</div>
                                            <?php } ?>



                                        </div>
                                        <div class="card-header">
                                            <?php if ($status[0] == 8) { ?>
                                                <div class="col col-md-4 float-left "><label  class=" form-control-label">Fecha y hora de sustentación:</label></div>

                                                <div class="col-12 col-md-4 float-left "><input type="datetime-local" name="fechasustentacion" id="fechasustentacion" class="form-control" value="<?php
                                                    foreach ($tesis as $tesi) {
                                                        echo $tesi->getFechasustentacion();
                                                    }
                                                    ?>" disabled=""></div>
                                                <?php } ?> 
                                        </div>
                                        <form  role="form" id="frmTesiscrear">  
                                            <br />
                                            <div class="row form-group">
                                                <div class="col col-sm-11"><input type="text" id="link" name="link" placeholder="Link"<?php if ($tesis) { ?> value="<?php
                                                        foreach ($tesis as $tesi) {
                                                            echo $tesi->getLink();
                                                        }
                                                        ?>" <?php } ?>  class="form-control" <?php if ($status[0] == 7 or $status[0] == 8 or $status[0] == 9) { ?> disabled=""  <?php } ?>></div>
                                                                                  <?php if ($tesis) { ?>
                                                    <div class="col col-sm-1"><a href="<?= $tesi->getLink() ?>" target="blank" class="btn btn-outline-info float-left mr-3">link</a>  </div>
                                                <?php } ?>
                                            </div>   
                                            <?php if (!$tesis) { ?>
                                                <button type="submit" class="btn btn-outline-info" >Subir Link</button> 
                                                <input type="hidden" name="action" id="_action" value="cre">
                                                <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                                <input type="hidden" name="opc" id="_opc" value="G"/>
                                            <?php } ?>
                                            <?php if (count($tesis) == 1 and $status[0] != 5 and $status[0] != 6) { ?>
                                                <?php if ($tesisfechaposigativo == 0 or $status[0] == 7 or $status[0] == 8 or $status[0] == 9) { ?>  
                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled=""> Actualizar link</button> 
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar"> Actualizar link</button> 
                                                    <input type="hidden" name="action" id="_action" value="act">
                                                    <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                   
                                                    <input type="hidden" name="opc" id="_opc" value="A"/>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php if (count($tesis) == 1 and $status[0] == 5) { ?>
                                                <?php if ($tesisfechaposigativo == 0) { ?>  
                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled=""> Actualizar link</button> 
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar"> Actualizar link</button> 
                                                    <input type="hidden" name="action" id="_action" value="act2">
                                                    <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                   
                                                    <input type="hidden" name="opc" id="_opc" value="A2"/>
                                                <?php } ?>
                                            <?php } ?>
                                        </form>
                                        <?php if ($status[0] == 6) { ?>
                                            <form  role="form" id="frmCancelar" class="float-left mr-3">  
                                                <button type="submit" class="btn btn-primary" name="aprobar" id="aprobar"> cancelar</button> 
                                                <input type="hidden" name="action" id="_action" value="can">
                                                <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                                <input type="hidden" name="opc" id="_opc" value="C"/>
                                            </form>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
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

            $(function () {


                // crear
                $('#frmTesiscrear').on({
                    submit: function () {
                        $.ajax({
                            url: "equiposubirtesisopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Realizado con exito", icon: "success", button: true, })
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
                                swal({title: "Error al subir!", icon: "warning", dangerMode: true, })

                            }
                        });
                        return false;
                    }
                });


                // cancelar
                $('#frmCancelar').on({
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
