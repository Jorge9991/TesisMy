<?php
$idperfil = $Sesion->getIdUsuario();
$perfiluser = ctrUsuario::perfil($idperfil);
?>

<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="principal.php"><img src="../../static/img/logo.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>

    <div class="user-area dropdown float-right">
        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="user-avatar rounded-circle" src="../../static/img/usuario.png" alt="User Avatar">
        </a>

        <div class="user-menu dropdown-menu">
            <li class="active"><a class="nav-link " href="perfil.php"><i class="fa fa- user"></i>Mi perfil</a></li>  

            <li><a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Salir</a></li> 

        </div>
    </div>
    <div class="user-area dropdown float-right">
        <spam href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <h5 class="k"><?php echo $perfiluser->apellido . ' ' . $perfiluser->nombre ?></h5>
        </spam>

    </div>

</header>
<!-- /#header -->