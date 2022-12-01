<div class="modal fade" id="modalAltaUsuario" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id ="tituloModal">
                    Alta de usuario
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id= "formUsuario" novalidate method="POST" action="php/pagina/validaUsuario.php">
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
                                <div class="form-group col-12 col-md-3 offset-md-1">
                                    <label for="sexo">
                                            Sexo:
                                    </label>
                                    <select class="form-control" id="listaSexo" name="sexo" required>
                                        <option value ='M'>
                                            Masculino
                                        </option>
                                        <option value ='F'>
                                            Femenino
                                        </option>
                                    </select>
                                    <span class="invalid-feedback"> Ingresa sexo</span>
                                </div>
                                <div class="form-group col-12 col-md-4">
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
                                    <input class="form-control" name="cp" id="cp" type="number" placeholder="C.P" required>
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
                                <div class="form-group col-12 col-md-4 offset-md-1">
                                    <label for="tel">
                                        Teléfono:
                                    </label>
                                    <input class="form-control" name="tel" type="tel" id="tel" placeholder="Teléfono" required>
                                    <span class="invalid-feedback">Ingresa teléfono</span>
                                </div>
                                <div class="form-group  col-12 col-md-4">
                                    <label for="fechaI">
                                        Fecha Ingreso:
                                    </label>
                                    <input class="form-control" name="fechaI" type="date" id="fechaIngreso" placeholder="Fecha Ingreso" required>
                                    <span class="invalid-feedback"> Ingresa fecha</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="datosSesion">
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
                    <div class="form-row">
                        <div class="col-8">
                            <button class="btn btn-success" id="btnRegistrar" type="submit" name="usuarioId" value="">Registrar</button>
                        </div>
                        <div class="col-4">
                            <div class="form-group" id="groupEsAdmin">
                                <input name="esAdmin" type="checkbox" id="admin">
                                <label for="admin">Es Administrador?</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

