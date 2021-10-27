<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include __DIR__ .'global/config.php';
include __DIR__ .'global/conexion.php';
include __DIR__ .'global/datos.php';

$id_libro=$_POST['id_libro'];

$sql="DELETE FROM novedades WHERE id_libro= :id_libro;";


$query=$pdo->prepare($sql);

$query->bindParam(':id_libro',$id_libro,PDO::PARAM_INT);

 if($query->execute()==true){
       $resultado=1;
        echo $resultado;
      }else{
        echo "<script type='text/javascript'>alert('Ocurrio un error! :(');</script>";
        $resultado=0;
        echo $resultado;
      }
?>