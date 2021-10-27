<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Registro de libros nuevos</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
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
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo libro </h4>
      </div>
      <div class="modal-body">
        <label>Titulo:</label>
        <input type="text" name="titulo"  id="titulo" class="form-control input-sm">
      <label>Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control input-sm">
      
      <label>Descripcion:</label>
      <textarea type="text" name="descripcion" id="descripcion" class="form-control input-sm"></textarea>
        <!--<input type="text" name="descripcion">-->
     
      <label>ISBN:</label>
        <input type="text" name="isbn" id="isbn" class="form-control input-sm">
 
      <label>Editorial:</label>
        <input type="text" name="editorial" id="editorial" class="form-control input-sm">
     
      <label>Edicion:</label>
        <input type="text" name="edicion" id="edicion" class="form-control input-sm">
      
      <label>Piezas:</label>
        <input type="text" name="piezas" id="piezas" class="form-control input-sm">
   
      <label>Precio:</label>
        <input type="text" name="precio" id="precio" class="form-control input-sm">
     
      <label>No. paginas</label>
        <input type="text" name="paginas" id="paginas" class="form-control input-sm">
      
      <label>Imagen</label>
        <input type="file" name="archivo" id="archivo" class="form-control ">
        
      </div>
     
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardar">Agregar</button>-->
        <!-- <button type="button" class="btn btn-primary" href="javascript:;" onclick="agregarDatos($('#titulo').val(),$('#autor').val(),$('#descripcion').val(),$('#isbn').val(),$('#editorial').val(),$('#edicion').val(),$('#piezas').val(),$('#precio').val(),$('#paginas').val(),$('#archivo').val());return false; -->
        <!--onclick="agregarDatos($('#titulo').val(),$('#autor').val(),$('#descripcion').val(),$('#isbn').val(),$('#editorial').val(),$('#edicion').val(),$('#piezas').val(),$('#precio').val(),$('#paginas').val(),$('#archivo').val());return false;"-->
        <button type="button" class="btn btn-primary" href="javascript:;" onclick="guardar();return false;"
         
         data-dismiss="modal" id="guardar">Agregar</button>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->


<!-- Modal -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos </h4>
      </div>
      <div class="modal-body">
      	<input type="text" hidden="" id="id_libroE" name="">
        <label>Titulo:</label>
        <input type="text" name="titulo"  id="tituloE" class="form-control input-sm">
      <label>Autor:</label>
        <input type="text" name="autor" id="autorE" class="form-control input-sm">
      
      <label>Descripcion:</label>
      <textarea type="text" name="descripcion" id="descripcionE" class="form-control input-sm"></textarea>
        <!--<input type="text" name="descripcion">-->
     
      <label>ISBN:</label>
        <input type="text" name="isbn" id="isbnE" class="form-control input-sm">
 
      <label>Editorial:</label>
        <input type="text" name="editorial" id="editorialE" class="form-control input-sm">
     
      <label>Edicion:</label>
        <input type="text" name="edicion" id="edicionE" class="form-control input-sm">
      
      <label>Piezas:</label>
        <input type="text" name="piezas" id="piezasE" class="form-control input-sm">
   
      <label>Precio:</label>
        <input type="text" name="precio" id="precioE" class="form-control input-sm">
     
      <label>No. paginas</label>
        <input type="text" name="paginas" id="paginasE" class="form-control input-sm">
      
      <label>Imagen</label>
        <input type="file" name="imagen" id="archivoE" class="form-control ">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning"  href="javascript:;" onclick="actualizarDatos($('#id_libroE').val(),$('#tituloE').val(),$('#autorE').val(),$('#descripcionE').val(),$('#isbnE').val(),$('#editorialE').val(),$('#edicionE').val(),$('#piezasE').val(),$('#precioE').val(),$('#paginasE').val(),$('#archivoE').val());return false;"
        data-dismiss="modal" id="guardarE" >Actualizar</button>
      
      </div>
    </div>
  </div>
</div>



 
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
     $('#table').load('Componentes/tabla.php');
    // $('#buscador').load('buscadorT.php');
	});
</script>
<script>
  function guardar(){
    agregarDatos($('#titulo').val(),$('#autor').val(),$('#descripcion').val(),$('#isbn').val(),$('#editorial').val(),$('#edicion').val(),$('#piezas').val(),$('#precio').val(),$('#paginas').val(),$('#archivo').val());

    var formData = new FormData();
        var files = $('#archivo')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'funcionalidad/upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
					alert('Formato de imagen incorrecto.');
				}
            }
        });

  }
  /*
$(document).ready(function() {
    $("#guardar").on('click', function() {
        var formData = new FormData();
        var files = $('#archivo')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
					alert('Formato de imagen incorrecto.');
				}
            }
        });
		return false;
    });
});*/
</script>
