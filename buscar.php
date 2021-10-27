<?php 
include 'global/config.php';
include 'global/conexion.php';
include 'global/datos.php';
include 'funcionalidad/carrito.php';
include 'funcionalidad/deseos.php';
include 'templates/cabecera.php';
include 'templates/buscador.php';
include 'templates/carrusel.php';
?>
<div class="container-ls" style="background-color:#317535!important; " >
<div class="container" style="background-color:#317535!important; " >
    <br>
    <?php 
     $dato="";
    if ( isset($_POST['DatoBuscar']))
    {
        
        $dato=$_POST['DatoBuscar'];
        $datoConsulta=$_POST['DatoBuscar'];
    }else{
        $dato= $_SESSION['LIBRO'][0]->NOMBRE;
    }
    if($mensaje!=""){?>
    <div class="alert alert-success">
  
    <?php echo($mensaje); ?>
    <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
    </div>
     <?php }?>
     <FONT SIZE=8  COLOR="white"><b><h1 class=" text-center"><strong>Resultados de la busqueda de: <?php echo $dato;?></strong></h1></b></FONT>
     <br>
     <br>
    <div class="row" >

        <?php
        //$dato=$_POST['DatoBuscar'];
    
            $sentencia=$pdo->prepare("SELECT * FROM libros where titulo like '%$dato%' or autor like '%$dato%' or ISBN like '%$dato%'");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            if($sentencia->rowCount()>0){
           // print_r($listaProductos);
        ?>
        <!-- instruccion para crear las tarjetas de los productos con la informacion directa de la bd-->
        <?php foreach($listaProductos as $producto){?>
   <!--template del libro-->
   <div class="col-3" style="margin-bottom:20px;">
             <div class="card" style="background-color:#317535!important; border: none">
             <!--datos para crear el popover-->
             <FONT   COLOR="white"><strong>
                 <img 
                 title=<?php echo $producto['Titulo'];?> 
                 alt=<?php echo $producto['Titulo'];?> 
                 class="card-img-top" 
                 src="<?php echo $producto['Imagen'];?>" 
                 data-toggle="popover"
                 data-trigger="hover"
                 data-content="<?php echo $producto['Descripcion'];?>"
                 height="317px"
                 >
                <!--fin datos popover-->
                 <div class="card-body">
                    <span><?php echo $producto['Titulo'];?> </span>
                     <h5 class="card-title">$<?php echo $producto['Precio'];?></h5>
                     </strong>
                     <p class="card-text"><?php echo substr($producto['Descripcion'],0,100)."..." ;?></p>
                           
                     <form action="detallesLibro.php" method="post" style="display:inline">

<input type="hidden" name="Id" id="id" value="<?php echo openssl_encrypt($producto['Id_libro'],COD,KEY) ;?>">


<button class="btn " 
name="btnAccionL" 
value="AgregarBuscar" 
type="submit"
style="background-color:#ffe161!important;"
>
<b>Más ></b>
</button>

</form>

                        <form action="" method="post" style="display:inline">

                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['Id_libro'],COD,KEY) ;?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Titulo'],COD,KEY) ;?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY) ;?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY) ;?>">

                        <button class="btn" 
                     name="btnAccionD" 
                     value="Agregar" 
                     type="submit"
                     style="background-color:#ffe161!important;">
                     <b><img src="archivos/corazon.png" alt="x" width="24px" /></b>
                     </button>
                        
                        </form>

                        <form action="" method="post" style="display:inline">

                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['Id_libro'],COD,KEY) ;?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Titulo'],COD,KEY) ;?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY) ;?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY) ;?>">

                        <button class="btn " 
                        name="btnAccion" 
                        value="Agregar" 
                        type="submit"
                        style="background-color:#ffe161!important;">
                        <b><img src="archivos/carrito.png" alt="x" width="24px" /></b>
                        </button>

</form>


                 </div>
             </div>
        
        </font>
         </div>
       <!--fin template del libro-->

            <?php } 
            }else{
                $mensaje="No hay libros con el criterio de busqueda! ";
              ?>
         
         <FONT SIZE=8  COLOR="white"><strong><?php echo($mensaje ); ?></strong></FONT>    
            <?php
                }
            ?>
      


    </div>
    

</div>

<script>

$(function () {
  $('[data-toggle="popover"]').popover()
});

</script>
<?php
include 'templates/pie.php'
?>
