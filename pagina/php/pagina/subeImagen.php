<?php
require_once(__DIR__ . '/../clases/Pagina.php');
session_start();
$imagen = $_FILES['imagen'];
if(isset($imagen)){
    if(isset($_SESSION['pagina'])){
        $pagina = $_SESSION['pagina'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['desc'];
        if(!$pagina->agregaImagen($imagen,$titulo,$contenido)){
            echo '<br>Error al subir imagen';
        }
        else{
            header('location:../../'. $pagina->getNombre() . '.php');
        }
    }
    
}
else{
    echo 'Error, la imagen no esta asociada';
}