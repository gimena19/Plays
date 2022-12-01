function actualizaCont(contenidoId) {
    var contenido = document.getElementById("E" + contenidoId);
    var formTitulo = document.getElementById("titulo");
    var formContenido = document.getElementById("contenido");
    
    document.getElementById("tituloModal").innerHTML = "Editar contenido";
    document.getElementById("formContenido").action = "php/pagina/actualizaContenido.php";
    document.getElementById("modalButton").innerHTML = "Actualizar";
    document.getElementById("modalButton").value = contenidoId;
    formTitulo.value = contenido.getElementsByTagName("h2")[0].innerHTML.trim();
    formContenido.value = contenido.getElementsByTagName("p")[0].innerHTML.trim().replace(/<br\s*\/?>/mg,"\n");
}

function agregaCont() {
    document.getElementById("tituloModal").innerHTML = "Agregar contenido";
    document.getElementById("modalButton").innerHTML = "Publicar";
    //document.getElementById("modalButton").value = contenidoId;
    document.getElementById("titulo").value = "";
    document.getElementById("contenido").value = "";
    document.getElementById("formContenido").action = "php/pagina/agregaContenido.php";
}

function eliminaContenido(contenidoId){
    document.getElementById("contenidoId").value=contenidoId;
}

function altaUsuario() {
    document.getElementById("groupEsAdmin").style.display = 'none';
    document.getElementById("datosSesion").style.display = 'block';
    document.getElementById("nombre").value = "";
    document.getElementById("apellidoP").value = "";
    document.getElementById("apellidoM").value = "";
    document.getElementById("mail").value = "";
    document.getElementById("dir").value = "";
    document.getElementById("numero").value = "";
    document.getElementById("cp").value = "";
    document.getElementById("colonia").value = "";
    document.getElementById("estado").value = "";
    document.getElementById("tel").value = "";
    document.getElementById("fechaIngreso").value = "";
    document.getElementById("tituloModal").innerHTML = "Registrar usuario";
    document.getElementById("formUsuario").action = "php/pagina/validaUsuario.php";
    document.getElementById("btnRegistrar").innerHTML = "Registrar";
    document.getElementById("btnRegistrar").value = "";
    document.getElementById("admin").checked = false;
    document.getElementById("usr").required = true;
    document.getElementById("psw1").required = true;
    document.getElementById("psw2").required = true;
}

function editaUsuario(usuarioId) {
    
    var nombre = document.getElementById("nombreU" + usuarioId).value.split("+");
    var sexo = document.getElementById("sexo" + usuarioId).innerHTML.trim();
    var mail = document.getElementById("mailU" + usuarioId).innerHTML;
    var calle = document.getElementById("dirU" + usuarioId).innerHTML.split("#");
    var cp = document.getElementById("cpU" + usuarioId).innerHTML;
    var col = document.getElementById("coloniaU" + usuarioId).innerHTML;
    var estado = document.getElementById("estadoU" + usuarioId).innerHTML;
    var tel = document.getElementById("telU" + usuarioId).innerHTML;
    var fechaIng = document.getElementById("fechaIngresoU" + usuarioId).innerHTML;
    var esAdmin = document.getElementById("esAdmin" + usuarioId).getAttribute("data-admin");
    
    document.getElementById("groupEsAdmin").style.display = 'inline-block';
    document.getElementById("datosSesion").style.display = 'none';
    document.getElementById("nombre").value = nombre[0];
    document.getElementById("apellidoP").value = nombre[1];
    document.getElementById("apellidoM").value = nombre[2];
    document.getElementById("listaSexo").value = sexo;
    document.getElementById("mail").value = mail.trim();
    document.getElementById("dir").value = calle[0].trim();
    document.getElementById("numero").value = calle[1].trim();
    document.getElementById("cp").value = cp.trim();
    document.getElementById("colonia").value = col.trim();
    document.getElementById("estado").value = estado.trim();
    document.getElementById("tel").value = tel.trim();
    document.getElementById("fechaIngreso").value = fechaIng.trim();
    document.getElementById("tituloModal").innerHTML = "Editar usuario";
    document.getElementById("formUsuario").action = "php/pagina/actualizaUsuario.php";
    document.getElementById("btnRegistrar").innerHTML = "Actualizar";
    document.getElementById("admin").checked = esAdmin == 1 ? true : false;
    document.getElementById("btnRegistrar").value = usuarioId;
    document.getElementById("usr").required = false;
    document.getElementById("psw1").required = false;
    document.getElementById("psw2").required = false;
}
