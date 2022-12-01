<?php
require_once __DIR__ . '/../conexion/Conexion.php';
require_once 'Contenido.php';

class Imagen{
    //Extensiones válidas
    private $extenValidas;
    //ancho máximo
    private $maxWidth;
    //Alto máximo
    private $maxHeight;
    //peso máximo en bytes
    private $tam;
    //imagen
    private $img;
    //Carpeta donde se encuentran las imagenes
    private $carpeta;
    //almacena el titulo y la descripcion
    private $contenido;
    //Nombe de la foto subida
    private $nombre;
    
    public function __construct(){
    
    $this->extenValidas = array("image/jpg","image/jpeg","image/png","image/gif","image/bmp");
    $this->maxWidth = 1024;
    $this->maxHeight = 720;
    $this->tam = 20000000;
    $this->carpeta = __DIR__ .'/../../galeria/';
    }
    
    public function __construct2($img){
        
        $this->__construct();
        $this->inicializaParametros($img);
    }
    
    public function inicializaImagen($nombre,$contenido){
        
        $this->__construct();
        $this->nombre = $nombre;
        $this->contenido = $contenido;
        
    }
    
    public function inicializaParametros($imagen){
        $band = 0;
        //Verifica que el archivo no exceda el tamaño especificado
        
        $this->verificaError($imagen,$imagen['error']);
        $this->verificaDimensiones($imagen);
        $this->img = $imagen;
        $band = 1;
        
        return $band;
    }
    
    private function verificaError($img, $codigoError){
        if(!$this->validaExtension($img)){ // Verifica que el archivo sea una imagen
            throw new Exception(utf8_encode("Archivo no valido " . $img['type']),'90000' );
        }
        if($img['size'] > $this->tam){ //Veriifica el tamaño en bytes de la imagen
            throw new Exception("El tamaño del archivo excede al permitido");
        }
        switch($codigoError){
            case 1:
            case 2:
                throw new Exception("El archivo excede el tamaño especificado",$codigoError . '0000');
            break;
            case 3:
                throw new Exception("El archivo no se pudo subir cumpletamente",$codigoError . '0000');
            break;
            case 4:
                throw new Exception("No se subió el archivo",$codigoError . '0000');
            break;
            case 6:
                throw new Exception("No existe la carpeta temporal en el servidor",$codigoError .'0000');
            break;
            case 7:
                throw new Exception("Error al escribir archivo en disco", $codigoError . '0000');
            break;
            case 8:
                throw new Exception("Una extensión de PHP bloqueó el proceso",$codigoError. '0000');
            break;
        }
    }
    
    private function validaExtension($img){
        return in_array(strtolower($img['type']),$this->extenValidas);
    }
    
    private function verificaDimensiones($img){
        $imageAttr = getimagesize($img['tmp_name']);
        
        if($imageAttr['width'] > $this->maxWidth){
            throw new Exception("El ancho de la imagen es mayor a lo permitido",'10001');
        }
        if($imageAttr['height'] > $this->maxHeight){
            throw new Exception("El alto de la imagen es mayor a lo permitido", '10002');
        }
    }
    
    public function subeFoto($titulo,$contenido,$paginaId){
        $band = 0;
        $ruta = $this->carpeta . $this->img['name'];
        
        if(move_uploaded_file($this->img['tmp_name'],$ruta)){
            $band = $this->subeFotoBD($this->img['name'],$paginaId,$titulo,$contenido);
        }
        
        return $band;
    }
    
    private function subeFotoBD($linkImagen,$paginaId,$titulo,$descipcion){
        $db;
        $band = 0;
        
        try{
            $db = new Database();
            $band = $db->subeImagen($linkImagen,$paginaId,$titulo,$descipcion);
             unset($db);
        }
        catch(Exception $ex){
            echo $ex->getMessage;
        }
        
        return $band;
    }
    
    public function getRuta(){
        return $this->nombre;
    }
    
    public function getTitulo(){
        
        return $this->contenido->getTitulo();
    }
    
    public function getDescripcion(){
        
        return $this->contenido->getContenido();
    }
}