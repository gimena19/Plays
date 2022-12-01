<?php 

require_once '/../clases/pagina.php';

$testo = 'prueba
con
salto
de
pagina


aqui';

echo $testo;

$contForm  = nl2br($testo);

echo $contForm;

?>