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
        <title>Alta usuario</title>
    </head>
    <body>
        <?php 
            session_start();
            include(__DIR__ . '/php/clases/Usuario.php');/* agrega la clase usuario*/
            
            var_dump($_SESSION['usuario']);
            
            if(!isset($_SESSION['usuario']) || $_SESSION['usuario']==null ){
                header("location: index.php");
            }
            else{
                if(!$_SESSION['usuario']->esAdmin()){
                    header("location: index.php");
                }
            }
            include_once(__DIR__ . '/php/include/headerI.php');
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="">Alta de usuario</h1>
            </div>
            
            <form class="needs-validation" novalidate method="POST" action="php/pagina/validaUsuario.php">
                <div class="card">
                       <div class="card-header">
                           Datos Personales
                       </div>
                       <div class="card-body">
                           <div class="form-row">
                               <div class="form-group col-md-2 offset-md-1">
                                <label for="nombre">Nombre(s):</label>
                                <input class="form-control" name="nombre" type="text" id="nombre" placeholder="Nombre" required>
                                <span class="invalid-feedback"> Ingresa nombre</span>
                            </div>
                            <div class="form-group col-6 col-md-4">
                                <label for="apellidoP">
                                    Apellido Paterno:
                                </label>
                                <input class="form-control" name="apellidoP" id="apellidoP" type="text" placeholder="Apellido Paterno" required>
                                <span class="invalid-feedback"> Ingresa apellido</span>
                            </div>
                            <div class="form-group col-6 col-md-4">
                                <label for="apellidoM">
                                    Apellido Materno:
                                </label>
                                <input class="form-control" name="apellidoM" id="apellidoM" type="text" placeholder="Apellido Materno" required>
                                <span class="invalid-feedback"> Ingresa apellido</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-5 col-md-2 offset-md-1">
                                <label for="sexo">
                                        Sexo:
                                </label>
                                <select class="form-control" name="sexo" id="sexo" required>
                                    <option>
                                        Masculino
                                    </option>
                                    <option>
                                        Femenino
                                    </option>
                                </select>
                                <span class="invalid-feedback"> Ingresa sexo</span>
                            </div>
                            <div class="form-group col-7 col-md-4">
                               <label for="mail">
                                   Mail
                               </label>
                               <input type="email" class="form-control" name="mail" id="mail" placeholder="ejemplo@ejemplo.com" required>
                               <span class="invalid-feedback"> Ingresa mail</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8 col-md-3 offset-md-1">
                                <label for="direccion">
                                    Calle:
                                </label>
                                <input class="form-control" name="dir" type="text" id="dir" placeholder="Calle" required>
                                <span class="invalid-feedback"> Ingresa calle</span>
                            </div>
                            <div class="form-group col-4 col-sm-2">
                                <label for="numero">
                                    Número:
                                </label>
                                <input class="form-control" name="numero" type="number" id="numero" placeholder="#" required>
                                <span class="invalid-feedback"> Ingresa número interior</span>
                            </div>
                            <div class="form-group col-xs-3 col-sm-2">
                                <label for="cp">
                                    CP:
                                </label>
                                <input class="form-control" name="cp" id="cp" type="number" min="0" placeholder="C.P" required>
                                <span class="invalid-feedback"> Ingresa código postal</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-3 offset-md-1">
                                <label for="colonia">
                                    Colonia:
                                </label>
                                <input class="form-control" name="colonia" id="colonia" type="text" placeholder="Colonia" required>
                                <span class="invalid-feedback">Ingresa colonia</span>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="estado">
                                    Estado:
                                </label>
                                <input class="form-control" name="estado" id="estado" type="text" placeholder="Estado" required>
                                <span class="invalid-feedback">Ingresa estado</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 col-3 offset-md-1">
                                <label for="tel">
                                    Teléfono:
                                </label>
                                <input class="form-control" name="tel" type="tel" id="tel" placeholder="Teléfono" required>
                                <span class="invalid-feedback">Ingresa teléfono</span>
                            </div>
                            <div class="form-group  col-3">
                                <label for="fechaI">
                                    Fecha Ingreso:
                                </label>
                                <input class="form-control" name="fechaI" type="date" id="fechaIngreso" placeholder="Fecha Ingreso" required>
                                <span class="invalid-feedback"> Ingresa fecha</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Datos de Sesión
                    </div>
                    <div class="card-body">
                        <div class="form-row justify-content-center">
                            <div class="form-group">
                                <label for="usr">
                                    Usuario:
                                </label>
                                <input class="form-control" name="usr" id="usr" type="text" placeholder="usuario" required>
                                <span class="invalid-feedback"> Ingresa un nombre de usuario</span>
                            </div>
                        </div>
                       <div class="form-row justify-content-center">
                            <div class="form-group">
                                <label for="psw1">
                                    contraseña:
                                </label>
                                <input class="form-control" name="psw" id="psw1" type="password" oninput="validaPsw()" placeholder="contraseña" 
                                required>
                                <span class="invalid-feedback"> Ingresa una contraseña</span>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group">
                                <label for="psw2">
                                    repite contraseña:
                                </label>
                                <input class="form-control" name="psw2" id="psw2" type="password" oninput="validaPsw()" placeholder="confirma contraseña" 
                                required>
                                <span class="invalid-feedback"> Verifica la contraseña</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="justify-content-center col-12">
                    <button class="btn btn-success" id="btnRegistrar" type="submit" value="Registrar">Registrar</button>
                </div>
            </form>
        </div>
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
            <script src="js/jquery.js"></script><!-- CÓDIGO DE BOOTSTRAP -->
            <script src="js/bootstrap.min.js"></script> <!-- CÓDIGO DE BOOTSTRAP -->
            <script src="js/popper.min.js"></script>
        
        
            <script>
                //VERSIONES SOPORTADAS CHROME 13.0, EXPLORER 10.0, FIREFOX 4.0 SAFARI 6.0 OPERA 12.1
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
                
            function validaPsw() {
                var x = document.getElementById("psw1").value;
                var y = document.getElementById("psw2").value;
                document.getElementById("btnRegistrar").disabled = !(y == x);
            }    
            </script>
    </body>
</html>
