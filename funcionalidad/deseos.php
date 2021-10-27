<?php
if (!isset($_SESSION)){
    session_start();
}
$mensaje="";

if(isset($_POST['btnAccionD'])){
switch($_POST['btnAccionD']){
    case 'Agregar':
        
        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    $mensaje.="Ok ID correcto...".$ID."</br>";
        }else{
            $mensaje.="Upsss ID incocorrecto...".$ID; 
        }
        if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
            $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
            $mensaje.="Ok Nombre correcto...".$NOMBRE."</br>";
        }else{ 
             $mensaje.="Upsss algo pasa con el nombre..."; 
            }

        if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
            $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
            $mensaje.="Ok Cantidad correcto...".$CANTIDAD."</br>";
        }else{
             $mensaje.="Upsss algo pasa con la cantidad..."; 
            }
        if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
            $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
            $mensaje.="Ok Precio correcto...".$PRECIO."</br>";
        }else{
             $mensaje.="Upsss algo pasa con el precio..."; 
            }

            if(!isset($_SESSION['DESEOS'])){
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO                
                );
                $_SESSION['DESEOS'][0]=$producto;
                $mensaje="Producto agregado al carrito";
            }else{
                $idProductos=array_column($_SESSION['DESEOS'],"ID");
              if(in_array($ID,$idProductos)){
                 echo "<script>alert('El producto ya a sido seleccionado...')</script>";
                 $mensaje="";
              }else{
                $NumeroProductos=count($_SESSION['DESEOS']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO                
                );
                $_SESSION['DESEOS'][$NumeroProductos]=$producto;
                $mensaje="Producto agregado al carrito";
              }
            }
            //$mensaje=print_r($_SESSION,true);
        

        break;

     case 'Eliminar' :
        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
            $ID=openssl_decrypt($_POST['id'],COD,KEY);

            foreach($_SESSION['DESEOS'] as $indice=>$producto){
                if($producto['ID']==$ID){
                    unset($_SESSION['DESEOS'][$indice]);
                    echo "<script>alert('Elemento borrado...');</script>";
                }

            }

        }else{

        }
        break;  
}
}

?>