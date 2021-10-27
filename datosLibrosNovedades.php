<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Registro de libros nuevos</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
  <link rel="stylesheet" type="text/css" href="librerias/dataTable/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="librerias/dataTable/dataTables.bootstrap.min.css">

	<script src="librerias/jquery.js"></script>
	<script src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <!--<script src="librerias/select2/js/select2.js"></script>-->
  <script src="librerias/dataTable/jquery.dataTables.min.js"></script>
  <script src="librerias/dataTable/dataTables.bootstrap.min.js"></script>
  

</head>
<body style="background-color:#317535!important;"> 

<?php 

include 'global/config.php';
include 'global/conexion.php';
include 'global/datos.php';

?>

<div class="container" >
 <!-- <div id="buscador"></div>-->
<div id="table"></div>
</div>

<!-- Modal para registros nuevos -->


<!-- Modal -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar novedad </h4>
      </div>
      <div class="modal-body" id="tableLN">
       
     </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardar">Agregar</button>-->
        <!-- <button type="button" class="btn btn-primary" href="javascript:;" onclick="agregarDatos($('#titulo').val(),$('#autor').val(),$('#descripcion').val(),$('#isbn').val(),$('#editorial').val(),$('#edicion').val(),$('#piezas').val(),$('#precio').val(),$('#paginas').val(),$('#archivo').val());return false; -->
        <!--<button type="button" class="btn btn-primary" href="javascript:;" onclick="agregarDatos($('#titulo').val(),$('#autor').val(),$('#descripcion').val(),$('#isbn').val(),$('#editorial').val(),$('#edicion').val(),$('#piezas').val(),$('#precio').val(),$('#paginas').val(),$('#archivo').val());return false;"
         
         data-dismiss="modal" id="guardar">Agregar</button> -->
      </div>
      
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->


<!-- Modal -->




 
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
     $('#table').load('Componentes/tablaNovedades.php');
     $('#tableLN').load('Componentes/tablaLibrosNovedades.php');
    // $('#buscador').load('buscadorT.php');
	});
</script>
