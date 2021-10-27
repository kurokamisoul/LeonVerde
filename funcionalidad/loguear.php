<?php
include __DIR__.'/../global/config.php';
include __DIR__ .'/../global/conexion.php';
include __DIR__ .'/../global/datos.php';




session_start();



$usuario=$_POST["usuario"];
$password=$_POST["password"];
$sentencia=$pdo->prepare("SELECT count(*) as contar FROM usuarios where usuario='$usuario' and password='$password'");
$sentencia->execute();
$row=$sentencia->fetchAll(PDO::FETCH_ASSOC);
$numFila;
foreach($row as $fila){
$numFila=$fila['contar'];
}
if($numFila>0){
    $_SESSION['userName']=$usuario;
  header("location: ../dashboard.php");
}else{
 echo "Datos incorrectos";
}
    

?>