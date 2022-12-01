<?php include_once(__DIR__ . '/../../ModAltaUsuario.php'); ?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#botonColapsa" aria-expanded="false" aria-controls="botonColapsa" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pruebaNav" id="botonColapsa">
                <ul class="nav navbar-nav  mr-auto">
                    <li class= "nav-item <?php echo $paginaId == 1 ? 'active' : ''; ?> ">
                        <a class="nav-link" href="index.php">
                            Inicio
                            <span class="sr-only">
                                (current)
                            </span>
                        </a>
                    </li>
                    <li class= "nav-item <?php echo $paginaId == 2 ? 'active' : ''; ?> ">
                        <a class="nav-link" href="nosotros.php">
                            Nosotros
                        </a>
                    </li>
                    <li class= "nav-item <?php echo $paginaId == 3 ? 'active' : ''; ?> ">
                        <a class="nav-link" href="entrenamiento.php">
                             Desportes
                        </a>
                    </li>
                    <li class= "nav-item <?php echo $paginaId == 4 ? 'active' : ''; ?> ">
                        <a class="nav-link" href="galeria.php">
                             Galería
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php echo $usuario == null ? '' : 'invisible' ?> ">
                        <a class="nav-link" href="login.php">
                            Iniciar Sesión
                        </a>
                    </li>
                    <li class="nav-item dropdown <?php echo $usuario == null ? 'invisible' : '' ?> ">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo isset($usuario) == null ? '' : $usuario->getUsuario(); ?>
                            <span class="caret">
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="nav-link" href="perfil.php">
                                    Perfil
                                </a>
                            </li>
                            <?php if($usuario != null and $usuario->esAdmin() == 1){
                            echo "<li class=\"dropdown-item\"><a class=\"nav-link\" href=\"#\" data-toggle=\"modal\" data-target=\"#modalAltaUsuario\" onclick=\"altaUsuario()\">Alta Usuario</a></li>
                            <li class=\"dropdown-item\"><a class=\"nav-link\" href=\"usuarios.php\">Usuarios</a></li>
                            ";
                                     }
                            ?>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">
                                <a class="nav-link" href="php/pagina/cierraSesion.php">
                                    Salir
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="fondoLogo">
        <a href="index.php">
        <div class="logo">
            <!--img src="imagenes/logo152.png"/-->
        </div>
        </a>
    </div>
    <h1 class="nombre text-center">
        <strong>Play's</strong>
    </h1>
    <p class="text-center">
            La pagina web en donde aprender deporte es muy divertido
    </p>
</header>
