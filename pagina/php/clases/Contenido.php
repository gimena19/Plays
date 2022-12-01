<?php
require_once __DIR__ . '/../conexion/Conexion.php';

class Contenido{
	private $contenidoId;
	private $titulo;
	private $contenido;
	private $orden;
    private $paginaId;
    private $fecha;

	public function __construct($contenidoId,$titulo,$contenido,$paginaId,$orden, $fecha){
		$this->contenidoId = $contenidoId;
		$this->contenido = $contenido;
		$this->titulo = $titulo;
		$this->orden = $orden;
        $this->paginaId = $paginaId;
        $this->fecha = $fecha;
	}
	
	public function __construct3($titulo,$contenido,$orden){
		$this->contenido = $contenido;
		$this->titulo = $titulo;
		$this->orden = $orden;
	}
    
	public function actualizaContenido(){
		$db;
		$cantAct = 0;
		
		if(!empty($this->contenidoId)){
			$db = new Database();
			if($db->conectado){
				$cantAct = $db->actualizaContenido($this);
			}
            unset($db);
		}
		else{
			throw new Exception('No existe una referencia para esta entrada',10000);
            unset($db);
		}
		
		return $cantAct;
	}
	
	public function getContenido(){
		
		return $this->contenido;
	}
	
	public function getTitulo(){
		
		return $this->titulo;
	}
	
	public function getOrden(){
		
		return $this->orden;
	}
	
	public function getContenidoId(){
		
		return $this->contenidoId;
	}
    
    public function getFecha(){
		
		return $this->fecha;
	}
	
}