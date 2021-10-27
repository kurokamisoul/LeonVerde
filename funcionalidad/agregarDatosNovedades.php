<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//echo '<script type=text/javascript>alert(entro a agregar datos);</script>';
include __DIR__ .'global/config.php';
include __DIR__ .'global/conexion.php';
include __DIR__ .'global/datos.php';

$id_libro=$_POST['id'];
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$archivo=$_POST['imagen'];
$imagen=$archivo;

$sql="INSERT INTO novedades(id_libro,titulo,descripcion,imagen)
 values (:id_libro,:titulo,:descripcion,:imagen);";

$query=$pdo->prepare($sql);
$query->bindParam(':id_libro',$id_libro,PDO::PARAM_INT);
$query->bindParam(':titulo',$titulo,PDO::PARAM_STR);
$query->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
$query->bindParam(':imagen',$imagen,PDO::PARAM_STR);



 if($query->execute()==true){
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
      // $resultado=$imagen;
        echo $resultado;
      }else{
        echo "<script type='text/javascript'>alert('Ocurrio un error! :(');</script>";
        $resultado=0;
        echo $resultado;
      }
?>