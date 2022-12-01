<?php

require_once '/../clases/Pagina.php';
require_once '/../nusoap/nusoap.php';

$httpServer='localhost';
$dirWSAdmin='/goldenGlove/';
$namespace='urn:http://'.$httpServer.'/'.$dirWSAdmin.'/GoldenGlove/pagina/php/servicios/servicios.php';
$valido = true;

if(empty($httpServer)){
	$valido = false;
	throw new Exception('El nombre del servidor no se encuentra definido',2000001);
}
if(empty($dirWSAdmin)){
	$valido =false;
	throw new Exeption('El nombre del directorio no se encuetra definido',2000002);
}
if($valido){

	$server = new soap_server();
	$server->configureWSDL("prueba", $namespace);
	
	$server->register('prueba',
			array('categoria' => 'xsd:string'),
			array('return' => 'xsd:string'),
			$namespace,
			'#prueba',
			'rpc',
			'encoded',
			'hace una prueba de funcionamiento');

	$server->register('agregaContenido',
			array('nombrePag' => 'xsd:string',
					'titulo' => 'xsd:string',
					'contenido' => 'xsd:string',
					'posicion' => 'xsd:int'),
			array('return ' => 'xsd:int'),
			$namespace,
			'#agregaContenido',
			'rpc',
			'encoded',
			'Inserta un contenido en una pagina');
			
			
	
	$server->wsdl->addComplexType(  'datos_persona_entrada',
			'complexType',
			'struct',
			'all',
			'',
			array('cedula'              => array('name' => 'cedula','type' => 'xsd:string'),
					'nombre'              => array('name' => 'nombre','type' => 'xsd:string'),
					'FechaNacimiento'     => array('name' => 'FechaNacimiento','type' => 'xsd:string'))
			);
			
	// Parametros de Salida
	$server->wsdl->addComplexType(  'datos_persona_salida',
			'complexType',
			'struct',
			'all',
			'',
			array('mensaje'   => array('name' => 'mensaje','type' => 'xsd:string'))
			);
	
	
	$server->register(   'calculo_edades', // nombre del metodo o funcion
			array('datos_persona_entrada' => 'tns:datos_persona_entrada'), // parametros de entrada
			array('return' => 'tns:datos_persona_salida'), // parametros de salida
			$namespace, // namespace
			'#calculo_edades', // soapaction debe ir asociado al nombre del metodo
			'rpc', // style
			'encoded', // use
			'La siguiente funcion recibe un arreglo multidimensional de personas y calcula las Edades respectivas segun la fecha de nacimiento indicada' // documentation,
			//$encodingStyle
			);
	
			
			
			
	$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
	$server->service($POST_DATA);
			
			
}


function calculo_edades($datos) {

	$msg = '';
	// Recorro el arreglo de datos enviados
	foreach ($datos as $key => $value){

		$edad_actual = date('Y') - $value['FechaNacimiento'];
		$msg .= 'La edad de '. $value['nombre'] .' es:' . $edad_actual . ' anos ==== <br />';
	}
		
	return array('mensaje' => $msg);
}


function prueba($categoria){
	$ret = 'jja';
	
	if($categoria == 'prueba'){
		$ret = 'Esta es una prueba existosa';
	}
	else{
		$ret = 'No pertenece a una categoria prueba';
	}
	
	return $ret;
}

function agregaContenido($nombrePag,$titulo,$contenido,$posicion){
	$pag = new Pagina();

	$pag->consultaPagina($nombrePag);

	$pag->agregaCon($titulo,$contenido,$posicion);
	
	return $pag->getPaginaId();
}

function consultaPagina($nombrePagina){
    $pag = new Pagina($nombrePagina);
    
    //$pag->consultaPagina($nombrePagina);
    echo $pag->getPaginaId() . ' ';
    echo $pag->getNombre() . '<br/><br/>';
    foreach($pag->getContenidos() as $c){
        echo $c->getContenidoId() . ' ' .$c->getContenido() .' ' . $c->getTitulo() . ' ' . $c->getOrden();
        echo '<br/><br/>';
    }

}

/*
class servicios{
	
	
}
*/


/*
$pag = new Pagina();

$pag->consultaPagina('entrenamiento');
echo $pag->getPaginaId() . ' ';
echo $pag->getNombre() . '<br/><br/>';
 foreach($pag->getContenidos() as $c){
 	echo $c->getContenidoId() . ' ' .$c->getContenido() .' ' . $c->getTitulo() . ' ' . $c->getOrden();
 	echo '<br/><br/>';
 }
 
 echo '<br/><br/><br/><br/>';
 $pag->agregaContenido('prueba5','esta es otra insercion desde php',7);
 foreach($pag->getContenidos() as $c){
 	echo $c->getContenidoId() . ' ' .$c->getContenido() .' ' . $c->getTitulo() . ' ' . $c->getOrden();
 	echo '<br/><br/>';
 }
 */
 