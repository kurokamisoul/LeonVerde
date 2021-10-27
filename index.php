<?php 
include 'global/config.php';
include 'global/conexion.php';
include 'funcionalidad/carrito.php';
include 'funcionalidad/deseos.php';
include 'funcionalidad/libro.php';
include 'templates/cabecera.php';
include 'templates/buscador.php';
include 'templates/carrusel.php';

?>
<div class="container-ls" style="background-color:#317535!important; margin-top:0px;margin-bottom:10px;" >
<br>
<br>
<div><FONT SIZE=8  COLOR="white"><b><h1 class=" text-center"><strong>Recomendados</strong></h1></b></FONT></div>
<br>





<div class="container"style="background-color:#317535!important;">
<div class="row" >

<?php
    $sentencia=$pdo->prepare("SELECT * FROM novedades");
    $sentencia->execute();
    $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   // print_r($listaProductos);
?>
<!-- instruccion para crear las tarjetas de los productos con la informacion directa de la bd-->
<?php foreach($listaProductos as $producto){?>
<!--template del libro-->

<div class="col-4">
     <div class="card" style="background-color:#317535!important; border: none">
     <!--datos para crear el popover-->
         <img 
          
         alt=<?php echo $producto['Titulo'];?> 
         class="card-img-top" 
         src="<?php echo $producto['Imagen'];?>" 
        
         height="450px"
         >
        <!--fin datos popover-->
         <div class="card-body">
            <span><h3><FONT COLOR=white><?php echo $producto['Titulo'];?> </h3></FONT></span>
             
             <p class="card-text"><b><FONT COLOR=white><?php echo substr($producto['Descripcion'],0,100)."..." ;?></FONT></b></p>

                <form action="detallesLibro.php" method="GET">

                <input type="hidden" name="Id" id="id" value="<?php echo openssl_encrypt($producto['Id_libro'],COD,KEY) ;?>">
           

                <button class="btn " 
             name="btnAccionL" 
             value="AgregarBuscar" 
             type="submit"
             style="background-color:#ffe161!important;"
             >
             <b>Leer más ></b>
             </button>
                
                </form>




         </div>
     </div>
 </div>
<!--fin template del libro-->

    <?php } ?>



</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<div><FONT SIZE=8  COLOR="white"><b><h1 class=" text-center"><strong> Contacto</strong></h1></b></FONT></div>
<br>
<br>
<br>
<br>
<div class="container"style="background-color:#317535!important;">
<div class="row" >

<div class="col-6">
     <div class="card" style="background-color:#317535!important; border: none">
     <div class="card-body">
     <p class="card-text text-center"><b><FONT COLOR=white>
     <br>
     <br>
     <br>
     <br>
     <img  src="archivos/telefono.png"width="54px" >
     <FONT SIZE=6>Teléfono</FONT>
<br>

<img  src="archivos/telefono2.png"width="54px" >
     0 (800) 123 45 67
<br>
<br>
<br>
<img src="archivos/sobre.png"width="54px" >
<FONT SIZE=6>Email</FONT>
<br>
<img src="archivos/sobre2.png"width="54px" >
             info@site.com

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


</FONT></b>
</p>
<br>
<br>

     </div>
     </div>
</div>

<div class="col-6">
     <div class="card" style="background-color:#317535!important; border: none">
     <div class="card-body">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.84071108318!2d-101.67425738459677!3d21.11891579006924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbf07e6fd0dd3%3A0x4b283e8a5a970638!2sArco%20Triunfal%20de%20la%20Calzada%20de%20los%20H%C3%A9roes!5e0!3m2!1ses!2smx!4v1625848347827!5m2!1ses!2smx"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
      </iframe>
      <br>
<br>
<br>
<br>

</div>

</div>
</div>


<?php
include 'templates/pie.php'
?>