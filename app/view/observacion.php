<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 5 and $Sesion->getIdTipoUsuario() != 1 and $Sesion->getIdTipoUsuario() != 4 and $Sesion->getIdTipoUsuario() != 2) {
    header('Location: principal.php');
}
$idequipoproceso = $_POST["idequipo"];
$opcion = $_POST["opcion"];
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
            $idequipo = $idequipoproceso;
            ?>
            <?php
            if ($opcion == 1) {
                $status = ctrFormato::getstatus($idequipo);
                $equipodeunoodedos = ctrEquipo::getequipodeuno($idequipo);
                $formatos = ctrFormato::getFormatos($idequipo);
                $nombreequipo = ctrEquipo::getnombregrupo($idequipo);
                ?>
                <?php
                $integrantescont = $equipodeunoodedos[0]['equipo1o2'];
                if ($integrantescont == 1) {
                    ?>
                    <div class="content">

                        <?php if (count($formatos) != 2) { ?>

                            <?php if ($requisitosfechaposigativo == 0 and count($formatos) != 2) { ?>  
                                <div class="alert alert-danger" role="alert">
                                    La fecha límite para la recepcion a caducado!, consulte al gestor académico.
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php formatosfecha(); ?>    
                                </div>

                            <?php } ?>
                        <?php } ?> 
                        <?php if (count($formatos) == 2 and $status[0] == 2) { ?>
                            <div class="alert alert-warning" role="alert" >
                                Los formatos estan en estado de revision
                            </div>
                        <?php } ?> 
                        <?php if (count($formatos) == 2 and $status[0] == 3) { ?>
                            <div class="alert alert-success" role="alert" >
                                Dirigase a formatos para descargar estructura del anteproyecto y continuar con el proceso
                            </div>
                        <?php } ?> 
                        <div class="animated fadeIn">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Enviar Acta de compromiso y Solicitud de tutor</strong>
                                        </div>
                                        <div class="card-header">
                                            <strong class="card-title ">Grupo de  <?php
                                            foreach ($nombreequipo as $nombreequip) {
                                                echo $nombreequip->getNombres();
                                            }
                                            ?></strong> 
                                        </div>
                                        
                                        <div class="card-body">
                                            <form action="procesos.php" role="form" " method="POST">
                                                <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipo ?>"/>
                                                <button type="submit" class="btn btn-outline-info float-left"> Regresar </button> 
                                            </form>
                                            <?php
                                            if ($status[0] == 4) {
                                                $observacion = ctrFormato::getobservacion($idequipo);
                                                ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <span class="badge badge-pill badge-warning">Observaciones</span>
                                                    <?php echo $observacion[0] ?>
                                                </div>
                                            <?php } ?>
                                            <?php if (count($formatos) != 2) { ?>
                                                <button type="button" class="btn btn-outline-info " disabled="" data-toggle="modal" data-target="#documento">
                                                    Subir Actas de compromiso
                                                </button>
                                                <button type="button" class="btn btn-outline-info " disabled="" data-toggle="modal" data-target="#documento2">
                                                    Subir Solicitud de tutor
                                                </button>
                                            <?php } ?>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong class="card-title ">Formatos (2 archivos) </strong>  

                                                    <?php if ($status[0] == 1) { ?>
                                                        <div class="alert alert-primary float-right mb-0" role="alert">Formatos sin enviar</div>
                                                    <?php } ?>
                                                    <?php if ($status[0] == 2) { ?>
                                                        <div class="alert alert-warning float-right mb-0" role="alert"> Formatos entregados</div>
                                                    <?php } ?>
                                                    <?php if ($status[0] == 3) { ?>
                                                        <div class="alert alert-success float-right mb-0" role="alert">Formatos aprobado</div>
                                                    <?php } ?>
                                                    <?php if ($status[0] == 4) { ?>
                                                        <div class="alert alert-danger float-right mb-0" role="alert">Formatos rechazados</div>
                                                    <?php } ?>


                                                </div>
                                                <div class="card-body">
                                                    <table id="tdatos" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Ruta</th>
                                                                <th>Extension</th>
                                                                <th>Eliminar archivo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tdetalle">
                                                            <?php
                                                            foreach ($formatos as $formato) {

                                                                $id = $formato->getIdFormatos();
                                                                ?>
                                                                <tr>
                                                                    <td align="center"> <a href="<?= $formato->getRuta() ?>" target="blank"><?= $formato->getNombrearchivo() ?></a> </td>
                                                                    <td align="center"><?= $formato->getExtension() ?></td>
                                                                    <td align="center">
                                                                        <button  class="btn btn-outline-danger" disabled=""> Borrar Archivo</button> 

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
                <?php } ?>
                <?php if ($integrantescont == 2) { ?>
                    <div class="content">

                        <?php if (count($formatos) != 3) { ?>

                            <?php if ($requisitosfechaposigativo == 0 and count($formatos) != 3) { ?>  
                                <div class="alert alert-danger" role="alert">
                                    La fecha límite para la recepcion a caducado!, consulte al gestor académico.
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php formatosfecha(); ?>    
                                </div>
                                <div class="alert alert-danger" role="alert" >
                                    <a class="alert-link"> Los Formatos deberan ser enviado en pdf o word</a> ej. Acta de Compromiso Guerrero Alejadro Jorge Luis.pdf

                                </div>
                            <?php } ?>
                        <?php } ?> 
                        <?php if (count($formatos) == 3 and $status[0] == 2) { ?>
                            <div class="alert alert-warning" role="alert" >
                                Los formatos estan en estado de revision
                            </div>
                        <?php } ?> 
                        <?php if (count($formatos) == 3 and $status[0] == 3) { ?>
                            <div class="alert alert-success" role="alert" >
                                Dirigase a formatos para descargar estructura de anteproyecto y continuar con el proceso
                            </div>
                        <?php } ?> 
                        <div class="animated fadeIn">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Enviar Acta de compromiso y Solicitud de tutor</strong>
                                        </div>
  <div class="card-header">
                                            <strong class="card-title ">Grupo de  <?php
                                            foreach ($nombreequipo as $nombreequip) {
                                                echo $nombreequip->getNombres();
                                            }
                                            ?></strong> 
                                        </div>
                                        <div class="card-body">
                                            <form action="procesos.php" role="form" " method="POST">
                                                <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipo ?>"/>
                                                <button type="submit" class="btn btn-outline-info float-left"> Regresar </button> 
                                            </form>
                                            <?php
                                            if ($status[0] == 4) {
                                                $observacion = ctrRequisitos::getobservacion($idusuario);
                                                ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <span class="badge badge-pill badge-warning">Observaciones</span>
                                                    <?php echo $observacion[0] ?>
                                                </div>
                                            <?php } ?>
                                            <?php if (count($formatos) != 3) { ?>
                                                <button type="button" class="btn btn-outline-info " disabled="" data-toggle="modal" data-target="#documento">
                                                    Subir Actas de compromiso
                                                </button>
                                                <button type="button" class="btn btn-outline-info " disabled="" data-toggle="modal" data-target="#documento2">
                                                    Subir Solicitud de tutor
                                                </button>
                                            <?php } ?>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong class="card-title ">Formatos (3 archivos) </strong>  

                                                    <?php if ($status[0] == 1) { ?>
                                                        <div class="alert alert-primary float-right mb-0" role="alert">Formatos sin enviar</div>
                                                    <?php } ?>
                                                    <?php if ($status[0] == 2) { ?>
                                                        <div class="alert alert-warning float-right mb-0" role="alert"> Formatos entregados</div>
                                                    <?php } ?>
                                                    <?php if ($status[0] == 3) { ?>
                                                        <div class="alert alert-success float-right mb-0" role="alert">Formatos aprobado</div>
                                                    <?php } ?>
                                                    <?php if ($status[0] == 4) { ?>
                                                        <div class="alert alert-danger float-right mb-0" role="alert">Formatos rechazados</div>
                                                    <?php } ?>


                                                </div>
                                                <div class="card-body">
                                                    <table id="tdatos" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Ruta</th>
                                                                <th>Extension</th>
                                                                <th>Eliminar archivo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tdetalle">
                                                            <?php
                                                            foreach ($formatos as $formato) {

                                                                $id = $formato->getIdFormatos();
                                                                ?>
                                                                <tr>
                                                                    <td align="center"> <a href="<?= $formato->getRuta() ?>" target="blank"><?= $formato->getNombrearchivo() ?></a> </td>
                                                                    <td align="center"><?= $formato->getExtension() ?></td>
                                                                    <td align="center">
                                                                        <button  class="btn btn-primary" disabled=""> Borrar Archivo</button> 

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
                <?php } ?>

            </div>

        <?php } ?> 
        <?php
        if ($opcion == 2) {
            $status = ctrFormato::getstatus($idequipo);
            $temas = ctrFormato::getTema($idequipo);
            $habilidades = ctrFormato::getHabilidad($idequipo);
            $nombreequipo = ctrEquipo::getnombregrupo($idequipo);
            $x = 0;
            ?>
            <div class="content">

                <?php
                //integrante 1
                $equipodeunoodedos = ctrEquipo::getequipodeuno($idequipo);
                $integrantescont = $equipodeunoodedos[0]['equipo1o2'];
                $formatos = ctrFormato::getFormatostodos($idequipo);
                if ($integrantescont == 1) {
                    ?>
                    <?php if (count($formatos) == 3 and $status[0] == 1) { ?>

                        <?php if ($formatosfechaposigativo == 0) { ?>  

                            <div class="alert alert-danger" role="alert">
                                La fecha límite para la recepcion a caducado!, consulte al gestor académico.
                            </div>
                        <?php } else { ?>

                            <div class="alert alert-success" role="alert">
                                <?php formatosfecha(); ?>    
                            </div>
                        <?php } ?>
                    <?php } ?> 

                    <?php if (count($formatos) == 3 and $status[0] == 2) { ?>
                        <div class="alert alert-warning" role="alert" >
                            Los formatos estan en estado de revision
                        </div>
                    <?php } ?> 
                    <?php if (count($formatos) == 3 and $status[0] == 3) { ?>
                        <div class="alert alert-success" role="alert" >
                            Dirigase a formatos para descargar estructura del anteproyecto y continuar con el proceso
                        </div>
                    <?php } ?>
                <?php } ?>

                <?php
                //integrantes de dos personas

                if ($integrantescont == 2) {
                    ?>
                    <?php if (count($formatos) == 4 and $status[0] == 1) { ?>

                        <?php if ($formatosfechaposigativo == 0) { ?>  
                            <div class="alert alert-danger" role="alert">
                                La fecha límite para la recepcion a caducado!, consulte al gestor académico.
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-success" role="alert">
                                <?php formatosfecha(); ?>    
                            </div>
                        <?php } ?>
                    <?php } ?> 

                    <?php if (count($formatos) == 4 and $status[0] == 2) { ?>
                        <div class="alert alert-warning" role="alert" >
                            Los formatos estan en estado de revision.
                        </div>
                    <?php } ?> 
                    <?php if (count($formatos) == 4 and $status[0] == 3) { ?>
                        <div class="alert alert-success" role="alert" >
                            Dirigase a formatos para descargar estructura del anteproyecto y continuar con el proceso.
                        </div>
                    <?php } ?>
                <?php } ?>

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                  <div class="card-header">
                                            <strong class="card-title ">Grupo de  <?php
                                            foreach ($nombreequipo as $nombreequip) {
                                                echo $nombreequip->getNombres();
                                            }
                                            ?></strong> 
                                        </div>
                                <div class="card-header">
                                    <strong>Envio de tema </strong>
                                    <form action="procesos.php" role="form" " method="POST">
                                        <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipo ?>"/>
                                        <button type="submit" class="btn btn-outline-info float-left"> Regresar </button> 
                                    </form>


                                    <?php if ($status[0] == 1) { ?>
                                        <div class="alert alert-primary float-right mb-0" role="alert">Formatos sin enviar</div>
                                    <?php } ?>
                                    <?php if ($status[0] == 2) { ?>
                                        <div class="alert alert-warning float-right mb-0" role="alert"> Formatos entregados</div>
                                    <?php } ?>
                                    <?php if ($status[0] == 3) { ?>
                                        <div class="alert alert-success float-right mb-0" role="alert">Formatos aprobado</div>
                                    <?php } ?>
                                    <?php if ($status[0] == 4) { ?>
                                        <div class="alert alert-danger float-right mb-0" role="alert">Formatos rechazados</div>
                                    <?php } ?>



                                </div>
                                <?php
                                if ($status[0] == 4) {
                                    $observacion = ctrFormato::getobservacion($idequipo);
                                    ?>
                                    <div class="alert alert-warning" role="alert">
                                        <span class="badge badge-pill badge-warning">Observaciones</span>
                                        <?php echo $observacion[0] ?>
                                    </div>
                                <?php } ?>
                                <br>

                                <div class="col-md-12">

                                    <div class="card">

                                        <div class="card-body">


                                            <div class="row form-group">
                                                <div class="col col-sm-12"><label class="control-label col-xs-12">Tema: </label></div>
                                                <div class="col col-sm-12"><input type="text" id="_tema" name="tema" placeholder="tema..." disabled="" class="form-control" required="true"<?php if ($temas) { ?> value="<?= $temas->tema ?>" <?php } ?>></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-sm-12"><label class="control-label col-xs-12">Objetivos: </label></div>
                                                <div class="col col-sm-12"> <textarea id="_objetivos" name="objetivos" rows="3" placeholder="objetivos...." disabled=""  class="form-control" required="true"><?php if ($temas) { ?><?= $temas->objetivos ?><?php } ?></textarea></div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-sm-12"><label class="control-label col-xs-12">Especialidades: </label></div>
                                                <div class="col col-sm-12">

                                                    <select  class="standardSelect" id="_idHabilidad" disabled=""  name="idHabilidad[]" tabindex="1" data-placeholder="seleccione las especialidades de acorde a su tema..." multiple class="standardSelect" required="true" >
                                                        <option value="" label="default"></option>
                                                        <?php if ($habilidades) { ?>
                                                            <?php
                                                            $listahabilidades = ctrHabilidad::getHabilidades();
                                                            foreach ($habilidades as $habilidad) {
                                                                foreach ($listahabilidades as $listahabilidad) {
                                                                    ?>

                                                                    <option value="<?= $listahabilidad->getIdHabilidad() ?>" <?php if ($listahabilidad->getIdHabilidad() == $habilidades[$x]['id_habilidades']) { ?> selected=""<?php $x = $x + 1; ?> <?php } ?> >

                                                                        <?= $listahabilidad->getDescripcion() ?>
                                                                    </option>

                                                                    <?php
                                                                }
                                                                break;
                                                            }
                                                            ?>
                                                        <?php } ?>


                                                        <?php if (!$habilidades) { ?>
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
                                                        <?php } ?>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-sm-12"><label class="control-label col-xs-12">Archivo: </label></div>
                                                <div class="col col-sm-6"><input type="file" id="archivos" name="archivos" disabled=""  class="form-control-file"<?php if (!$temas) { ?> required="true"<?php } ?>></div>
                                                <div class="col col-sm-6"><a href="<?= $temas->ruta ?>" target="blank"><?php echo $temas->nombrearchivo ?></a></div>
                                            </div>



                                            <div >


                                                <?php if ($temas) { ?> 
                                                    <?php if ($status[0] != 3) { ?>
                                                        <button  class="btn btn-outline-info float-left mr-3" disabled=""  >Actualizar </button>

                                                    <?php } ?>
                                                    <?php if ($status[0] == 3) { ?>
                                                        <button type="submit" class="btn btn-outline-info float-left mr-3" disabled="">Actualizar </button>

                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-outline-info float-left mr-3"disabled=""  > Subir tema</button>

                                                <?php } ?>



                                            </div>
                                            <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/> 




                                            <?php if ($temas and $status[0] == 1) { ?>
                                                <?php
                                                $equipodeunoodedos = ctrEquipo::getequipodeuno($idequipo);
                                                $integrantescont = $equipodeunoodedos[0]['equipo1o2'];
                                                if ($integrantescont == 1) {
                                                    ?>
                                                    <?php
                                                    $formatos = ctrFormato::getFormatostodos($idequipo);

                                                    if (count($formatos) == 3) {
                                                        ?>
                                                        <?php if ($formatosfechaposigativo == 0) { ?>  

                                                            <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled=""> Enviar tema</button> 

                                                        <?php } else { ?>

                                                            <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled="" > Enviar tema</button> 

                                                        <?php } ?>

                                                    <?php } else { ?>
                                                        <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" disabled=""> Enviar tema</button> 

                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if ($integrantescont == 2) { ?>
                                                    <?php
                                                    $formatos = ctrFormato::getFormatostodos($idequipo);

                                                    if (count($formatos) == 4) {
                                                        ?>

                                                        <?php if ($formatosfechaposigativo == 0) { ?>  

                                                            <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled="">  Enviar tema</button> 

                                                        <?php } else { ?>

                                                            <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled="" >  Enviar tema</button> 

                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" disabled="">  Enviar tema</button> 

                                                    <?php } ?>
                                                <?php } ?>




                                            <?php } ?>
                                            <?php if ($temas and $status[0] == 4) { ?>
                                                <?php if ($formatosfechaposigativo == 0) { ?>  


                                                    <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar" disabled=""> Volver a enviar formatos corregidos</button> 

                                                <?php } else { ?>

                                                    <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar" disabled="" > Volver a enviar formatos corregidos</button> 

                                                <?php } ?>


                                            <?php } ?>
                                            <?php if ($temas and $status[0] == 2) { ?>
                                                <?php if ($formatosfechaposigativo == 0) { ?>  

                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled=""> Cancelar envio</button> 

                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled="" > Cancelar envio</button> 

                                                <?php } ?>


                                            <?php } ?>


                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?> 
        <?php
        if ($opcion == 3) {
            $status = ctrAnteproyecto::getstatus($idequipo);
            $anteproyectos = ctrAnteproyecto::getAnteproyectos($idequipo);
            $nombreequipo = ctrEquipo::getnombregrupo($idequipo);
            ?>

            <div class="content">

                <?php if ($status[0] == 1) { ?>
                    <?php if ($anteproyectofechaposigativo == 0) { ?>  
                        <div class="alert alert-danger" role="alert">
                            La fecha límite para la recepcion a caducado, consulte al gestor académico.
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                            <?php anteproyectofecha(); ?>    
                        </div>

                    <?php } ?> 
                <?php } ?>
                <?php if ($status[0] == 2) { ?>
                    <div class="alert alert-warning" role="alert" >
                        Los formatos estan en estado de revision
                    </div>                                                    
                <?php } ?>
                <?php if ($status[0] == 3) { ?>
                    <div class="alert alert-success" role="alert" >
                        Dirigase a formatos para descargar estructura de tesis y continuar con el proceso
                    </div>  

                <?php } ?>



                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Enviar Anteproyecto</strong>
                                </div>
  <div class="card-header">
                                            <strong class="card-title ">Grupo de  <?php
                                            foreach ($nombreequipo as $nombreequip) {
                                                echo $nombreequip->getNombres();
                                            }
                                            ?></strong> 
                                        </div>
                                <div class="card-body">
                                    <form action="procesos.php" role="form" " method="POST">
                                        <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipo ?>"/>
                                        <button type="submit" class="btn btn-outline-info float-left"> Regresar </button> 
                                    </form>
                                    <?php
                                    if ($status[0] == 4) {
                                        $observacion = ctrAnteproyecto::getobservacion($idequipo);
                                        ?>
                                        <div class="alert alert-warning" role="alert">
                                            <span class="badge badge-pill badge-warning">Observaciones</span>
                                            <?php echo $observacion[0] ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (count($anteproyectos) != 1) { ?>
                                        <?php if ($anteproyectofechaposigativo == 0) { ?>  
                                            <button type="button" class="btn btn-outline-info " disabled="">
                                                Subir Anteproyecto
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-outline-info " disabled="">
                                                Subir Anteproyecto
                                            </button>
                                        <?php } ?>

                                    <?php } ?>



                                    <?php if (count($anteproyectos) == 1 and $status[0] == 1) { ?>
                                        <?php if ($anteproyectofechaposigativo == 0) { ?>  
                                            <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled=""> Enviar anteproyecto</button> 
                                        <?php } else { ?>

                                            <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled=""> Enviar anteproyecto</button> 

                                        <?php } ?>

                                    <?php } ?>
                                    <!--  enviar nuevamente el anteproyecto-->
                                    <?php if ($status[0] == 4) { ?>
                                        <?php if ($anteproyectofechaposigativo == 0) { ?>  
                                            <button type="submit" class="btn btn-outline-info" disabled=""> Volver a enviar anteproyecto corregidos</button> 
                                        <?php } else { ?>

                                            <button type="submit" class="btn btn-outline-info" disabled=""> Volver a enviar anteproyecto corregidos</button> 

                                        <?php } ?>
                                    <?php } ?>

                                    <!-- cancelar envio-->
                                    <?php if ($status[0] == 2) { ?>
                                        <?php if ($anteproyectofechaposigativo == 0) { ?>  
                                            <button type="submit" class="btn btn-outline-info float-left mr-3"  disabled=""> Cancelar envio</button> 
                                        <?php } else { ?>

                                            <button type="submit" class="btn btn-outline-info float-left mr-3" disabled=""> Cancelar envio</button> 

                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($status[0] == 3) { ?>
                                        <div class="col-12 col-md-3 float-right "><input type="datetime-local" name="fechasustentacion" id="fechasustentacion" class="form-control" value="<?php
                                            foreach ($anteproyectos as $anteproyecto) {
                                                echo $anteproyecto->getFechasustentacion();
                                            }
                                            ?>" disabled=""></div>
                                        <div class="col col-md-2 float-right "><label  class=" form-control-label">Fecha y hora de sustentación:</label></div>
                                    <?php } ?>       
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title ">Anteproyecto </strong>  

                                            <?php if ($status[0] == 1) { ?>
                                                <div class="alert alert-primary float-right mb-0" role="alert">Formatos sin enviar</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 2) { ?>
                                                <div class="alert alert-warning float-right mb-0" role="alert"> Formatos entregados</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 3) { ?>
                                                <div class="alert alert-success float-right mb-0" role="alert">Formatos aprobado</div>
                                            <?php } ?>
                                            <?php if ($status[0] == 4) { ?>
                                                <div class="alert alert-danger float-right mb-0" role="alert">Formatos rechazados</div>
                                            <?php } ?>


                                        </div>
                                        <div class="card-body">
                                            <table id="tdatos" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Ruta</th>
                                                        <th>Extension</th>
                                                        <th>Archivo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tdetalle">
                                                    <?php
                                                    foreach ($anteproyectos as $anteproyecto) {

                                                        $id = $anteproyecto->getIdAnteproyecto();
                                                        ?>
                                                        <tr>
                                                            <td align="center"> <a href="<?= $anteproyecto->getRuta() ?>" target="blank"><?= $anteproyecto->getNombrearchivo() ?></a> </td>
                                                            <td align="center"><?= $anteproyecto->getExtension() ?></td>
                                                            <td align="center">
                                                                <button  class="btn btn-outline-danger" disabled=""> Borrar Archivo</button> 

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
        <?php } ?> 
        <?php
        if ($opcion == 4) {
            $status = ctrTesisLink::getstatus($idequipo);
            $tesis = ctrTesisLink::getTesis($idequipo);
            $nombreequipo = ctrEquipo::getnombregrupo($idequipo);
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
                                            <strong class="card-title ">Grupo de  <?php
                                            foreach ($nombreequipo as $nombreequip) {
                                                echo $nombreequip->getNombres();
                                            }
                                            ?></strong> 
                                        </div>
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
                                            <form action="procesos.php" role="form" " method="POST">
                                                <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipo ?>"/>
                                                <button type="submit" class="btn btn-outline-info float-left"> Regresar </button> 
                                            </form>
                                            <?php if ($status[0] == 8) { ?>

                                                <div class="col-12 col-md-4 float-right "><input type="datetime-local" name="fechasustentacion" id="fechasustentacion" class="form-control" value="<?php
                                                    foreach ($tesis as $tesi) {
                                                        echo $tesi->getFechasustentacion();
                                                    }
                                                    ?>" disabled=""></div>
                                                <div class="col col-md-3 float-right "><label  class=" form-control-label">Fecha y hora de sustentación:</label></div>

                                            <?php } ?> 
                                        </div>

                                        <br />
                                        <div class="row form-group">
                                            <div class="col col-sm-11"><input type="text" disabled="" id="link" name="link" placeholder="Link"<?php if ($tesis) { ?> value="<?php
                                                    foreach ($tesis as $tesi) {
                                                        echo $tesi->getLink();
                                                    }
                                                    ?>" <?php } ?>  class="form-control" <?php if ($status[0] == 7 or $status[0] == 8 or $status[0] == 9) { ?> disabled=""  <?php } ?>></div>
                                                                              <?php if ($tesis) { ?>
                                                <div class="col col-sm-1"><a href="<?= $tesi->getLink() ?>" target="blank" class="btn btn-outline-info float-left mr-3">link</a>  </div>
                                            <?php } ?>
                                        </div>   
                                        <?php if (!$tesis) { ?>
                                            <button type="submit" class="btn btn-outline-info col col-sm-2" disabled="">Subir Link</button> 

                                        <?php } ?>
                                        <?php if (count($tesis) == 1 and $status[0] != 5 and $status[0] != 6) { ?>
                                            <?php if ($tesisfechaposigativo == 0 or $status[0] == 7 or $status[0] == 8 or $status[0] == 9) { ?>  
                                                <button type="submit" class="btn btn-outline-info float-left mr-3 col col-sm-2" name="aprobar" id="aprobar" disabled=""> Actualizar link</button> 
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-outline-info float-left mr-3 col col-sm-2" name="aprobar" id="aprobar" disabled=""> Actualizar link</button> 

                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (count($tesis) == 1 and $status[0] == 5) { ?>
                                            <?php if ($tesisfechaposigativo == 0) { ?>  
                                                <button type="submit" class="btn btn-outline-info float-left mr-3 col col-sm-2" name="aprobar" id="aprobar" disabled=""> Actualizar link</button> 
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-outline-info float-left mr-3 col col-sm-2" name="aprobar" id="aprobar" disabled=""> Actualizar link</button> 

                                            <?php } ?>
                                        <?php } ?>

                                        <?php if ($status[0] == 6) { ?>

                                            <button type="submit" class="btn btn-primary" disabled=""> cancelar</button> 

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>    
        <?php
        if ($opcion == 5) {

            $temas = ctrFormato::getTema($idequipo);
            $notas = ctrNota::getNotasgrupo($idequipo);
            $nombreequipo = ctrEquipo::getnombregrupo($idequipo);

            $status = ctrTesis::getstatus($idequipo);
            $tesis = ctrTesis::getTesis($idequipo);

            $x = 0;
            ?>
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert" >
                                Recuerde que debe subir su tesis con las firmas para completar con el proceso de titulación
                            </div> 
                            <div class="card">
                                <div class="card-header">
                                    <strong>Calificación</strong>
                                </div>


                                <div class="col-md-12">
                                    <div class="card">
                                        <form action="procesos.php" role="form" " method="POST">
                                            <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipo ?>"/>
                                            <button type="submit" class="btn btn-outline-info float-left"> Regresar </button> 
                                        </form>
                                        <div class="card-header">

                                            <strong class="card-title ">Tesis de  <?php
                                                foreach ($nombreequipo as $nombreequip) {
                                                    echo $nombreequip->getNombres();
                                                }
                                                ?></strong>  



                                            <?php if ($status[0] == 9) { ?>
                                                <div class="alert alert-danger float-right mb-0" role="alert">Tesis Calificada</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="row form-group col col-sm-12">
                                            <div class="col col-sm-1"><label class="">Tema: </label></div>
                                            <div class="col col-sm-11"><input type="text" id="_tema" name="tema" placeholder="tema..."  class="form-control" <?php if ($temas) { ?> value="<?= $temas->tema ?>" <?php } ?> disabled=""></div>
                                        </div>

                                        <div class="row form-group col col-sm-12">
                                            <div class="col col-sm-1"><label class="">Nota: </label></div>
                                            <div class="col col-sm-2"> 
                                                <div class="alert alert-success" role="alert">
                                                    <?php
                                                    if ($notas) {
                                                        $cali = 0;
                                                        foreach ($notas as $nota) {
                                                            $cali = $cali + $nota->getNota();
                                                        }

                                                        echo bcdiv($cali / 3, '1', 2);
                                                    }
                                                    ?></div></div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Enviar Tesis</strong>
                                </div>

                                <div class="card-body">


                                    <?php if (!$tesis) { ?>  

                                        <button type="button" class="btn btn-outline-info " disabled="">
                                            Subir Tesis
                                        </button>
                                    <?php } ?>




                                    <?php if ($status[0] == 1) { ?>  

                                        <button type="submit" class="btn btn-outline-info float-left mr-3" disabled=""> Enviar tesis</button> 

                                    <?php } ?>



                                    <!-- cancelar envio-->
                                    <?php if ($status[0] == 2) { ?>

                                        <button type="submit" class="btn btn-outline-info float-left mr-3" disabled=""> Cancelar envio</button> 


                                    <?php } ?>

                                    <?php if ($status[0] == 1) { ?>
                                        <div class="alert alert-primary float-right mb-0" role="alert">Tesis sin enviar</div>
                                    <?php } ?>
                                    <?php if ($status[0] == 2) { ?>
                                        <div class="alert alert-warning float-right mb-0" role="alert"> Tesis entregada</div>
                                    <?php } ?>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <table id="tdatos" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Ruta</th>
                                                        <th>Extension</th>
                                                        <th>Archivo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tdetalle">
                                                    <?php
                                                    foreach ($tesis as $tesi) {
                                                        ?>
                                                        <tr>
                                                            <td align="center"> <a href="<?= $tesi->getRuta() ?>" target="blank"><?= $tesi->getNombrearchivo() ?></a> </td>
                                                            <td align="center"><?= $tesi->getExtension() ?></td>
                                                            <td align="center">



                                                                <button type="submit" class="btn btn-outline-danger" disabled=""> Eliminar Archivo</button> 

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
        <?php } ?> 
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
