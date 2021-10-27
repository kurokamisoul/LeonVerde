<?php 
include 'global/config.php';
include 'global/conexion.php';
include 'funcionalidad/carrito.php';
include 'funcionalidad/deseos.php';
include 'templates/cabecera.php';
include 'templates/buscador.php';
include 'templates/carrusel.php';

if($_POST){
    $total=0;
    $SID=session_id();
    $correo=$_POST['email'];
    $telefono=$_POST['telefono'];
    $nombre=$_POST['nombre'];
    foreach($_SESSION['CARRITO'] as $indice=>$producto){
    
     $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

    }
    /*
   $sentencia=$pdo->prepare("INSERT INTO ventas (ClaveTransaccion,PayPalDatos,Fecha,Correo,Total,Status)
                                          values(:ClaveTransaccion,'',NOW(),:Correo,:Total,'pendiente');");
   $sentencia->bindParam(":ClaveTransaccion",$SID);
   $sentencia->bindParam(":Correo",$correo);
   $sentencia->bindParam(":Total",$total);
   $sentencia->execute();
*/

$id_orden=0;
   $sentencia=$pdo->prepare("INSERT INTO ordenes (cliente,correo,telefono,total,fechaOrden) 
   values(:cliente,:correo,:telefono,:total,NOW())");
$sentencia->bindParam(":cliente",$nombre);
$sentencia->bindParam(":correo",$correo);
$sentencia->bindParam(":telefono",$telefono);
$sentencia->bindParam(":total",$total);
$sentencia->execute();




$sentencia=$pdo->prepare("SELECT id_orden FROM ordenes order by id_orden desc limit 1");


$sentencia->execute();
$listaOrden=$sentencia->fetchAll(PDO::FETCH_ASSOC);
if($sentencia->rowCount()>0){
foreach($listaOrden as $orden){
$id_orden=$orden ['id_orden'];
}
}


foreach($_SESSION['CARRITO'] as $indice=>$producto){
    
    $sentencia=$pdo->prepare("INSERT INTO detalle_orden (id_orden,id_libro,piezas_libro)
    values(:id_orden,:id_libro,:piezas_libro);");
 $sentencia->bindParam(":id_orden",$id_orden);
 $sentencia->bindParam(":id_libro",$producto['ID']);
 $sentencia->bindParam(":piezas_libro",$producto['CANTIDAD']);
 $sentencia->execute();





   }

}
//$_SESSION['CARRITO'].session_destroy();
unset($_SESSION['CARRITO']);
echo "<h3>El numero de su orden es:".$id_orden."</h3>";

include 'templates/pie.php'
?>