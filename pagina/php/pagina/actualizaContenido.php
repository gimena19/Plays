<?php
require_once(__DIR__ . '/../clases/Pagina.php');
/*require_once '/../nusoap/nusoap.php';

$httpServer='localhost';
$dirWSAdmin='/goldenGlove/';//'
$puerto = ':8080';
$namespace='http://'.$httpServer.$puerto.'/goldenglove/GoldenGlove/pagina/php/servicios/servicios.php';
*/

if($_POST['titulo'] == null || $_POST['contenido'] == null || $_POST['contenidoId'] == null || $_POST['paginaId'] == null){
	//header('location:index.html');
	
	echo 'llenar los campos correctamente';
}
else {
    $sucees = null;
    session_start();
    if(isset($_SESSION['pagina'])){
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $contenidoId = $_POST['contenidoId'];
        $pagina = $_SESSION['pagina'];
        try{
            $pagina->actualizaContenido($titulo,$contenido,$contenidoId);
             echo "<script>alert('Se actualizó el contenido correctamente');";
            header('location:../../'. $pagina->getNombre() . '.php');
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }
}