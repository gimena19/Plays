<?php

require_once __DIR__ . '/../conexion/Conexion.php';
require_once('Imagen.php');
require_once 'Contenido.php';
require_once 'Imagen.php';

class Pagina{
	private $paginaId;
	private $nombre;
	private $contenidos;
    private $imagenes;
    
    public function __construct($paginaId){
        $this->consultaPaginaXId($paginaId);
    }
    
	public function __contructor2($nombrePag){
		$this->consultaPagina($nombrePag);
	}
    
    private function consultaPaginaXId($paginaId){
        $res = null;
        
		try{
			$db = new Database();
		}
		catch(exception $ex){
			echo $ex->getMessage();
		}
		if($db->conectado){
			$res = $db->obtenerPaginaXid($paginaId);
			$res->bind_result($paginaId,$nombre);
			if($res->fetch()){
				$this->paginaId = $paginaId;
				$this->nombre = $nombre;
				
				$this->consultaContenido();
				$this->consultaImagenes();
			}
			$res->free_result();
			$res->close();
		}
		$db = null;
    }
	
	public function consultaPagina($pagina){
		$res = null;
		
		try{
			$db = new Database();
		}
		catch(exception $ex){
			echo $ex->getMessage();
		}
		if($db->conectado){
			$res = $db->obtenerPagina($pagina);
			$res->bind_result($paginaId,$nombre);
			if($res->fetch()){
				$this->paginaId = $paginaId;
				$this->nombre = $nombre;
				$this->consultaContenido();
				$this->consultaImagenes();
			}
			$res->free_result();
			$res->close();
		}
		$db = null;
	}
	
	public function consultaContenido()
	{
		$res = null;
		$db = new Database();
		
		if($db->conectado){
			$this->contenidos = array(); //Inicializa un arreglo nuevo
			$res = $db->contenidosPag($this->paginaId);
			$res->bind_result($contenidoId,$cont,$titulo,$orden,$fecha);
			while ($res->fetch()){
				 $contenido = new Contenido($contenidoId,$titulo,$cont,$this->paginaId,$orden,$fecha);
				 $this->contenidos[] = $contenido;
			}
			$res->free_result();
			$res->close();
		}
		$db = null;
	}
	
	public function consultaImagenes(){
		$res = null;
		$db= new DataBase();
		
		$this->imagenes = array();
		$res = $db->imagenesXPagina($this->paginaId);
		$res->bind_result($imagenId,$nombre,$contenidoId,$titulo,$cont,$orden,$fecha);
		
		while($res->fetch()){
			$contenido = new Contenido($contenidoId,$titulo,$cont,$this->paginaId,$orden,$fecha);
			
			$img  = new Imagen();
			$img->inicializaImagen($nombre,$contenido);
			$this->imagenes[] = $img;
		}
	}
    
    public function agregaContenido($titulo,$contenido){
        
        if($this->validaContenido($titulo,$contenido)){
            $db = new Database();
            if($db->conectado){
                if(!$db->insertaContenido($titulo,$contenido,$this->paginaId,count($this->contenidos)+1)){
                    throw new Exception('Error al agregar el contenido',10000);
                }
            }
        }
        else{
            throw new Exception('El título o contendido no deben estar en blanco',10000);
        }
        $db = null;
    }
    
    public function actualizaContenido($titulo,$contenido,$contenidoId){
        
        if($this->validaContenido($titulo,$contenido)){
            $db = new Database();
            if($db->conectado){
                if($db->actualizaContenido($titulo,$contenido,$contenidoId) <= 0){
                    throw new Exception('Error al actualizar el contenido',10000);
                }
            }
        }
        else{
            throw new Exception('El título o contenido no deben estar en blanco',10000);
        }
        $db = null;
    }
    
    private function validaContenido($titulo,$contenido){
        return $titulo != null || !ctype_space($titulo) || $contenido !=null || !ctype_space($contenido);
    }
    
    public function eliminaContenido($contenidoId){
        
        $db = new Database();
        if($db->conectado){
            if($db->eliminaContenido($contenidoId) <= 0){
                throw new Exception('Error al eliminar el contenido',10000);
            }
        }
        $db = null;
    }
	
	public function agregaImagen($imagen,$titulo,$contenido){
		$band = 0;
		
		$img = new Imagen();
	    try{
	        if($img->inicializaParametros($imagen)){
	            if($img->subeFoto($titulo,$contenido,$this->paginaId)){
	            	$band = 1;
	            }
	        }
	    }
	    catch(Exception $ex){
	        echo $ex->getMessage();
	    }
	    
	    return $band;
	}
	
    /*
	public function agregaCon($titulo,$contenido,$orden){
		
		$db = new Database();
		$id = 0;
		$contForm  = nl2br($contenido);
		if($db->conectado){
			if(!empty($this->paginaId)){
				$db->insertaContenido($contForm,$titulo,$this->paginaId,$orden);
				//$this->consultaContenido();
			}
		}
		$db = null;
		
	}
    */
	
	public function getPaginaId(){
		
		return $this->paginaId;
	}
	
	public function getNombre(){
	
		return $this->nombre;
	}
	
	//Regresa un arreglo de objetos de la clase Contenido
	public function getContenidos(){
		
		return $this->contenidos;
	}
	
	public function getImagenes(){
		return $this->imagenes;
	}
}
