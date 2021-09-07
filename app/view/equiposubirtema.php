<?php
include 'session.php';
if ($Sesion->getIdTipoUsuario() != 3) {
    header('Location: principal.php');
}
error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Subir formatos</title>
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
            $idequipos = ctrUsuario::getequipo($idusuario);
            $idequipo = $idequipos[0];
            $idusuario = $Sesion->getIdUsuario();
            $status = ctrFormato::getstatus($idequipo);
            $equipo = ctrEquipo::getYatieneequipo($idusuario);
            $solicitudenviada = ctrEquipo::getSolicitudenviada($idequipo);
            $solicitudenviadatutor = ctrEquipoTutor::getSolicitudenviada($idequipo);
            $solicitudes = ctrEquipo::getsolicitudes($idusuario);
            $temas = ctrFormato::getTema($idequipo);
            $habilidades = ctrFormato::getHabilidad($idequipo);
            $tutor = ctrEquipoTutor::getYatieneequipo($idequipo);
            $formatos = ctrFormato::getFormatos($idequipo);
            $x = 0;
            ?>

            <?php if ($equipo == 0) { ?>
                <div class="content">
                    <div class="animated fadeIn">

                        <div class="row">

                            <div class="col-lg-12">
                            
                                <?php if ($solicitudenviada == 0) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Para continuar debe elegir su equipo de trabajo!
                                    </div>
                                <?php } ?>
                                <?php if ($solicitudenviada == 1) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Usted ha enviado una solicitud para equipo, debera esperar hasta que la otra persona apruebe para continuar
                                    </div>
                                <?php } ?>
                                <div class="card">
                                    <div class="card-body">
                                        <?php if ($solicitudenviada == 0) { ?>
                                            <button type="button" class="btn btn-outline-info float-left mr-3" data-toggle="modal" data-target="#exampleModalCenter">
                                                Trabajo en pareja
                                            </button>
                                            <form  role="form" id="frmequiposolo" class="float-left mr-3">  
                                                <button type="submit" class="btn btn-outline-info" > Trabajo individual</button> 
                                                <input type="hidden" name="action" id="_action" value="sol">
                                                <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $Sesion->getIdUsuario() ?>"/>                                   
                                                <input type="hidden" name="opc" id="_opc" value="S"/>
                                            </form>
                                        <?php } ?>
                                        <?php if ($solicitudenviada != 0) { ?>
                                            <form  role="form" id="frmcancelarsolicitud" class="float-left mr-3">  
                                                <button type="submit" class="btn btn-outline-info" > Cancelar solicitud</button> 
                                                <input type="hidden" name="action" id="_action" value="can">
                                                <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $Sesion->getIdUsuario() ?>"/>                                   
                                                <input type="hidden" name="opc" id="_opc" value="C"/>
                                            </form>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong class="card-title ">Solicitudes para equipo</strong>  
                                                        </div>
                                                        <div class="card-body">
                                                            <table id="tdatos" class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nombre</th>
                                                                        <th>Aceptar</th>
                                                                        <th>Rechazar</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tdetalle">
                                                                    <?php
                                                                    foreach ($solicitudes as $solicitud) {

                                                                        $id = $solicitud->getIdEquipo();
                                                                        ?>
                                                                        <tr>

                                                                            <td align="center"><?= $solicitud->getNombre() ?></td>
                                                                            <td align="center">
                                                                                <form  role="form" id="frmaceptar" >  
                                                                                    <button type="submit" class="btn btn-outline-info" > aceptar </button> 
                                                                                    <input type="hidden" name="action" id="_action" value="ace">
                                                                                    <input type="hidden" name="idEquipo" id="_idEquipo" value="<?= $solicitud->getIdEquipo() ?>"/>                                   
                                                                                    <input type="hidden" name="opc" id="_opc" value="A"/>
                                                                                </form>
                                                                            </td>
                                                                            <td align="center">
                                                                                <form  role="form" id="frmdelete" >  
                                                                                    <button type="submit" class="btn btn-outline-info" > Eliminar</button> 
                                                                                    <input type="hidden" name="action" id="_action" value="del">
                                                                                    <input type="hidden" name="idEquipo" id="_idEquipo" value="<?= $solicitud->getIdEquipo() ?>"/>                                   
                                                                                    <input type="hidden" name="opc" id="_opc" value="D"/>
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
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h6>Crear un nuevo equipo</h6>
                                                </div>
                                                <div class="modal-body">
                                                    <form  role="form" id="frmequipo" class="mb-3">  
                                                        <div class="card-body">
                                                            <label class="control-label col-xs-7">Seleccione a su segundo integrante </label>
                                                            <select  class="standardSelect" id="_idusuario2" name="idusuario2" tabindex="1" data-placeholder="Listado de egresados..." >
                                                                <option value="" label="default"></option>
                                                                <?php
                                                                $listausuarios = ctrUsuario::getusuariosegresados($idusuario);

                                                                foreach ($listausuarios as $listausuario) {
                                                                    ?>
                                                                    <option value="<?= $listausuario->getIdUsuario() ?>">
                                                                        <?= $listausuario->getApellido() ?> <?= $listausuario->getNombre() ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                        <div class="card-body">
                                                            <button type="submit" class="btn btn-outline-info mb-3" > Crear equipo</button> 
                                                        </div>
                                                        <input type="hidden" name="action" id="_action" value="equ">
                                                        <input type="hidden" name="idUsuario" id="_idUsuario" value="<?= $idusuario ?>"/>                                   
                                                        <input type="hidden" name="opc" id="_opc" value="E"/>
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
            <?php } else { ?>
                <?php if (!$tutor) { ?>
                    <div class="content">
                        <div class="animated fadeIn">

                            <div class="row">

                                <div class="col-lg-12">
                                    <?php if ($solicitudenviadatutor == 0) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            Para continuar debe elegir su tutor!
                                        </div>
                                    <?php } ?>
                                    <?php if ($solicitudenviadatutor == 1) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            Debera esperar hasta que su tutor apruebe la solicitud para continuar
                                        </div>
                                    <?php } ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <?php if ($solicitudenviadatutor == 0) { ?>
                                                <button type="button" class="btn btn-outline-info float-left mr-3" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Elegir Tutor
                                                </button>

                                            <?php } ?>
                                            <?php if ($solicitudenviadatutor != 0) { ?>
                                                <form  role="form" id="frmcancelarsolicitudtutor" class="float-left mr-3">  
                                                    <button type="submit" class="btn btn-outline-info" > Cancelar solicitud</button> 
                                                    <input type="hidden" name="action" id="_action" value="can">
                                                    <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipo ?>"/>                                  
                                                    <input type="hidden" name="opc" id="_opc" value="C"/>
                                                </form>
                                            <?php } ?>
                                        </div>

                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h6>Selecciona tu tutor</h6>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form  role="form" id="frmequipotutor" class="mb-3">  
                                                            <div class="card-body">
                                                                <label class="control-label col-xs-7">Seleccione a tu tutor </label>
                                                                <select  class="standardSelect" id="_idusuario" name="idusuario" tabindex="1" data-placeholder="Listado de usuarios..." >
                                                                    <option value="" label="default"></option>
                                                                    <?php
                                                                    $listausuarios = ctrUsuario::getusuariostutor();

                                                                    foreach ($listausuarios as $listausuario) {
                                                                        ?>
                                                                        <option value="<?= $listausuario->getIdUsuario() ?>">
                                                                            <?= $listausuario->getApellido() ?> <?= $listausuario->getNombre() ?>
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                            <div class="card-body">
                                                                <button type="submit" class="btn btn-outline-info mb-3" > Enviar solicitud para tutor</button> 
                                                            </div>
                                                            <input type="hidden" name="action" id="_action" value="equ">
                                                            <input type="hidden" name="idequipo" id="idequipo" value="<?= $idequipo ?>"/>                                   
                                                            <input type="hidden" name="opc" id="_opc" value="E"/>
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
                <?php } else { ?>


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
                                            <strong>Envio de tema </strong>



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

                                                    <form class="form-horizontal " action="../drive/subirtema.php" role="form"  method="POST" enctype="multipart/form-data">

                                                        <div class="row form-group">
                                                            <div class="col col-sm-12"><label class="control-label col-xs-12">Tema: </label></div>
                                                            <div class="col col-sm-12"><input type="text" id="_tema" name="tema" placeholder="tema..."  class="form-control" required="true"<?php if ($temas) { ?> value="<?= $temas->tema ?>" <?php } ?>></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-sm-12"><label class="control-label col-xs-12">Objetivos: </label></div>
                                                            <div class="col col-sm-12"> <textarea id="_objetivos" name="objetivos" rows="3" placeholder="objetivos...." class="form-control" required="true"><?php if ($temas) { ?><?= $temas->objetivos ?><?php } ?></textarea></div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col col-sm-12"><label class="control-label col-xs-12">Especialidades: </label></div>
                                                            <div class="col col-sm-12">

                                                                <select  class="standardSelect" id="_idHabilidad" name="idHabilidad[]" tabindex="1" data-placeholder="seleccione las especialidades de acorde a su tema..." multiple class="standardSelect" required="true" >
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
                                                            <div class="col col-sm-6"><input type="file" id="archivos" name="archivos" class="form-control-file"<?php if (!$temas) { ?> required="true"<?php } ?>></div>
                                                            <div class="col col-sm-6"><a href="<?= $temas->ruta ?>" target="blank"><?php echo $temas->nombrearchivo ?></a></div>
                                                        </div>



                                                        <div >


                                                            <?php if ($temas) { ?> 
                                                                <?php if ($status[0] != 3) { ?>
                                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" >Actualizar </button>
                                                                    <input type="hidden" name="opc" id="opc" value="A"/>
                                                                    <input type="hidden" name="iddrive" id="iddrive" value="<?= $temas->iddrive ?>"/>
                                                                    <input type="hidden" name="idformato" id="idformato" value="<?= $temas->id ?>"/>
                                                                <?php } ?>
                                                                <?php if ($status[0] == 3) { ?>
                                                                    <button type="submit" class="btn btn-outline-info float-left mr-3" disabled="">Actualizar </button>

                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <button type="submit" class="btn btn-outline-info float-left mr-3"> Subir tema</button>
                                                                <input type="hidden" name="opc" id="opc" value="G"/>
                                                            <?php } ?>



                                                        </div>
                                                        <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/> 
                                                    </form>



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
                                                                    <form  role="form" id="frmFormatos">  
                                                                        <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled=""> Enviar tema</button> 

                                                                    </form>
                                                                <?php } else { ?>
                                                                    <form  role="form" id="frmFormatos">  
                                                                        <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar"> Enviar tema</button> 
                                                                        <input type="hidden" name="action" id="_action" value="apr">
                                                                        <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                   
                                                                        <input type="hidden" name="opc" id="_opc" value="A"/>
                                                                    </form>
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
                                                                    <form  role="form" id="frmFormatos">  
                                                                        <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled="">  Enviar tema</button> 

                                                                    </form>
                                                                <?php } else { ?>
                                                                    <form  role="form" id="frmFormatos">  
                                                                        <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar">  Enviar tema</button> 
                                                                        <input type="hidden" name="action" id="_action" value="apr">
                                                                        <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                   
                                                                        <input type="hidden" name="opc" id="_opc" value="A"/>
                                                                    </form>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" disabled="">  Enviar tema</button> 

                                                            <?php } ?>
                                                        <?php } ?>




                                                    <?php } ?>
                                                    <?php if ($temas and $status[0] == 4) { ?>
                                                        <?php if ($formatosfechaposigativo == 0) { ?>  
                                                            <form  role="form" id="frmFormatos">  


                                                                <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar" disabled=""> Volver a enviar formatos corregidos</button> 

                                                            </form>
                                                        <?php } else { ?>
                                                            <form  role="form" id="frmFormatos">  


                                                                <button type="submit" class="btn btn-outline-info" name="aprobar" id="aprobar"> Volver a enviar formatos corregidos</button> 
                                                                <input type="hidden" name="action" id="_action" value="apr">
                                                                <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                   
                                                                <input type="hidden" name="opc" id="_opc" value="A"/>

                                                            </form>
                                                        <?php } ?>


                                                    <?php } ?>
                                                    <?php if ($temas and $status[0] == 2) { ?>
                                                        <?php if ($formatosfechaposigativo == 0) { ?>  
                                                            <form  role="form" id="frmFormatoscancelar">  


                                                                <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar" disabled=""> Cancelar envio</button> 

                                                            </form>
                                                        <?php } else { ?>
                                                            <form  role="form" id="frmFormatoscancelar">  


                                                                <button type="submit" class="btn btn-outline-info float-left mr-3" name="aprobar" id="aprobar"> Cancelar envio</button> 
                                                                <input type="hidden" name="action" id="_action" value="can">
                                                                <input type="hidden" name="idequipo" id="_idequipo" value="<?= $idequipo ?>"/>                                    
                                                                <input type="hidden" name="opc" id="_opc" value="C"/>

                                                            </form>
                                                        <?php } ?>


                                                    <?php } ?>
                                                    <?php if ($temas and $status[0] == 3) { ?>

                                                        <a href="formatosdescarga.php" class="btn btn-outline-info float-left mr-3">Descargar formatos</a>

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
            <?php } ?>
        <?php } ?>

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
            $('#frmequipo').on({
                submit: function () {
                    $.ajax({
                        url: "equipoopc.php",
                        data: $(this).serialize(),
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (data.ok == true) {
                                swal({title: "Solicitud enviada!", icon: "success", button: true, })
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
                            swal({title: "El usuario que seleccionó ya esta en un equipo!", icon: "warning", dangerMode: true, })

                        }
                    });
                    return false;
                }
            });

            $('#frmequiposolo').on({
                submit: function () {
                    $.ajax({
                        url: "equipoopc.php",
                        data: $(this).serialize(),
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (data.ok == true) {
                                swal({title: "Equipo de solo un integrante creado!", icon: "success", button: true, })
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
                            swal({title: "Error al crear equipo!", icon: "warning", dangerMode: true, })
                        }
                    });
                    return false;
                }
            });
            $('#frmcancelarsolicitud').on({
                submit: function () {
                    $.ajax({
                        url: "equipoopc.php",
                        data: $(this).serialize(),
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (data.ok == true) {
                                swal({title: "Solicitud cancelada!", icon: "success", button: true, })
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
            //ACEPTAR
            $('#frmaceptar').on({
                submit: function () {
                    $.ajax({
                        url: "equipoopc.php",
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
                            swal({title: "Error al Aceptar!", icon: "warning", dangerMode: true, })
                        }
                    });
                    return false;
                }
            });
            //ELIMINAR
            $('#frmdelete').on({
                submit: function () {
                    $.ajax({
                        url: "equipoopc.php",
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
        $(function () {
            // enviar requisistos para aprobacion
            $('#frmFormatos').on({
                submit: function () {
                    $.ajax({
                        url: "equiposubirformatosopc.php",
                        data: $(this).serialize(),
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (data.ok == true) {
                                swal({title: "Enviado", icon: "success", button: true, })
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
                            swal({title: "Error al enviar!", icon: "warning", dangerMode: true, })

                        }
                    });
                    return false;
                }
            });
            //equipo tutor
            $('#frmequipotutor').on({
                submit: function () {
                    $.ajax({
                        url: "equipotutoropc.php",
                        data: $(this).serialize(),
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (data.ok == true) {
                                swal({title: "Solicitud enviada!", icon: "success", button: true, })
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
                            swal({title: "El tutor seleccionado ya tiene 3 grupos asignado, hable con el gestor cualquier consulta!", icon: "warning", dangerMode: true, })

                        }
                    });
                    return false;
                }
            });

            // cancelar requisistos
            $('#frmFormatoscancelar').on({
                submit: function () {
                    $.ajax({
                        url: "equiposubirformatosopc.php",
                        data: $(this).serialize(),
                        type: 'POST',
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (data.ok == true) {
                                swal({title: "Envió cancelados!", icon: "success", button: true, })
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
