<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//echo '<script type=text/javascript>alert(entro a agregar datos);</script>';
include __DIR__ .'global/config.php';
include __DIR__ .'global/conexion.php';
include __DIR__ .'global/datos.php';


/*
$_POST['titulo'];
$_POST['autor'];
$_POST['descripcion'];
$_POST['isbn'];
$_POST['editorial'];
$_POST['edicion'];
$_POST['piezas'];
$_POST['precio'];
$_POST['paginas'];
$_POST['imagen'];
*/


 /* $archivo="";
  $titulo="";
$autor="";
$descripcion="";
$isbn="";
$editorial="";
$edicion="";
$paginas="";
$piezas="";
$imagen="";
$numero_paginas="";
$precio="";
$fecha_alta=""; 
*/
$id_libro=$_POST['id_libro'];
$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$descripcion=$_POST['descripcion'];
$isbn=$_POST['isbn'];
$editorial=$_POST['editorial'];
$edicion=$_POST['edicion'];
$paginas=$_POST['paginas'];
$piezas=$_POST['piezas'];
$archivo=$_POST['imagen'];
/*$archivo=$_FILES[$_POST['imagen']]['name'];*/
if (isset($_POST['imagen'])) {
  //Recogemos el archivo enviado por el formulario
 // $archivo = $_FILES['imagen']['name'];
  $archivo=$_POST['imagen'];
}
$imagen=$archivo;
$numero_paginas=$_POST['paginas'];
$precio=$_POST['precio'];


/*
if (isset($_POST['archivo'])) {
  //Recogemos el archivo enviado por el formulario
  $archivo = $_FILES['archivo']['name'];
}*/
$fecha_alta=date("Y-m-d H:i:s");   

$sql="UPDATE libros SET piezas= :piezas, precio= :precio, titulo= :titulo, autor= :autor, descripcion= :descripcion, isbn= :isbn,
 editorial= :editorial, edicion= :edicion, numero_paginas= :numero_paginas, imagen= :imagen WHERE id_libro= :id_libro;";


 
if($piezas!=''){
  $piezas=$_POST['piezas'];
}else{$piezas=1;}
if($precio!=''){
  $precio=$_POST['precio'];
}else{$precio=1;}
if($titulo!=''){
  $titulo=$_POST['titulo'];
}else{ $titulo="Sin titulo";}
if($autor!=''){
  $autor=$_POST['autor'];
}else{$autor="Sin autor";}
if($descripcion!=''){
  $descripcion=$_POST['descripcion'];
}else{$descripcion="Sin descripcion";}
if($isbn!=''){
  $isbn=$_POST['isbn'];
}else{$isbn="Sin ISBN";}
if($editorial!=''){
  $editorial=$_POST['editorial'];
}else{$editorial="Sin editorial";}
if($edicion!=''){
  $edicion=$_POST['edicion'];
}else{$edicion="Sin edicion";}
if($numero_paginas!=''){
  $paginas=$_POST['paginas'];
}else{$paginas=1;}
if($imagen!=''){
 $imagen="C:/xampp/htdocs/Tienda/imagenesL/".$archivo;
}else{$imagen="Sin imagen";}

//echo "<script type='text/javascript'>alert('$sql');</script>";
$query=$pdo->prepare($sql);
/*$query->bindParam(':id_libro',$id_libro,PDO::PARAM_INT);
$query->bindParam(':piezas',$piezas,PDO::PARAM_INT);
$query->bindParam(':precio',$precio,PDO::PARAM_INT);
$query->bindParam(':titulo',$titulo,PDO::PARAM_STR);
$query->bindParam(':autor',$autor,PDO::PARAM_STR);
$query->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
$query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
$query->bindParam(':editorial',$editorial,PDO::PARAM_STR);
$query->bindParam(':edicion',$edicion,PDO::PARAM_STR);
$query->bindParam(':numero_paginas',$numero_paginas,PDO::PARAM_INT);
$query->bindParam(':imagen',$imagen,PDO::PARAM_STR);
$query->bindParam(':fecha_alta',$fecha_alta,PDO::PARAM_STR);*/

$query->bindValue(':id_libro',$id_libro,PDO::PARAM_INT);
$query->bindValue(':piezas',$piezas,PDO::PARAM_INT);
$query->bindValue(':precio',$precio,PDO::PARAM_INT);
$query->bindValue(':titulo',$titulo,PDO::PARAM_STR);
$query->bindValue(':autor',$autor,PDO::PARAM_STR);
$query->bindValue(':descripcion',$descripcion,PDO::PARAM_STR);
$query->bindValue(':isbn',$isbn,PDO::PARAM_STR);
$query->bindValue(':editorial',$editorial,PDO::PARAM_STR);
$query->bindValue(':edicion',$edicion,PDO::PARAM_STR);
$query->bindValue(':numero_paginas',$numero_paginas,PDO::PARAM_INT);
$query->bindValue(':imagen',$imagen,PDO::PARAM_STR);
//$query->bindValue(':fecha_alta',$fecha_alta,PDO::PARAM_STR);

 //if($query->execute()==true && $query->rowCount() > 0){
  if($query->execute()==true){
 // if($id_libro!=''){
        //Si se quiere subir una imagen
        if (isset($_POST['guardar'])) {
          //Recogemos el archivo enviado por el formulario
          $archivo = $_FILES['archivo']['name'];
          //Si el archivo contiene algo y es diferente de vacio
          if (isset($archivo) && $archivo != "") {
             //Obtenemos algunos datos necesarios sobre el archivo
             $tipo = $_FILES['archivo']['type'];
             $tamano = $_FILES['archivo']['size'];
             $temp = $_FILES['archivo']['tmp_name'];
             //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
               echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
               - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
            }
            else {
               //Si la imagen es correcta en tamaño y tipo
               //Se intenta subir al servidor
               if (move_uploaded_file($temp, 'C:/xampp/htdocs/Tienda/imagenesL/'.$archivo)) {
                   //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                   chmod('C:/xampp/htdocs/Tienda/imagenesL/'.$archivo, 0777);
                   //Mostramos el mensaje de que se ha subido co éxito
                  // echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                   //Mostramos la imagen subida
                  // echo '<p><img src="C:/xampp/htdocs/Tienda/imagenesL/.$archivo"></p>';
               }
               else {
                  //Si no se ha podido subir la imagen, mostramos un mensaje de error
                 // echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
               }
             }
          }
        }
       // "<script type='text/javascript'>alert('Registro guardado con exito!');</script>";
       $resultado=1;
       //$resultado=$numero_paginas;
        echo $resultado;
      }else{
        echo "<script> alert('".$query->errorInfo()."'); </script>";
      //  print_r($query->errorInfo()); 
        $resultado=0;
        echo $resultado;
      }
?>