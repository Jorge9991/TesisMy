<?php require '../controller/ctrRequisitos.php'; ?>
<?php require '../controller/ctrUsuario.php'; ?>
<?php require '../controller/ctrHabilidad.php'; ?>
<?php require '../controller/ctrUsuarioHabilidad.php'; ?>
<?php require '../controller/ctrDocumento.php'; ?>
<?php require '../controller/ctrUsuarioRequisito.php'; ?>
<?php require '../controller/ctrUsuarioFormato.php'; ?>
<?php require '../controller/ctrUsuarioAnteproyecto.php'; ?>
<?php require '../controller/ctrEquipo.php'; ?>
<?php require '../controller/ctrEquipoTutor.php'; ?>
<?php require '../controller/ctrFormato.php'; ?>
<?php require '../controller/ctrAnteproyecto.php'; ?>
<?php require '../controller/ctrCronograma.php'; ?>
<?php require '../controller/fechasrestantes.php'; ?>
<?php require '../controller/ctrTesis.php'; ?>
<?php require '../controller/ctrTesisLink.php'; ?>
<?php require '../controller/ctrUsuarioTesis.php'; ?>
<?php require '../controller/ctrUsuarioTutor.php'; ?>
<?php require '../controller/ctrNota.php'; ?>
<?php require '../controller/ctrUsuarioNota.php'; ?>
<?php require '../controller/ctrTipoUsuario.php'; ?>
<?php $idusuario = $Sesion->getIdUsuario(); ?>
<?php $status = ctrRequisitos::getstatus($idusuario); ?>
<?php
$idequipos = ctrUsuario::getequipo($idusuario);
$idequipo = $idequipos[0];
$statusformatos = ctrFormato::getstatus($idequipo);
$statusanteproyecto = ctrAnteproyecto::getstatus($idequipo);
?>
<?php $soytutor = ctrUsuarioTutor::getsoytutor($idusuario); ?>
<?php $catidadrequisitos = ctrUsuarioRequisito::getcantidadrequisitos(); ?>
<?php $catidadformatos = ctrUsuarioFormato::getcantidadformatos(); ?>
<?php $catidadanteproyectos = ctrUsuarioAnteproyecto::getcantidadanteproyectos(); ?>
<?php $catidadantesis = ctrUsuarioTesis::getcantidadtesis(); ?>
<?php $catidadanteproyectosjurado = ctrUsuarioAnteproyecto::getcantidadanteproyectosjurado($idusuario); ?>
<?php $catidadtesisjurado = ctrUsuarioTesis::getcantidadtesisjurado($idusuario); ?>
<?php $catidadtesiscorregidasjurado = ctrUsuarioTesis::getcantidadcorreciontesisjurado($idusuario); ?>
<?php $catidadtesisfechajurado = ctrUsuarioTesis::getcantidadfechatesisjurado($idusuario); ?>
<?php $catidadtesisnotajurado = ctrUsuarioTesis::getcantidadnotatesisjurado($idusuario); ?>
<?php $notas = ctrNota::getNotasgrupo($idequipo); ?>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="principal.php"><i class="menu-icon fa fa-laptop"></i>Principal</a>
                </li>

                <!-- menu de gestor-->
                <?php if ($Sesion->getIdTipoUsuario() == 1) { ?>
                    <li class="menu-title">Mantenimiento</li>
                    <li><a href="formatos.php"><i class="menu-icon fa fa-file-text-o"></i>Formatos</a></li>
                    <li><a href="cronograma.php"><i class="menu-icon fa fa-calendar"></i>Cronograma</a></li>
                    <li><a href="usuario.php"><i class="menu-icon fa fa-group"></i>Usuarios</a></li>
                    <li><a href="reporte.php"><i class="menu-icon fa  fa-list-alt"></i>Reportes</a></li>
                    <li><a href="equipos.php"><i class="menu-icon fa fa-eye"></i>Equipos-proceso</a></li>

                    <li class="menu-title">Revision</li>
                    <li><a href="revisionderequisitos.php"><i class="menu-icon fa  fa-file-text"></i>Requisitos <?php if (count($catidadrequisitos) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadrequisitos); ?> </span> <?php } ?></a></li>
                    <li><a href="revisiondeformatos.php"><i class="menu-icon fa fa-file-text-o"></i>Formatos<?php if (count($catidadformatos) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadformatos); ?> </span> <?php } ?></a></li>
                    <li><a href="revisiondeanteproyecto.php"><i class="menu-icon fa  fa-file-text"></i>Anteproyetos<?php if (count($catidadanteproyectos) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadanteproyectos); ?> </span> <?php } ?></a></li>
                    <li><a href="asignacion.php"><i class="menu-icon fa fa-file-text-o"></i>Tesis<?php if (count($catidadantesis) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadantesis); ?> </span> <?php } ?></a></li>
                    <li><a href="asignacionfecha.php"><i class="menu-icon fa fa-calendar-o"></i>Asignación-fecha<?php if (count($catidadtesisfechajurado) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadtesisfechajurado); ?> </span> <?php } ?></a></li>
                    <li><a href="calificacionesall.php"><i class="menu-icon fa fa-pencil-square-o"></i>Calificaciones</a></li>
                <?php } ?>


                <!-- menu de Docente-->
                <?php if ($Sesion->getIdTipoUsuario() == 2) { ?>
                    <li class="menu-title">Mantenimiento</li>
                    <li><a href="especialidad.php"><i class="menu-icon fa fa-list-alt"></i>Especialidades</a></li>
                    <li class="menu-title">Solicitudes</li>
                    <li><a href="solicitudes.php"><i class="menu-icon fa fa-bell-o"></i>Solicitudes-tutor</a></li>
                    <li class="menu-title">Revision</li>
                    <li><a href="listaanteproyectojurado.php"><i class="menu-icon fa fa-file-text"></i>Lista-Anteproyectos<?php if (count($catidadanteproyectosjurado) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadanteproyectosjurado); ?> </span> <?php } ?></a></li>
                    <li><a href="listatesisrevision.php"><i class="menu-icon fa fa-file-text-o"></i>Revision-tesis<?php if (count($catidadtesisjurado) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadtesisjurado); ?> </span> <?php } ?></a></li>
                    <li><a href="tesiscorregidas.php"><i class="menu-icon fa fa-file-text"></i>Tesis-Corregidas<?php if (count($catidadtesiscorregidasjurado) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadtesiscorregidasjurado); ?> </span> <?php } ?></a></li>
                    <li><a href="calificar.php"><i class="menu-icon fa fa-pencil-square-o"></i>Calificar</a></li>
                    <?php if(count($soytutor) >=1){ ?>
                    <li class="menu-title">Opciones como tutor</li>
                    <li><a href="informacion.php"><i class="menu-icon fa fa-building-o"></i>Información</a></li>
                    <li><a href="equipos.php"><i class="menu-icon fa fa-eye"></i>Equipos-proceso</a></li>
              
                    <?php }?>
               <?php } ?>


                <!-- menu de Egresado-->
                <?php if ($Sesion->getIdTipoUsuario() == 3) { ?>
                    <li class="menu-title">Recursos</li>
                    <li><a href="informacion.php"><i class="menu-icon fa fa-building-o"></i>Información</a></li>
                    <?php if ($status[0] == 3) { ?>
                        <li><a href="formatosdescarga.php"><i class="menu-icon fa fa-cloud-download"></i>Formatos</a></li>
                    <?php } ?>
                    <li class="menu-title">Procesos</li>
                    <li><a href="requisitos.php"><i class="menu-icon fa fa-file-text-o "></i>Requisitos</a></li>
                    <?php if ($status[0] == 3) { ?>
                        <li><a href="equiposubirformatos.php"><i class="menu-icon fa fa-file-text"></i>Acta y Solicitud</a></li>
                        <li><a href="equiposubirtema.php"><i class="menu-icon fa fa-file-text-o"></i>Temá</a></li>
                    <?php } ?>
                    <?php if ($statusformatos[0] == 3) { ?>
                        <li><a href="equiposubiranteproyecto.php"><i class="menu-icon fa fa-file-text"></i>Anteproyecto</a></li>
                    <?php } ?>
                    <?php if ($statusanteproyecto[0] == 3) { ?>
                        <li><a href="equiposubirtesis.php"><i class="menu-icon fa fa-file-text-o"></i>Tesis</a></li>
                    <?php } ?>
                    <?php if (count($notas) == 3) { ?>
                        <li><a href="notasustentacion.php"><i class="menu-icon fa fa-pencil-square-o"></i>Calificación</a></li>
                    <?php } ?>
                <?php } ?>


                <!--admin-->
                <?php if ($Sesion->getIdTipoUsuario() == 4) { ?>
                    <li class="menu-title">Mantenimiento</li>
                    <li><a href="formatos.php"><i class="menu-icon fa fa-file-text-o"></i>Formatos</a></li>
                    <li><a href="cronograma.php"><i class="menu-icon fa fa-calendar"></i>Cronograma</a></li>
                    <li><a href="especialidades.php"><i class="menu-icon fa fa-list-alt"></i>Especialidades</a></li>
                    <li><a href="usuario.php"><i class="menu-icon fa fa-group"></i>Usuarios</a></li>
                    <li><a href="tipousuario.php"><i class="menu-icon fa  fa-user"></i>Tipo Usuarios</a></li>
                    <li><a href="reporte.php"><i class="menu-icon fa  fa-list-alt"></i>Reportes</a></li>

                    <li class="menu-title">Procesos</li>
                    <li><a href="revisionderequisitos.php"><i class="menu-icon fa  fa-file-text"></i>Requisitos <?php if (count($catidadrequisitos) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadrequisitos); ?> </span> <?php } ?></a></li>
                    <li><a href="revisiondeformatos.php"><i class="menu-icon fa fa-file-text-o"></i>Formatos<?php if (count($catidadformatos) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadformatos); ?> </span> <?php } ?></a></li>
                    <li><a href="revisiondeanteproyecto.php"><i class="menu-icon fa  fa-file-text"></i>Anteproyetos<?php if (count($catidadanteproyectos) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadanteproyectos); ?> </span> <?php } ?></a></li>
                    <li><a href="asignacion.php"><i class="menu-icon fa fa-file-text-o"></i>Tesis<?php if (count($catidadantesis) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadantesis); ?> </span> <?php } ?></a></li>
                    <li><a href="asignacionfecha.php"><i class="menu-icon fa fa-calendar-o"></i>Asignación-fecha<?php if (count($catidadtesisfechajurado) > 0) { ?> <span class="count bg-primary"><?php echo count($catidadtesisfechajurado); ?> </span> <?php } ?></a></li>
                    <li><a href="calificacionesall.php"><i class="menu-icon fa fa-pencil-square-o"></i>Calificaciones</a></li>
                    <li><a href="equipos.php"><i class="menu-icon fa fa-eye"></i>Equipos-proceso</a></li>
                <?php } ?>
                <!--tutor-->
                <?php if ($Sesion->getIdTipoUsuario() == 5) { ?>
                    <li class="menu-title">Información-cronograma</li>
                    <li><a href="informacion.php"><i class="menu-icon fa fa-building-o"></i>Información</a></li>
                    <li class="menu-title">Solicitudes</li>
                    <li><a href="solicitudes.php"><i class="menu-icon fa fa-bell-o"></i>Solicitudes-tutor</a></li>
                    <li class="menu-title">Seguimiento</li>
                    <li><a href="equipos.php"><i class="menu-icon fa fa-eye"></i>Equipos-proceso</a></li>

                <?php } ?>

            </ul>
        </div>
    </nav>
</aside>
