<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 4) {
    header('Location: principal.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tipo Usuario</title>
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
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#mediumModal">
                                        Crear nuevo tipo de usuario
                                    </button>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body">
                                            <div id="traffic-chart" class="traffic-chart">

                                                <div class="content">
                                                    <div class="animated fadeIn">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <strong class="card-title">Lista de Usuarios</strong>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <table id="tdatos" class="table table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>

                                                                                    <th>Código</th>
                                                                                    <th>Tipo Usuario</th>
                                                                                    <th>Editar</th>
                                                                                    <th>Eliminar</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="tdetalle">
                                                                                <?php
                                                                                $tipos = ctrTipoUsuario::getTipoUsuarios();

                                                                                foreach ($tipos as $tipo) {
                                                                                    $id = $tipo->getIdTipoUsuario();
                                                                                    ?>
                                                                                    <tr>

                                                                                        <td align="center"><?= $tipo->getIdTipoUsuario() ?></td>
                                                                                        <td align="center"><?= $tipo->getDescripcion() ?></td>


                                                                                        <td align="center">


                                                                                            <div class="btn-group">
                                                                                                <form action="edittipouser.php" role="form" " method="POST">
                                                                                                    <input type="hidden" name="idusuario" id="idusuario" value="<?= $tipo->getIdTipoUsuario() ?>"/>
                                                                                                    <button type="submit" class="btn btn-outline-info"> Editar </button> 
                                                                                                </form>                         

                                                                                            </div>
                                                                                        </td>
                                                                                        <td align="center">     
                                                                                            <a href="#" class="btn btn-outline-danger" rel="elim"  data-id="action=elim&id=<?= $id ?>">
                                                                                                Eliminar
                                                                                            </a>
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
                                                    </div><!-- .animated -->
                                                </div><!-- .content -->

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Creación de Usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form role="form" id="frmUsuario" class="form-horizontal" >
                                                <div class="modal-body">
                                                    <div class="card-body card-block">
                                                        <input type="hidden" name="idTipoUsuario" id="idTipoUsuario" value="0"/>


                                                        <div class="row form-group">
                                                            <div class="col col-sm-6"><input type="text" id="descripcion" name="descripcion" placeholder="Descripción"  class="form-control"></div>
                                                            <div class="col col-sm-6">
                                                                <select class="form-control" id="_estado" name="estado" >
                                                                    <option value="1">Activo</option>
                                                                    <option value="0">Inactivo</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Agregar</button>
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

        <script type="text/javascript">
            $(document).ready(function () {
                $('#tdatos').DataTable();
            });
        </script>

        <script>
            $(function () {
                $('#frmUsuario').on({
                    submit: function () {
                        $.ajax({
                            url: "tipousuarioopc.php",
                            data: $(this).serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (data, textStatus, jqXHR) {
                                if (data.ok == true) {
                                    swal({title: "Creado!", icon: "success", button: true, })
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



                // eliminar
                $('#tdatos #tdetalle').on('click', 'a[rel="elim"]', function () {
                    var data = $(this).data('id');
                    swal({
                        title: "Esta seguro de eliminar a este usuario",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        url: "tipousuarioopc.php",
                                        data: data,
                                        type: 'POST',
                                        dataType: 'json',
                                        success: function (data, textStatus, jqXHR) {
                                            if (data.ok == true) {
                                                swal({title: "Eliminado con éxito!", icon: "success", button: true, })
                                                        .then((willDelete) => {
                                                            if (willDelete) {
                                                                location.reload();
                                                            }
                                                        })
                                            } else {
                                                swal({title: "Error al eliminar!", icon: "warning", dangerMode: true, })
                                            }
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            alert(errorThrown);
                                        }
                                    });
                                }
                            });

                });


            });
        </script>

    </body>
</html>
