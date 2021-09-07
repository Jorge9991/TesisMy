<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 5 and $Sesion->getIdTipoUsuario() != 2) {
    header('Location: principal.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solicitudes</title>
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
            $idusuario = $Sesion->getIdUsuario();

            $equipo = ctrEquipo::getYatieneequipo($idusuario);
            $solicitudenviada = ctrEquipo::getSolicitudenviada($idequipo);
            $solicitudenviadatutor = ctrEquipoTutor::getSolicitudenviada($idequipo);

            $solicitudes1 = ctrEquipoTutor::getsolicitudes($idusuario);
            $solicitudes2 = ctrEquipoTutor::getsolicitudes2($idusuario);
            $solicitudes = array_merge($solicitudes1, $solicitudes2);

            $tutor = ctrEquipoTutor::getYatieneequipo($idequipo);
            ?>


            <div class="content">
                <div class="animated fadeIn">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong class="card-title ">Solicitudes de equipos (sera tutor/tutora del equipo que acepte)</strong>  
                                                    </div>
                                                    <div class="card-body">
                                                        <table id="tdatos" class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Equipo</th>
                                                                    <th>Aceptar</th>
                                                                    <th>Rechazar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tdetalle">
                                                                <?php
                                                                foreach ($solicitudes as $solicitud) {

                                                                    $id = $solicitud->getIdEquipoTutor();
                                                                    ?>
                                                                    <tr>

                                                                        <td align="center"><?= $solicitud->getNombre() ?></td>
                                                                        <td align="center">
                                                                            <form  role="form" id="frmaceptar">  
                                                                                <button type="submit" class="btn btn-outline-info" > aceptar </button> 
                                                                                <input type="hidden" name="action" id="_action" value="ace">
                                                                                <input type="hidden" name="idusuario" id="_idusuario" value="<?= $idusuario ?>"/>
                                                                                <input type="hidden" name="idequipo" id="_idequipo" value="<?= $solicitud->getIdEquipo() ?>"/>                                   
                                                                                <input type="hidden" name="opc" id="_opc" value="A"/>
                                                                            </form>
                                                                        </td>
                                                                        <td align="center">
                                                                        
                                                                            <form  role="form" id="frmcancelarsolicitudtutor" >  
                                                                                <button type="submit" class="btn btn-outline-danger" > Eliminar</button> 
                                                                                <input type="hidden" name="action" id="_action" value="can">
                                                                                <input type="hidden" name="idequipo" id="idequipo" value="<?= $solicitud->getIdEquipo() ?>"/>                                  
                                                                                <input type="hidden" name="opc" id="_opc" value="C"/>
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
            $(function () {

                //ACEPTAR
                $('#frmaceptar').on({
                    submit: function () {
                        $.ajax({
                            url: "equipotutoropc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Solicitud aceptada!", icon: "success", button: true, })
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
                                swal({title: "Ya supero el limite de grupos!", icon: "warning", dangerMode: true, })
                            }
                        });
                        return false;
                    }
                });
                //ELIMINAR
                
                $('#frmcancelarsolicitudtutor').on({
                submit: function () {
                    $.ajax({
                        url: "equipotutoropc.php",
                        data: $(this).serialize(),
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (data.ok == true) {
                                swal({title: "Solicitud eliminada!", icon: "success", button: true, })
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
            
                $('#frmdelete').on({
                    submit: function () {
                        $.ajax({
                            url: "equipotutoropc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Solicitud eliminada!", icon: "success", button: true, })
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
                                swal({title: "Error al eliminar!", icon: "warning", dangerMode: true, })
                            }
                        });
                        return false;
                    }
                });

            });

        </script>

    </body>
</html>

