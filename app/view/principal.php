<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Principal</title>

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
    <body >
        <!-- menu izquierdo -->
        <?php include "navbar.php" ?>
        <div id="right-panel" class="right-panel">
            <!-- cabezera -->
            <?php include "principaltop.php" ?>
            <?php
            $idusuario = $Sesion->getIdUsuario();
            $habilidades = ctrUsuario::getHabilidad($idusuario);
            //si el docente no tiene habilidades agregadas, debera agregar
            if ($habilidades == 0 && $Sesion->getIdTipoUsuario() == 2) {
                ?>
                <div class="alert alert-danger" role="alert">
                    Para continuar debe agregar una o mas habilidades a su perfil!
                </div>
                <div class="content">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12" >
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">
                                            Crear una nueva habilidad
                                        </button>

                                    </div>

                                    <div class="row" >
                                        <div class="col-lg-10">
                                            <div class="card-body" >
                                                <div id="traffic-chart" class="traffic-chart" >

                                                    <form class="form-inline" role="form" id="frmHabilidades">
                                                        <input type="hidden" name="idUsuarioHabilidad" id="_idUsuarioHabilidad" value="0"/>
                                                        <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $Sesion->getIdUsuario() ?>"/>
                                                        <input type="hidden" name="estado" id="_estado" value="1"/>
                                                        <div class="col-xs-9 col-sm-10">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <strong class="card-title">Habilidades</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                    <select  class="standardSelect" id="_idHabilidad" name="idHabilidad[]" tabindex="1" data-placeholder="seleccione las especialidades de acorde a su perfil..." multiple class="standardSelect" required="true" >
                                                                        <option value="" label="default"></option>
                                                                        <?php
                                                                        $listahabilidades = ctrHabilidad::getHabilidades();

                                                                        foreach ($listahabilidades as $listahabilidad) {
                                                                            ?>

                                                                            <option value="<?= $listahabilidad->getIdHabilidad() ?>">

                                                                                <?= $listahabilidad->getDescripcion() ?>
                                                                            </option>

                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>


                                                                </div>

                                                            </div>

                                                        </div>

                                                        <button type="submit" class="btn btn-primary my-1" name="Grabar" id="btngrabar"> Añadir</button> 
                                                        <input type="hidden" name="opc" id="_opc" value="I"/>
                                                        <input type="hidden" name="action" id="_action" value="add">

                                                    </form>

                                                </div>
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
                                                    <h6>Crear nueva habilidad</h6>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal " role="form" id="frmHabilidad">
                                                        <input type="hidden" name="idHabilidad" id="_idHabilidad" value="0"/>                      


                                                        <div class="form-group" id="dialog">
                                                            <label class="control-label col-xs-2">Descripcion:</label>
                                                            <div class="col-xs-4">
                                                                <input type="text" class="form-control" id="_descripcion" name="descripcion" placeholder="" maxlength="50" required="true" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,100}" >
                                                            </div>
                                                            <input type="hidden" id="_estado" name="estado"value="1"/>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-group center-block">
                                                                <button type="submit" class="btn  btn-lg active" name="Grabar" id="btngrabar" ><span class="glyphicon glyphicon-bell"></span> Grabar</button> 
                                                                <button type="button" id="btnSalir" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button> 
                                                            </div>


                                                            <input type="hidden" name="opc" id="_opc" value="I"/>
                                                            <input type="hidden" name="action" id="_action" value="add">
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
            <?php } ?>
            <?php if ($Sesion->getIdTipoUsuario() == 2 && $habilidades > 0) { ?>
                <div class="content">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class="img">
                                                <img src="../../static/img/led.png" width="1200" height="500">
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($Sesion->getIdTipoUsuario() == 3) { ?>

                <div class="content">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class="img">
                                                <img src="../../static/img/led.png" width="1200" height="500">
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($Sesion->getIdTipoUsuario() == 1) { ?>
                <div class="content">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class="img">
                                                <img src="../../static/img/led.png" width="1200" height="500">
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
<!--            admin-->
            <?php if ($Sesion->getIdTipoUsuario() == 4) { ?>
                <div class="content">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class="img">
                                                <img src="../../static/img/led.png" width="1200" height="500">
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
<!--tutor-->
 <?php if ($Sesion->getIdTipoUsuario() == 5) { ?>
                <div class="content">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class="img">
                                                <img src="../../static/img/led.png" width="1200" height="500">
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <script src="../../static/lib/jquery-2.2.4.min.js" type="text/javascript"></script>
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
                $('#frmHabilidad').on({
                    submit: function () {
                        $.ajax({
                            url: "opchabilidades.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Especialidad creada con éxito!", icon: "success", button: true, })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = "especialidad.php";
                                                }
                                            })
                                    return;
                                }
                                alert(data.error);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                swal({title: "Error al guardar!", icon: "warning", dangerMode: true, })

                            }
                        });
                        return false;
                    }
                });

                $(function () {
                    $('#frmHabilidades').on({
                        submit: function () {
                            $.ajax({
                                url: "usuariohabilidadopc.php",
                                data: $(this).serialize(),
                                type: 'POST',
                                dataType: 'json',
                                success: function (data, textStatus, jqXHR) {
                                    if (data.ok == true) {
                                        swal({title: "Especialidad añadida a su perfil!", icon: "success", button: true, })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                        location.href = "especialidad.php";
                                                    }
                                                })

                                        return;
                                    }
                                    alert(data.error);
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    swal({title: "Error al guardar!", icon: "warning", dangerMode: true, })
                                }
                            });
                            return false;
                        }
                    });

                });

            });
        </script>

    </body>
</html>
