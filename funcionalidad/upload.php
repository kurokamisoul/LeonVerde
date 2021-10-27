<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//echo '<script type=text/javascript>alert(entro a agregar datos);</script>';
include __DIR__ .'global/config.php';
include __DIR__ .'global/conexion.php';
include __DIR__ .'global/datos.php';
if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/gif")) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "C:/xampp/htdocs/Tienda/imagenesL/".$_FILES['file']['name'])) {
            //more code here...
///////////////////////

$sentencia=$pdo->prepare("SELECT id_libro FROM libros order by id_libro desc limit 1");


$sentencia->execute();
$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);



foreach($listaProductos as $libro){
 $id=$libro ['id_libro'];}
  ////////////////////////////////////          
            $archivo = "C:/xampp/htdocs/Tienda/imagenesL/".$_FILES['file']['name'];
            $sql="UPDATE libros SET imagen= :imagen WHERE id_libro= :id_libro;";
            $query=$pdo->prepare($sql);
            $query->bindParam(':id_libro',$id,PDO::PARAM_INT);
            $query->bindParam(':imagen',$archivo,PDO::PARAM_STR);
            $query->execute();


            echo "C:/xampp/htdocs/Tienda/imagenesL/".$_FILES['file']['name'];
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
} else {
    echo 0;
}