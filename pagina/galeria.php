<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- CÓDIGO DE BOOTSTRAP 
		<meta name="viewport" content ="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0"> 
        -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="icon" type="image/png" sizes="196x196" href="imagenes/logo152.png">
		<!-- CÓDIGO DE BOOTSTRAP -->
		<link rel="stylesheet" href="css/bootstrap.min.css"> 
		<link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
		<title>Golden Glove</title>
	</head>
	<body>
            <?php
            require_once(__DIR__ . '/php/clases/Pagina.php');
            include(__DIR__ . '/php/clases/Usuario.php');/* agrega la clase usuario*/
            $paginaId = 4;
            session_start();
            $usuario = null;
            if(isset($_SESSION['usuario'])){
                $usuario = $_SESSION['usuario'];
            }
            $pagina = new Pagina($paginaId);
            if(isset($_SESSION['pagina'])){
                unset($_SESSION['pagina']);
            }
            $_SESSION['pagina'] = $pagina;
            include(__DIR__ . '/php/include/headerI.php');/* agrega el menu*/
            $pagina->consultaImagenes();
            ?>
        <div class="container cuerpo">
            <form class="<?php echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible'; ?>" action='formImagen.php' >
                <button style="margin-bottom:20px;" type="submit" class="btn btn-secondary <?php /*echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible';*/ ?>">
                  Subir imagen
                </button>
            </form>
            
            
             <section class="card-columns">
                <?php 
                    foreach($pagina->getImagenes() as $imagen){ 
                ?>
                        <div class="card card-Img text-white bg-dark text-center">
                            <a href="<?php echo 'galeria/'. $imagen->getRuta(); ?>" data-toggle="lightbox">
                                <img class="img-fluid img-thumbnail card-img-top bg-dark" src="<?php echo 'galeria/'. $imagen->getRuta(); ?>" alt="<?php echo $imagen->getTitulo();?>">
                            </a>
                            <div class="card-body">
                                <h6 class="card-title">
                                    <strong><?php echo $imagen->getTitulo(); ?></strong>
                                </h6>
                                <p class="card-text text-white">
                                    <?php echo $imagen->getDescripcion(); ?>
                                </p>
                            </div>
                        </div>
               <?php } ?>
            </section>
                <!--
                <div class="col-md-4 col-lg-3">
                        <a class="d-block" href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox">
                            <img class="img-fluid img-thumbnail" src="https://unsplash.it/600.jpg?image=251">
                        </a>
                </div>
                -->
            
        </div>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<script src="js/jquery.js"></script><!-- CÓDIGO DE BOOTSTRAP -->
		<script src="js/bootstrap.min.js"></script> <!-- CÓDIGO DE BOOTSTRAP -->
        <script src="js/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
        
        <script>
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                    event.preventDefault();
                    $(this).ekkoLightbox();
                });
                
        </script>
        
	</body>
</html>