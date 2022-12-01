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
        <link rel="stylesheet" href="css/formulario.css">
        <title>Iniciar Sesión</title>
    </head>
    <body>
        <?php
        include_once(__DIR__ . '/php/include/headerI.php');
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <h1>Inicia Sesión</h1>
            </div>
               <div class="row justify-content-center">
                   <form class ="form-horizontal" method="POST" action="php/pagina/iniciaSesion.php">
                        <div class="form-group">
                            <label class="control-label col-md-5 colk-md-offset-3" for="usuario">Usuario:</label>
                            <input class="form-control" name="usr" type="text" placeholder="Usuario">
                        </div>
                        <div class="form-group has-error">
                            <label class="control-label col-md-5" for="contraseña">Contraseña:</label>
                            <input class="form-control" name="psw" type="password" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Iniciar</button>
                        </div>
                    </form>
                </div>
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
            <script src="js/jquery.js"></script><!-- CÓDIGO DE BOOTSTRAP -->
            <script src="js/bootstrap.min.js"></script> <!-- CÓDIGO DE BOOTSTRAP -->
            <script src="js/popper.min.js"></script>
        </div>
    </body>
</html>