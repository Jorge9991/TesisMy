<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4) {
    header('Location: principal.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Revision de requisitos</title>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title ">Lista de estudiantes con requisitos</strong>  
                                </div>
                                <div class="card-body">
                                    <table id="tdatos" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Cedula</th>
                                                <th>Apellido</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Status</th>
                                                <th>Revisar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tdetalle">
                                            <?php
                                            $usuariorequisitos = ctrUsuarioRequisito::getUsuariorequisitos();
                                            foreach ($usuariorequisitos as $usuariorequisito) {

                                                $id = $usuariorequisito->getIdUsuario();
                                                ?>
                                                <tr>

                                                    <td align="center"> <?= $usuariorequisito->getCedula() ?> </td>
                                                    <td align="center"> <?= $usuariorequisito->getApellido() ?> </td>
                                                    <td align="center"> <?= $usuariorequisito->getNombre() ?> </td>
                                                    <td align="center"> <?= $usuariorequisito->getCorreo() ?> </td>

                                                    <?php if ($usuariorequisito->getStatus() == 2) { ?>
                                                        <td align="center"><span class="badge badge-pill badge-primary">Por revisar</span></td>
                                                    <?php } ?>
                                                    <?php if ($usuariorequisito->getStatus() == 3) { ?>
                                                        <td align="center"><span class="badge badge-pill badge-success"> Aprobado</span> </td>
                                                    <?php } ?>
                                                    <?php if ($usuariorequisito->getStatus() == 4) { ?>
                                                        <td align="center"><span class="badge badge-pill badge-danger"> No aprobado</span>  </td>
                                                    <?php } ?>

                                                    <td align="center">
                                                        <form action="requisitousuario.php" role="form" " method="POST"  >
                                                            <input type="hidden" name="idusuariorequisito" id="idusuariorequisito" value="<?= $usuariorequisito->getIdUsuario() ?>"/>
                                                            <button type="submit" class="btn btn-outline-info"> Revisar </button> 
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
            jQuery(document).ready(function () {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });

        </script>


    </body>
</html>


<!---->
