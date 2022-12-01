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
            include_once(__DIR__ . '/php/clases/Pagina.php');
            include_once(__DIR__ . '/php/clases/Usuario.php');/* agrega la clase usuario*/
            
            session_start();
        //include_once('modEliminaContenido.php');
            $usuario=null;
            $paginaId = 1;
            $pagina = new Pagina($paginaId);
            if(isset($_SESSION['usuario'])){
                $usuario = $_SESSION['usuario'];
            if(isset($_SESSION['pagina']))
                unset($_SESSION['pagina']);
            }
            $_SESSION['pagina'] = $pagina;
            $cantContenidosXpag = 5;
            $cantPag = ceil(count($pagina->getContenidos()) / $cantContenidosXpag);
            if(isset($_GET["numPag"])){
                $numPag = $_GET["numPag"];
            }
            else{
                $pagina = 1;//numero de pagina del navegador de los articulos
                header('location:index.php?numPag=1');
            }
            include(__DIR__ . '/php/include/headerI.php');/* agrega el menu*/
            /*
            mysqli_report(MYSQLI_REPORT_STRICT);//Permite arrojar excepciones personalizadas
            try{
                $cnn = new mysqli(SRVDR,USR,PASS,DB);
            }catch(Exception $ex){
                echo "Error al conectar a la base de datos";
            }

            try {
                if($res = $cnn->prepare("SELECT COUNT(*) FROM contenidos WHERE paginaId = ?")){
                    $res->bind_param('i',$paginaId);
                    $res->execute();
                    $res->bind_result($numContenidos);
                    $res->fetch();
                    $res->free_result();
                    $res->close();
                }
                else{
                    echo 'Error en la consulta';
                }
            }
            catch(exception $ex){
                echo $ex->message;
            }
            $cantPag = ceil($numContenidos / $cantContenidosXpag);
            */
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
                         $i = ($numPag-1) * $cantContenidosXpag;
                        for($it = 0; $it < $cantContenidosXpag && $i < count($pagina->getContenidos()) ; $it++){ ?>
                            <a  href = "#E<?php echo $pagina->getContenidos()[$i]->getContenidoId();?>"> 
                                <h2> 
                                    <?php echo $pagina->getContenidos()[$i]->getTitulo(); ?> 
                                </h2>
                            </a>
                            <?php $i++; ?> 
                        <?php } ?>
                    </nav>
                </aside>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 articulos">
                    <?php 
                        $i = ($numPag-1) * $cantContenidosXpag;
                        for($it = 0; $it < $cantContenidosXpag && $i < count($pagina->getContenidos()) ; $it++){ ?>
                            <div id="E<?php echo $pagina->getContenidos()[$i]->getContenidoId(); ?>">
                                <div class="row contenido">
                                    <h2 class="col-10">
                                        <?php echo $pagina->getContenidos()[$i]->getTitulo(); ?>  
                                    </h2>
                                    <!--<a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 8 8">
                                            <g class="pencil">
                                              <path d="M6 0l-1 1 2 2 1-1-2-2zm-2 2l-4 4v2h2l4-4-2-2z" />
                                            </g>
                                        </svg>    
                                    </a> -->
                                    <a class="col-1 <?php echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible'; ?>" data-target="#modalAgregaContenido" data-toggle="modal" href="" onclick="actualizaCont(<?php echo $pagina->getContenidos()[$i]->getContenidoId() ?>)">
                                        <img class="pencil" src="iconos/svg/pencil.svg">
                                    </a>
                                    <a class="col-1 <?php echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible'; ?>" data-target="#modalEliminaContenido" data-toggle="modal" href="" onclick="eliminaContenido(<?php echo $pagina->getContenidos()[$i]->getContenidoId() ?>)">
                                        <img class="x" src="iconos/svg/x.svg">
                                    </a>
                                    <!--
                                    <button class="btn btn-secondary btn-sm col-1 <?php /*echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible'; */ ?>" type="button" onclick="actualizaCont(<?php echo $pagina->getContenidos()[$i]->getContenidoId() ?>)"  data-toggle="modal" data-target="#modalAgregaContenido" >
                                        edita
                                    </button>
                                    
                                    <button class="btn btn-secondary btn-sm col-1 <?php /*echo ($usuario != null and $usuario->esAdmin()) == 1 ? '': 'invisible';*/ ?>" type="button" onclick="eliminaContenido(<?php /* echo $pagina->getContenidos()[$i]->getContenidoId() */?>)"  data-toggle="modal" data-target="#modalEliminaContenido" >
                                        Eliminar
                                    </button>
                                    -->
                                </div>
                                <p> 
                                    <?php  echo nl2br($pagina->getContenidos()[$i]->getContenido()); ?> 
                                </p>
                            </div>
                        <?php 
                            $i++; 
                        } ?>
                    <!--
                   <?php/*
                        $res->data_seek(0);
                        while ($res->fetch()) { */?>
                           <div class="row">
                            <h2 class="col-11" id="E<?php/* echo $contenidoId */?>"> <?php/* echo $titulo */?>  </h2>
                            <button class="btn btn-secondary btn-sm col-1" type="button" onclick="actualizaCont()">actu</button>
                            <p> <?php /* echo $contenido */?> </p>
                            </div>
                    <?php /*   }
                        $res->free_result();
                        $res->close();
                        
                    */?>  -->
                   <!--< <div > -->
                        <nav aria-label="..." style="text-align: center">
                            <ul class="pagination">
                                <li class="page-item <?php echo $numPag <= 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" tabindex="-1" href="index.php?numPag=<?php echo $numPag - 1; ?>">
                                        Anterior<!--&laquo;-->
                                    </a>
                                </li>
                                <?php
                                    for($i=1;$i<= $cantPag;$i++){ ?>
                                        <li class = "page-item <?php echo $numPag==$i ? 'active' : '' ?>">
                                            <a class="page-link" href="index.php?numPag=<?php echo $i ?> ">
                                                <?php echo $i ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                              <!--  <li>
                                     <a href ="index.php?pagina=2">
                                        2
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php?pagina=3">
                                        3
                                    </a>
                                </li>
                              -->
                                <li class="page-item <?php echo $numPag>=$cantPag ? 'disabled' : '' ?>">
                                    <a class="page-link" tabindex="-1" href="index.php?numPag=<?php echo $numPag + 1; ?>">
                                        Siguiente<!--&raquo; -->
                                    </a>
                                </li>
                            </ul>
                        </nav>
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
