<?php
require_once(__DIR__ . '/../clases/Pagina.php');
session_start();

if(!isset($_POST['contenidoId']) || $_POST['contenidoId'] ==null || !isset($_SESSION['pagina']) || $_SESSION['pagina'] == null){
    
    echo "<script>alert('Error al actualizar el contenido correctamente');";
    header('location:../../'. $pagina->getNombre() . '.php');
}
$pagina = $_SESSION['pagina'];
$contenidoId = $_POST['contenidoId'];
try{
    $pagina->eliminaContenido($contenidoId);
    echo "<script>alert('Se actualizó el contenido correctamente');";
}
catch(Exception $ex){
        echo $ex->getMessage();
    }
header('location:../../'. $pagina->getNombre() . '.php');

