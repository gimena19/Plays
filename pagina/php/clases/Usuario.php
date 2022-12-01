<?php

class Usuario{
    public $usuarioId;
    public $nombre;
    public $apellidoMat;
    public $apellidoPat;
    public $sexo;
    public $correo;
    public $calle;
    public $numeroInt;
    public $cp;
    public $colonia;
    public $estado;
    public $telefono;
    public $fechaIng;
    public $usuario;
	public $psw;
    public $activo;
    public $tipoUsuarioId;
    public $fechaAlta;
    
    
    public function __construct(){
    }
    
    public function consulta($usuario,$psw){
        
        try {
            mysqli_report(MYSQLI_REPORT_STRICT);
            $cnn = new mysqli(SRVDR,USR,PASS,DB);
            if($consulta = $cnn->prepare('select * from usuario WHERE usuario = ? and psw = ? LIMIT 1')){
                $consulta->bind_param('ss',$usuario,$psw);
                $consulta->execute();
                $res = $consulta->get_result();
                $fila = $res->fetch_assoc();
                $this->usuarioId = $fila['usuarioId'];
                $this->nombre = $fila['nombre'];
                $this->apellidoMat = $fila['apellidoMat'];
                $this->apellidoPat = $fila['apellidoPat'];
                $this->sexo = $fila['sexo'];
                $this->correo = $fila['mail'];
                $this->calle = $fila['calle'];
                $this->numeroInt = $fila['numeroInt'];
                $this->cp = $fila['cp'];
                $this->colonia = $fila['colonia'];
                $this->estado = $fila['estado'];
                $this->telefono = $fila['telefono'];
                $this->fechaIng = $fila['fechaIng'];
                $this->usuario = $fila['usuario'];
                $this->psw = $fila['psw'];
                $this->activo = $fila['activo'];
                $this->tipoUsuarioId = $fila['tipoUsuarioId'];
                $this->fechaAlta = $fila['fechaAlta'];
                $consulta->free_result();
                $consulta->close();
            }
            else {
                echo 'error en la consulta';
            }
        }
        catch(exception $ex){
            echo $ex->message;
        }
    }
    
    public function esAdmin(){
        return $this->tipoUsuarioId == 1;
    }

    public function getNombreCompleto(){
        return $this->nombre . ' ' . $this->apellidoPat . ' ' . $this->apellidoMat;
    }

    public function getsexo(){
        return $this->sexo;
    }
    
    public function correo(){
        return $this->correo;
    }
    
    public function getDirCompleta(){
        return $this->calle . '#' . $this->numeroInt;
    }
    
    public function getCp(){
        return $this->cp;
    }
    
    public function getColonia(){
        return $this->colonia;
    }
    
    public function getEstado(){
        return $this->estado;
    }
    
    public function getTelefono(){
        return $this->telefono;
    }
    
    public function getFechaIngreso(){
        return $this->fechaIng;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function getActivo(){
        return $this->activo;
    }
    
    public function getFechaAlta(){
        return $this->fechaAlta;
    }

}
