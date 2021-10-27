
<div class="container-sm">
<div class="row" >
<div class="col-md-12"  >
<?php
            $sentencia=$pdo->prepare("SELECT * FROM carrusel");
            $sentencia->execute();
            $listaCarrucel=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           // print_r($listaProductos);
        ?>
 <!-- aqui insertaremos el slider -->
 <div id="carousel1" class="carousel slide" data-ride="carousel" >
  <ol class="carousel-indicators">
<?php $cnt=0; foreach($listaCarrucel as $img):?>
    <li data-target="#carousel1" data-slide-to="<?php echo $cnt; ?>" class="active"></li>
<?php $cnt++; endforeach; ?>
  </ol>      

  <div class="carousel-inner">
  <?php $cnt=0; foreach($listaCarrucel as $img):?>
    <div class="carousel-item <?php if($cnt==0){ echo 'active'; }?>">
    <img class="img-fluid" src="<?php echo $img['Imagen']; ?>" alt="First slide" >
    </div>
    
<?php $cnt++; endforeach; ?>
</div>
<a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>

  </div>

</div>
</div>
</div>

