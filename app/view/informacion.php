<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 3 and $Sesion->getIdTipoUsuario() != 5 and $Sesion->getIdTipoUsuario() != 2) {
    header('Location: principal.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Requisitos</title>

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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Cronograma de titulación opción tesis</strong>  
                                        </div>
                                        <div class="card-body">
                                            <div class="card-body card-block">

                                                <?php
                                                $cronogramas = ctrCronograma::getCronogramas();
                                                ?>

                                                <div class="row form-group">
                                                    <div class="col col-md-5"><strong><label  class=" form-control-label"><?= $cronogramas[0]['descripcion'] ?></label></strong></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechainicio1" id="fechainicio1" class="form-control"<?php if ($cronogramas[0]['fechainicio']) { ?> value="<?= $cronogramas[0]['fechainicio'] ?>" <?php } ?>></div>
                                                    <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechafinal1" id="fechafinal1" class="form-control"<?php if ($cronogramas[0]['fechafinal']) { ?> value="<?= $cronogramas[0]['fechafinal'] ?>" <?php } ?> ></div>      

                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Hoja de vida (Formato Actual - Socio Empleo)</label></div>
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Copia a color de cédula y certificado de votación (actualizado)</label></div>
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Récord Académico (original firmado por el secretario General)</label></div>
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Certificado de Prácticas Pre Profesionales (original)</label></div>
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Certificado de Vinculación (original)</label></div>
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Certificado de no adeudar al IST JBA</label></div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-5"><strong><label  class=" form-control-label"><?= $cronogramas[1]['descripcion'] ?></label></strong></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechainicio2" id="fechainicio2" class="form-control"<?php if ($cronogramas[1]['fechainicio']) { ?> value="<?= $cronogramas[1]['fechainicio'] ?>" <?php } ?>></div>
                                                    <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechafinal2" id="fechafinal2" class="form-control"<?php if ($cronogramas[1]['fechafinal']) { ?> value="<?= $cronogramas[1]['fechafinal'] ?>" <?php } ?>></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Acta de compromiso seleccionando opción de titulación (Formato 001)</label></div>
                                                    <div class="col col-md-12"><label  class=" form-control-label">* OPCIÓN PROYECTO: Acta de compromiso del tutor (Formato 002)</label></div>
                                                    <div class="col col-md-12"><label  class=" form-control-label">* OPCIÓN PROYECTO: Solicitud de tutor y aprobación del tema (Formato 003)</label></div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-5"><strong><label  class=" form-control-label"><?= $cronogramas[2]['descripcion'] ?></label></strong></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechainicio3" id="fechainicio3" class="form-control"<?php if ($cronogramas[2]['fechainicio']) { ?> value="<?= $cronogramas[2]['fechainicio'] ?>" <?php } ?>></div>
                                                    <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechafinal3" id="fechafinal3" class="form-control"<?php if ($cronogramas[2]['fechafinal']) { ?> value="<?= $cronogramas[2]['fechafinal'] ?>" <?php } ?>></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Recepción de Anteproyectos, firmados por los estudiantes y tutores (Formato anteproyecto)</label></div>
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Sustentación de Anteproyectos</label></div>

                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-5"><strong><label  class=" form-control-label"><?= $cronogramas[3]['descripcion'] ?></label></strong></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechainicio4" id="fechainicio4" class="form-control"<?php if ($cronogramas[3]['fechainicio']) { ?> value="<?= $cronogramas[3]['fechainicio'] ?>" <?php } ?>></div>
                                                    <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechafinal4" id="fechafinal4" class="form-control"<?php if ($cronogramas[3]['fechafinal']) { ?> value="<?= $cronogramas[3]['fechafinal'] ?>" <?php } ?>></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Desarrollo del proyecto de investigación</label></div>

                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-5"><strong><label  class=" form-control-label"><?= $cronogramas[4]['descripcion'] ?></label></strong></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechainicio5" id="fechainicio5" class="form-control"<?php if ($cronogramas[4]['fechainicio']) { ?> value="<?= $cronogramas[4]['fechainicio'] ?>" <?php } ?>></div>
                                                    <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechafinal5" id="fechafinal5" class="form-control"<?php if ($cronogramas[4]['fechafinal']) { ?> value="<?= $cronogramas[4]['fechafinal'] ?>" <?php } ?>></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Revisores pares ciegos y fiscal de plagio</label></div>

                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-5"><strong><label  class=" form-control-label"><?= $cronogramas[5]['descripcion'] ?></label></strong></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechainicio6" id="fechainicio6" class="form-control"<?php if ($cronogramas[5]['fechainicio']) { ?> value="<?= $cronogramas[5]['fechainicio'] ?>" <?php } ?>></div>
                                                    <div class="col col-md-1"><label  class=" form-control-label">hasta</label></div>
                                                    <div class="col-12 col-md-3"><input disabled="" type="date" name="fechafinal6" id="fechafinal6" class="form-control"<?php if ($cronogramas[5]['fechafinal']) { ?> value="<?= $cronogramas[5]['fechafinal'] ?>" <?php } ?>></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-12"><label  class=" form-control-label">* Sustentación de proyectos</label></div>

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


    </body>
</html>

