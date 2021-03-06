<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Perfil</title>

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
                                    <strong>Perfil Usuario</strong>
                                </div>
                                <?php
                                $idperfil = $Sesion->getIdUsuario();
                                $perfiluser = ctrUsuario::perfil($idperfil);
                                ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body">
                                            <div id="traffic-chart" class="traffic-chart">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Tipo de usuario: <?= $perfiluser->idTipoUsuario; ?></strong>
                                                    </div>
                                                    <div class="card-body card-block">

                                                        <form role="form" id="frmUsuario" class="form-horizontal" >
                                                            <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $Sesion->getIdUsuario() ?>"/>
                                                            <input type="hidden" name="estado" id="_estado" value="1"/>
                                                            <input type="hidden" id="_idTipoUsuario" name="idTipoUsuario" value="<?= $Sesion->getIdTipoUsuario() ?>"/>

                                                            <div class="row form-group">
                                                                <div class="col col-sm-6"><input type="text" id="_nombre" name="nombre" placeholder="Nombres" value="<?= $perfiluser->nombre ?>" class="form-control"></div>
                                                                <div class="col col-sm-6"><input type="text" id="_apellido" name="apellido" placeholder="Apellidos" value="<?= $perfiluser->apellido ?>" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-sm-6"><input type="text" id="_cedula" name="cedula" placeholder="Cedula" value="<?= $perfiluser->cedula ?>" class="form-control"></div>
                                                                <div class="col col-sm-6"><input type="email" id="_correo" name="correo" placeholder="Correo" value="<?= $perfiluser->correo ?>" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-sm-6"><input type="text" id="_telefono" name="telefono" placeholder="Tel??fono" value="<?= $perfiluser->telefono ?>" class="form-control"></div>
                                                                <div class="col col-sm-6"><input type="text" id="_direccion" name="direccion" placeholder="Direcci??n" value="<?= $perfiluser->direccion ?>" class="form-control"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-sm-6"><input type="text" id="_usuario" name="usuario" placeholder="Usuario" value="<?= $perfiluser->usuario ?>" class="form-control"></div>
                                                                <div class="col col-sm-6"><input type="password" id="_contrasena" name="contrasena" placeholder="Contrase??a" value="<?= $perfiluser->contrasena ?>" class="form-control"></div>
                                                            </div>

                                                            <div >
                                                                <button type="submit" class="btn btn-outline-info" name="Grabar" id="btngrabar"> Agregar Cambios</button> 
                                                                <input type="hidden" name="opc" id="_opc" value="M"/>
                                                                <input type="hidden" name="action" id="_action" value="add">
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                $('#frmUsuario').on({
                    submit: function () {
                        $.ajax({
                            url: "usuarioopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Perfil actualizado!", icon: "success", button: true, })
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
