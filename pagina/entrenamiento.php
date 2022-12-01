<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- CÓDIGO DE BOOTSTRAP 
		<meta name="viewport" content ="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0"> 
        -->
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" sizes="196x196" href="imagenes/logo152.png">
		<!-- CÓDIGO DE BOOTSTRAP --> 
        <link rel="stylesheet" href="css/bootstrap.css"> 
		<link rel="stylesheet" href="css/general.css">
        <script src="js/funciones.js"></script>
		<title>Play's</title>
	</head>
	<body>
      <?php
            include(__DIR__ . '/php/clases/Pagina.php');
            include(__DIR__ . '/php/clases/Usuario.php');/* agrega la clase usuario*/
            include_once(__DIR__ . "/php/config.php"); /*agrega los datos de configuración*/
            session_start();
            $usuario;
            $paginaId = 3;
            $pagina = new Pagina($paginaId);
            if(isset($_SESSION['usuario'])){
                $usuario = $_SESSION['usuario'];
            if(isset($_SESSION['pagina'])) //Para cuando se actualizan o 
                unset($_SESSION['pagina']);
            }
            $_SESSION['pagina'] = $pagina;
            
            include(__DIR__ . '/php/include/headerI.php');/* agrega el menu*/
        ?>
        <div class="container-fluid cuerpo">
           <div class="row">
               <button type="button" class="btn btn-primary <?php echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible'; ?>" data-toggle="modal" data-target="#modalAgregaContenido" onclick="agregaCont()">
                  Agrega contenido
                </button>
           </div>
            <section class="row">
                <aside class="d-none d-md-block col-md-2 col-lg-2 aside">
                    <nav>
                    <?php
                        foreach($pagina->getContenidos() as $contenido){ ?>
                            <a  href = "#E<?php echo $contenido->getContenidoId(); ?>">
                                <h2> 
                                    <?php echo $contenido->getTitulo() ?> 
                                </h2>
                            </a>
                        <?php } ?>
                    </nav>
                </aside>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 articulos">
                    <?php 
                        foreach($pagina->getContenidos() as $contenido){ ?>
                            <div class="row contenido" id="E<?php echo $contenido->getContenidoId(); ?>">
                                <h2 class="col-10">
                                    <?php echo $contenido->getTitulo(); ?>  
                                </h2>
                                <a class="<?php echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible'; ?>" data-target="#modalAgregaContenido" data-toggle="modal" href="" onclick="actualizaCont(<?php echo $contenido->getContenidoId(); ?>)">
                                    <img src="iconos/svg/pencil.svg">
                                </a>
                                <a class="col-1 <?php echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible'; ?>" data-target="#modalEliminaContenido" data-toggle="modal" href="" onclick="eliminaContenido(<?php echo $contenido->getContenidoId(); ?>)">
                                    <img src="iconos/svg/x.svg">
                                </a>
                                <p> 
                                    <?php  echo nl2br($contenido->getContenido()); ?> 
                                </p>
                            </div>
                        <?php 
                        } ?>
                        
                    <!-- </div> -->
                </div>
                <aside class=" d-none d-sm-block col-sm-5 col-md-3 col-lg-3">
                    <div class="fb-page" 
                        data-tabs="timeline,events,messages"
                        data-href=""
                        data-width="385" 
                        data-hide-cover="false">
                    </div>
                </aside>
            </section>
        </div>
		
        <div id="fb-root">
        </div>
        
        <?php 
            include_once('formContenido.php');
            include_once('modEliminaContenido.php');
        ?>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) 
                    return;
                js = d.createElement(s); js.id = id;
                js.src = '';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<script src="js/jquery.js"></script><!-- CÓDIGO DE BOOTSTRAP -->
		<script src="js/bootstrap.min.js"></script> <!-- CÓDIGO DE BOOTSTRAP -->
        <script src="js/popper.min.js"></script>
	</body>
</html>