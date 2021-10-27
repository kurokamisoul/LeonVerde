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
<div class="container-ls" style="background-color:#317535!important;  " >
<div class="container" style="background-color:#317535!important;  " >

<div class="row" >
    <?php
    $idLibro=openssl_decrypt($_GET['Id'],COD,KEY);
    $sentencia=$pdo->prepare("SELECT * FROM libros where Id_libro=$idLibro");
    $sentencia->execute();
    $listaLibros=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   // print_r($listaProductos);
?>
<?php foreach($listaLibros as $producto){?>
<!--template del libro-->

<div class="col-6">
     <div class="card" style="background-color:#317535!important; border: none">
     <!--datos para crear el popover-->
       
        <!--fin datos popover-->
         <div class="card-body">
         
         <br>
         <img 
          
          alt=<?php echo $producto['Titulo'];?> 
          class="card-img-top" 
          src="<?php echo $producto['Imagen'];?>" 
         
          >
          
         </div>
     </div>
 </div>
 
 <div class="col-6">
     <div class="card" style="background-color:#317535!important; border: none">
     <!--datos para crear el popover-->
        
        <!--fin datos popover-->
         <div class="card-body">
        
         
         <font  COLOR=white>
            <span><h3><FONT SIZE=12><?php echo $producto['Titulo'];?> </h3></FONT></span>
          
             <br>
             <br>
             <p class="card-text"><b><?php echo $producto['Descripcion'];?></b></p>
             <br>
             <FONT SIZE=8>Precio</FONT>
            <br>
            <p  class="card-text"><FONT SIZE=6><?php echo "$".$producto['Precio'];?></FONT></p>
            </font>
            
            <br>
                <form action="" method="post" style="display:inline">

                <input type="hidden" name="id" id="Id" value="<?php echo openssl_encrypt($producto['Id_libro'],COD,KEY) ;?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Titulo'],COD,KEY) ;?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY) ;?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY) ;?>">
           

                <button class="btn " 
             name="btnAccion" 
             value="Agregar" 
             type="submit"
             style="background-color:#ffe161!important;">
             <b>Carrito</b><img src="archivos/carrito.png" alt="x" width="36px" />
             </button>
                
                </form>

                <form action="" method="post" style="display:inline">

<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['Id_libro'],COD,KEY) ;?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Titulo'],COD,KEY) ;?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY) ;?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY) ;?>">

<button class="btn " 
name="btnAccionD" 
value="Agregar" 
type="submit"
style="background-color:#ffe161!important;">
<b>Lista deseos</b>
<img src="archivos/corazon.png" alt="x" width="36px" />
</button>

</form>   

<br>
<br>

<table class="table table-dark table-bordered" style="margin-bottom:10px;">

<tr>
<th width="30%">Detalles</th>
</tr>
<tr>
<th width="30%">Autor</th>
<th width="30%"><?php echo  $producto['Autor'] ;?></th>
</tr>
<tr>
<th width="30%">Editorial</th>
<th width="30%"><?php echo  $producto['Editorial'] ;?></th>
</tr>
<tr>
<th width="30%">Edcion</th>
<th width="30%"><?php echo  $producto['Edicion'] ;?></th>
</tr>
<tr>
<th width="30%">Numero de paginas</th>
<th width="30%"><?php echo  $producto['Numero_paginas'] ;?></th>
</tr>
<tr>
<th width="30%">ISBN</th>
<th width="30%"><?php echo  $producto['ISBN'] ;?></th>
</tr>
</table>



         </div>
     </div>
 </div>

<!--fin template del libro-->
</div>
</div>
    <?php } ?>






    
<?php
include 'templates/pie.php'
?>