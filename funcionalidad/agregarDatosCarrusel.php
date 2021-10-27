<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//echo '<script type=text/javascript>alert(entro a agregar datos);</script>';
include __DIR__ .'global/config.php';
include __DIR__ .'global/conexion.php';
include __DIR__ .'global/datos.php';

$nombre=$_POST['nombre'];
$archivo=$_POST['imagen'];
$imagen=$archivo;

$sql="INSERT INTO carrusel(nombre,imagen)
 values (:nombre,:imagen);";

$query=$pdo->prepare($sql);
$query->bindParam(':nombre',$nombre,PDO::PARAM_STR);
$query->bindParam(':imagen',$imagen,PDO::PARAM_STR);



 if($query->execute()==true){

       // "<script type='text/javascript'>alert('Registro guardado con exito!');</script>";
       $resultado=1;
      // $resultado=$imagen;
        echo $resultado;
      }else{
        echo "<script type='text/javascript'>alert('Ocurrio un error! :(');</script>";
        $resultado=0;
        echo $resultado;
      }
?>