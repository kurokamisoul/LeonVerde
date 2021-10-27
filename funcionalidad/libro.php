<?php
if (!isset($_SESSION)){
    session_start();
}
$mensaje="";

if(isset($_POST['btnAccionL'])){
switch($_POST['btnAccionL']){
    case 'AgregarBuscar':
        
        if(is_numeric(openssl_decrypt($_POST['Id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['Id'],COD,KEY);
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
       

            if(!isset($_SESSION['LIBRO'])){
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE
                                  
                );
                $_SESSION['LIBRO'][0]=$producto;
                $mensaje="Producto agregado al carrito";
            }else{
              
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE
                                  
                );
                $_SESSION['LIBRO'][0]=$producto;
                $mensaje="Producto agregado al carrito";
              
            }
            //$mensaje=print_r($_SESSION,true);
        

        break;

     case 'Eliminar' :
        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
            $ID=openssl_decrypt($_POST['id'],COD,KEY);

            foreach($_SESSION['LIBRO'] as $indice=>$producto){
                if($producto['ID']==$ID){
                    unset($_SESSION[']LIBRO'][$indice]);
                    echo "<script>alert('Elemento borrado...');</script>";
                }

            }

        }else{

        }
        break;  
}
}

?>