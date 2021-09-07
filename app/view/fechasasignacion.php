<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4) {
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
        <title>Asignación de fecha</title>
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
                //$misparesciegos2 = ctrUsuario::getlistajuradotesis($idequipo); //mis PARES ciegos
                $x = 0;
                ?>
                <?php $status = ctrTesisLink::getstatus($idequipo); ?>

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Asignar fecha y jurados</strong>
                                </div>

                                <div class="card-body">
                                    <a href="asignacionfecha.php" class="btn btn-outline-info">Regresar a listado</a>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">

                                            <strong class="card-title ">Tesis de  <?php
                                                foreach ($nombreequipo as $nombreequip) {
                                                    echo $nombreequip->getNombres();
                                                }
                                                ?></strong>  

                                            <?php if ($status[0] == 7) { ?>
                                                <div class="alert alert-primary float-right mb-0" role="alert">Asignación pendiente</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 8) { ?>
                                                <div class="alert alert-success float-right mb-0" role="alert"> Asignación realizada</div>
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
                                        <div class="card-header">
                                            <strong>Asignación de jurados y fecha</strong>
                                        </div>

                                        <div class="card-body">


                                            <form  role="form" id="frmTesisfecha" class="form-horizontal "> 
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label  class=" form-control-label">Fecha de sustentación:</label></div>
                                                    <div class="col-12 col-md-3"><input type="datetime-local" name="fechasustentacion" id="fechasustentacion" class="form-control" <?php if ($tesi->getFechasustentacion()) { ?> value="<?= $tesi->getFechasustentacion() ?>" <?php } ?> required="true"></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-sm-12"><label class="control-label col-xs-12">Lista de usuario con especialidades relacionado al tema: </label></div>
                                                    <div class="col col-sm-12">

                                                        <select  class="standardSelect" id="_idusuario[]" name="idusuario[]" tabindex="1" data-placeholder="seleccione los pares ciego" multiple class="standardSelect" required="true">
                                                            <option value="" label="default"></option>

                                                            <?php
                                                            $misparesciegos2 = ctrUsuario::getlistajuradopruebatesis($idequipo);
                                                            $misparesciego = ctrUsuario::getlistajuradotesis($idequipo); // me trae los pares ciegos que ya estan asignados hacia mi
                                                            $usuarios = ctrUsuario::getparciego2($idequipo); // me trae los pares ciego que son relacionado a mi tema
                                                            $selecionado = array();

                                                            $array1 = array();
                                                            $array2 = array();
                                                            $v = 0;
                                                            foreach ($misparesciego as $misparescie) {
                                                                array_push($array1, $misparesciego[$v]['idUsuario']);
                                                                $v = $v + 1;
                                                            }

                                                            foreach ($usuarios as $usuario) {
                                                                array_push($array2, $usuario->getIdUsuario());
                                                            }
                                                            ?>



                                                            <?php
                                                            // reviso si no tengo asignado nada
                                                            if ($misparesciego) {
                                                                ?>
                                                                <?php foreach ($usuarios as $usuario) { ?>
                                                                    <option value="<?= $usuario->getIdUsuario() ?>" <?php if (in_array($usuario->getIdUsuario(), $array1)) { ?> selected=""
                                                                        <?php
                                                                        array_push($selecionado, $usuario->getIdUsuario());
                                                                    }
                                                                    ?> >
                                                                                <?= $usuario->getApellido() . " " . $usuario->getNombre() ?>
                                                                    </option>
                                                                <?php } ?>

                                                            <?php } ?>


                                                            <?php if (!$misparesciego) { ?>
                                                                <?php
                                                                $usuarios = ctrUsuario::getparciego2($idequipo);
                                                                foreach ($usuarios as $usuario) {
                                                                    ?>
                                                                    <option value="<?= $usuario->getIdUsuario() ?>">
                                                                        <?= $usuario->getApellido() . " " . $usuario->getNombre() ?>
                                                                    </option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <?php
                                                    //magia
                                                    $y = 0;

                                                    $yaselecionado = array();
                                                    foreach ($misparesciegos2 as $misparesciego2) {
                                                        if ($selecionado[$y] != $misparesciego2->getIdUsuario()) {
                                                            //   echo $misparesciego2->getIdUsuario();
                                                            array_push($yaselecionado, $misparesciego2->getIdUsuario());
                                                        }
                                                        $y = $y + 1;
                                                    }

                                                    foreach ($selecionado as $selected) {
                                                        if (in_array($selected, $yaselecionado)) {
                                                            $yaselecionado = array_diff($yaselecionado, array($selected));
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if (count($usuarios) < 3) {
                                                        ?>
                                                        <div class="col col-sm-12"><label class="control-label col-xs-12">Lista de usuario con especialidades sin relacion al tema: </label></div>
                                                        <div class="col col-sm-12">
                                                            <select  class="standardSelect" id="_idusuario[]" name="idusuario[]" tabindex="1" data-placeholder="seleccione los pares ciego" multiple class="standardSelect" required="true" >
                                                                <option value="" label="default"></option>

                                                                <?php
                                                                $y = 0;
                                                                $usuariosall = ctrUsuario::getUsuariosjurados();

                                                                foreach ($usuariosall as $usuario) {
                                                                    ?>
                                                                    <option value="<?= $usuario->getIdUsuario() ?>" <?php if (in_array($usuario->getIdUsuario(), $yaselecionado)) { ?> selected=""
                                                                        <?php
                                                                    }
                                                                    ?> >
                                                                            <?= $usuario->getApellido() . " " . $usuario->getNombre() ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>                                                       
                                                            </select>                                                         
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <?php if ($status[0] == 7) { ?>
                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar"> Asignar</button> 
                                                    <input type="hidden" name="action" id="_action" value="tf">
                                                    <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                   
                                                    <input type="hidden" name="opc" id="_opc" value="TF"/>
                                                <?php } ?>
                                                <?php if ($status[0] == 8) { ?>
                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar"> Actualizar </button> 
                                                    <input type="hidden" name="action" id="_action" value="af">
                                                    <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                   
                                                    <input type="hidden" name="opc" id="_opc" value="AF"/>
                                                <?php } ?>
                                            </form>



                                            <?php if ($status[0] != 7) { ?>
                                                <form  role="form" id="frmTesis" class="float-left mr-3">  
                                                    <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> cancelar</button> 
                                                    <input type="hidden" name="action" id="_action" value="cf">
                                                    <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                                    <input type="hidden" name="opc" id="_opc" value="CF"/>
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
                $('#frmTesisfecha').on({
                    submit: function () {
                        $.ajax({
                            url: "equiposubirtesisopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            beforeSend: function () {
                                swal({
                                    title: "Enviando correos.. ",
                                    text: "Por favor espere",
                                    icon: "../../static/img/loader.gif",
                                    button: false,
                                    closeOnClickOutside: false,
                                    closeOnEsc: false
                                });
                            },
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Asignado!", icon: "success", button: true, })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.reload();
                                                }
                                            })
                                    return;
                                }
                                if (data.ok == false) {
                                    swal({title: "Actualizado!", icon: "success", button: true, })
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

                // no aprobar formatos
                $('#frmTesisnoaprobar').on({
                    submit: function () {
                        $.ajax({
                            url: "equiposubirtesisopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "No Asignado!", icon: "success", button: true, })
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
                                swal({title: "Error al no aprobar!", icon: "warning", dangerMode: true, })

                            }
                        });
                        return false;
                    }
                });

                // cancelar
                $('#frmTesis').on({
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
