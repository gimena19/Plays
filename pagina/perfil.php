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
		<title>Golden Glove</title>
		<style  type="text/css">
		    .datosPer{
		        border-right: 1px solid #c0924f;
		        
		    }
		</style>
	</head>
	<body>
        <?php 
        require_once __DIR__ . '/php/clases/Usuario.php';
            session_start();
            
            if($_SESSION['usuario']==null or !isset($_SESSION['usuario'])){
                header('location:index.php');
            }
            $usuario = $_SESSION['usuario'];
            
            include_once(__DIR__ . '/php/include/headerI.php');
            
        ?>
        <div class="container d-flex justify-content-center">
            <div>
                <h1>
                    <?php
                        echo $usuario->getNombreCompleto();
                    ?>
                </h1>
            </div>
        </div>
        <aside class="row">
            <div class=" col-6 col-sm-3 col-md-2 col-lg-2 datosPer">
                <h4>
                    Datos Personales
                </h4>
                <p>
                    <?php
                        echo $usuario->getUsuario();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getFechaIngreso();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getsexo();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->correo();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getDirCompleta();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getCp();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getColonia();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getEstado();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getTelefono();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getActivo();
                    ?>
                </p>
                <p>
                    <?php
                        echo $usuario->getFechaAlta();
                    ?>
                </p>
            </div>
            <div class="col-md-7">
                <p>Hola</p>
            </div>
        </aside>        
        
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<script src="js/jquery.js"></script><!-- CÓDIGO DE BOOTSTRAP -->
		<script src="js/bootstrap.min.js"></script> <!-- CÓDIGO DE BOOTSTRAP -->
        <script src="js/popper.min.js"></script>
	</body>
</html>


