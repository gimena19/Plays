<?php
require_once(__DIR__ . '/../config.php');

if(($_POST['nombre'] == null or ctype_space($_POST['nombre'])) or ($_POST['apellidoP'] == null or ctype_space($_POST['apellidoP'])) or ($_POST['apellidoM'] == null or ctype_space($_POST['apellidoM'])) or ($_POST['sexo'] == null or ctype_space($_POST['sexo'])) or ($_POST['mail'] == null or ctype_space($_POST['mail'])) or
($_POST['dir']== null or ctype_space($_POST['dir'])) or ($_POST['numero'] == null or ctype_space($_POST['numero'])) or ($_POST['cp'] == null or ctype_space($_POST['cp'])) or ($_POST['colonia'] == null or ctype_space($_POST['colonia'])) or ( $_POST['estado'] == null or ctype_space($_POST['estado'])) or ($_POST['tel'] == null or ctype_space($_POST['tel'])) or ($_POST['fechaI'] == null or ctype_space($_POST['fechaI'])) or ($_POST['usr'] == null or ctype_space($_POST['usr'])) or ($_POST['psw'] == null or ctype_space($_POST['psw'])))
{
    echo('Error de llenado');
//	header('location:../../login.php');
}
else{
    $nombre = $_POST['nombre'];
    $apellidoMat =  $_POST['apellidoM'];
    $apellidoPat = $_POST['apellidoP'];
    $sexo = $_POST['sexo'][0];
    $mail = $_POST['mail'];
    $calle = $_POST['dir'];
    $numeroInt = $_POST['numero'];
    $cp = $_POST['cp'];
    $colonia = $_POST['colonia'];
    $estado = $_POST['estado'];
    $telefono = $_POST['tel'];
    $fechaIng = $_POST['fechaI'];
    $usuario = $_POST['usr'];
	$psw = $_POST['psw'];
    $activo = 1;
    $tipoUsuarioId = 2;
    $fechaAlta = $fechaIng;
    
    try{
        mysqli_report(MYSQLI_REPORT_STRICT);
        $cnn = new mysqli(SRVDR,USR,PASS,DB);
        if($inserta = $cnn->prepare("INSERT INTO usuario(nombre,apellidoMat,apellidoPat,sexo,mail,calle,numeroInt,cp,colonia,estado,telefono,fechaIng,usuario,psw,activo,tipoUsuarioId,fechaAlta) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")){
            if(!$inserta->bind_param('sssssssssssssssss',$nombre,$apellidoMat,$apellidoPat,$sexo,$mail,$calle,$numeroInt,$cp,$colonia,$estado,$telefono,$fechaIng,$usuario,$psw,$activo,$tipoUsuarioId,$fechaAlta)){
            echo "Falló la vinculación de parámetros: ";
            }
            else{
                if (!$inserta->execute()) {
                    echo "Falló la ejecución: (" . $mysqli->errno . ") " . $mysqli->error;
                    $inserta->close();
                }
                else{
                    echo 'Se insertó el nuevo usuario';
                }
            }
        }
       }
    catch(Exception $ex){
        echo 'Error al conectar a la BD';
        exit;
    }
    finally{
        $cnn->close();
    }
    
    
    
//    
}
