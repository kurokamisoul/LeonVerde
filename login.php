<?php
include 'global/config.php';
include 'global/conexion.php';
include 'global/datos.php';
include 'funcionalidad/carrito.php';
include 'funcionalidad/deseos.php';

include 'templates/cabecera.php';

?>









<div class="form-row justify-content-center">

  <div class="col-4" style="background-color:#317535!important; margin-top:250px">
    <img class="mx-auto d-block" style=" margin-top:30px" title="Libreria leon verde" alt="Libreria leon verde" src="archivos/logo_transparente.png" width="100px">



    <form action="funcionalidad/loguear.php" method="post">
      <div class=" md-form form-group w-50 mx-auto d-block">
        <P class=" mx-auto d-block btn" style=" margin-top:10px;"><font color=white><strong>Usuario</strong> </font></P>
        <input type="text" id="usuario" class="form-control"  name="usuario" placeholder="Usuario" >
        <P class=" mx-auto d-block btn" style=" margin-top:10px;"><font color=white><strong>Contraseña</strong> </font></P>
        <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" >
        <input type="submit" class=" mx-auto d-block btn" value="Acceder" style=" margin-top:20px; margin-bottom:20px;">
      </div>

    </form>
  </div>



</div>