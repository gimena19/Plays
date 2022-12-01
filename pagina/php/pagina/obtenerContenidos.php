<?php
require_once '/../nusoap/nusoap.php';
require_once 'dirWs.php';


$cliente = new nusoap_client($namespace,false);
$error = $cliente->getError();
if($error){
    echo 'Error al iniciar ws cliente ' . $error;    
}
else{
    $res = $cliente->call();
}