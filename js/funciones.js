
function agregarDatos(titulo,autor,descripcion,isbn,editorial,edicion,piezas,precio,paginas,imagen,direccion){
  //alertify.success(imagen);
                var fecha=new Date();
				var fechaAux=fecha.getFullYear()+'-'+(fecha.getMonth()+1)+'-'+fecha.getDate();
   
				var parametros={
					"titulo" : titulo,
					"autor":autor,
					"descripcion":descripcion,
					"isbn":isbn,
					"editorial":editorial,
					"edicion":edicion,
					"piezas":piezas,
					"precio":precio,
					"paginas":paginas,
					"imagen":imagen,
					"fecha_alta":fechaAux
        };
		
        $.ajax({
                data:  parametros,
                url:   'funcionalidad/agregarDatos.php',
                type:  'POST',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        //$("#resultado").html(response);
                        
                        if(response==1){
                          $('#table').load('tabla.php');
						  
                          alertify.success("Agregado con exito");
                        }else{
                          alertify.error("Error");
                        }
                }
        });
}

function agregaForm(datos){
	d=datos.split('||');
	$('#id_libroE').val(d[0]);
	$('#tituloE').val(d[1]);
	$('#autorE').val(d[2]);
	$('#descripcionE').val(d[3]);
	$('#isbnE').val(d[4]);
	$('#editorialE').val(d[5]);
	$('#edicionE').val(d[6]);
	$('#piezasE').val(d[7]);
	$('#precioE').val(d[8]);
	$('#paginasE').val(d[9]);
	
	
}

function actualizarDatos(id,titulo,autor,descripcion,isbn,editorial,edicion,piezas,precio,paginas,imagen,direccion){
	var fecha=new Date();
	var fechaAux=fecha.getFullYear()+'-'+(fecha.getMonth()+1)+'-'+fecha.getDate();

	var parametros={
		"id_libro": id,
				  "titulo" : titulo,
				  "autor":autor,
				  "descripcion":descripcion,
				  "isbn":isbn,
				  "editorial":editorial,
				  "edicion":edicion,
				  "piezas":piezas,
				  "precio":precio,
				  "paginas":paginas,
				  "imagen":imagen,
				  "fecha_alta":fechaAux,
		"direccion": direccion
	  };
//alertify.success(imagen);
$.ajax({
	data:  parametros,
	url:   'funcionalidad/actualizarDatos.php',
	type:  'POST',
	beforeSend: function () {
			$("#resultado").html("Procesando, espere por favor...");
	},
	success:  function (response) {
			$("#resultado").html(response);
			//alertify.success(response);
			if(response==1){
			  $('#table').load('tabla.php');
			  //alertify.success(response);
			  alertify.success("Actualizado con exito");
			}else{
			  alertify.error("Error al actualizar");
			}
	}
});

}

function eliminarDatos(id){


	var parametros={
		"id_libro": id
	  };
//alertify.success(imagen);
$.ajax({
	data:  parametros,
	url:   'funcionalidad/eliminarDatos.php',
	type:  'POST',
	beforeSend: function () {
			$("#resultado").html("Procesando, espere por favor...");
	},
	success:  function (response) {
			$("#resultado").html(response);
			//alertify.success(response);
			if(response==1){
			  $('#table').load('tabla.php');
			  //alertify.success(response);
			  alertify.success("Eliminado con exito");
			}else{
			  alertify.error("Error al eliminar");
			}
	}
});

}

function confirmacion(id){

	alertify.confirm('Eliminar Datos', 'Desea eliminar este registro?', 
	function(){ 
		eliminarDatos(id)
		}
                , function(){ alertify.error('Se cancelo')});
Run
 Overloads
}

////////// Novedades /////////////
/*function agregarNovedad(id,titulo,descripcion,imagen){

	alertify.confirm('Eliminar Datos', 'Desea eliminar este registro?', 
	function(){ 
		agregarDatosNovedad(id,titulo,descripcion,imagen)
		}
                , function(){ alertify.error('Se cancelo')});
Run
 Overloads
}

function agregarDatosNovedad(id,titulo,descripcion,imagen){

	var parametros={
	  "id" : id,
		"titulo" : titulo,					
		"descripcion":descripcion,
		"imagen":imagen
};

$.ajax({
	data:  parametros,
	url:   'agregarDatosNovedades.php',
	type:  'POST',
	beforeSend: function () {
			$("#resultado").html("Procesando, espere por favor...");
	},
	success:  function (response) {
			//$("#resultado").html(response);
			alertify.error(response);
			if(response==1){
			  $('#table').load('tablaNovedades.php');
			  
			  alertify.success("Agregado con exito");
			}else{
			  alertify.error("Error al agregar novedad");
			}
	}
});
}
*/


function eliminarDatosNovedades(id){


var parametros={
"id_libro": id
};
//alertify.success(imagen);
$.ajax({
data:  parametros,
url:   'funcionalidad/eliminarDatosNovedades.php',
type:  'POST',
beforeSend: function () {
$("#resultado").html("Procesando, espere por favor...");
},
success:  function (response) {
$("#resultado").html(response);
//alertify.success(response);
if(response==1){
  $('#table').load('tablaNovedades.php');
  //alertify.success(response);
  alertify.success("Eliminado con exito");
}else{
  alertify.error("Error al eliminar");
}
}
});

}

function confirmacionNovedades(id){

alertify.confirm('Eliminar Datos', 'Desea eliminar este registro?', 
function(){ 
eliminarDatosNovedades(id)
}
	, function(){ alertify.error('Se cancelo')});
Run
Overloads
}

/////////////////// Carrusel
function eliminarDatosCarrusel(id){


	var parametros={
	"id": id
	};
	//alertify.success(imagen);
	$.ajax({
	data:  parametros,
	url:   'funcionalidad/eliminarDatosCarrusel.php',
	type:  'POST',
	beforeSend: function () {
	$("#resultado").html("Procesando, espere por favor...");
	},
	success:  function (response) {
	$("#resultado").html(response);
	//alertify.success(response);
	if(response==1){
	  $('#table').load('tablaCarrusel.php');
	  //alertify.success(response);
	  alertify.success("Eliminado con exito");
	}else{
	  alertify.error("Error al eliminar");
	}
	}
	});
	
	}
	
	function confirmacionCarrusel(id){
	
	alertify.confirm('Eliminar Datos', 'Desea eliminar este registro?', 
	function(){ 
	eliminarDatosCarrusel(id)
	}
		, function(){ alertify.error('Se cancelo')});
	Run
	Overloads
	}

	function agregarDatosCarrusel(nombre,imagen){
		
		
	var parametros={
	 
		"nombre" :nombre,					
		"imagen":imagen
	};
	$.ajax({
	data:  parametros,
	url:   'funcionalidad/agregarDatosCarrusel.php',
	type:  'POST',
	beforeSend: function () {
			$("#resultado").html("Procesando, espere por favor...");
	},
	success:  function (response) {
			//$("#resultado").html(response);
			
			if(response==1){
			  $('#table').load('tablaCarrusel.php');
			  
			  alertify.success("Agregado con exito");
			}else{
			  alertify.error("Error al agregar novedad");
			}
	}
	});
	}

	/////////////////// Ordenes
	function detalle(id){
		$('#idOrden').val(id);
		var parametros={
			"dato": id,
			
		  };
	//alertify.success(imagen);
	$.ajax({
		data:  parametros,
		url:   'Componentes/tablaLibrosOrdenes.php',
		type:  'GET',
		beforeSend: function () {
				$("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
				$("#resultado").html(response);
				//alertify.success(response);
				if(response==1){
				  $('#tableO').load('tablaLibrosOrdenes.php');
				  //alertify.success(response);
				  alertify.success("Actualizado con exito");
				}else{
				  alertify.error("Error al actualizar");
				}
		}
	});
	}



	function verDetalles(id){
		$('#idOrden').val(id);
		var parametros={
			"id": id,
			
		  };
	//alertify.success(imagen);
	$.ajax({
		data:  parametros,
		url:   'Componentes/tablaLibrosOrdenes.php',
		type:  'GET',
		beforeSend: function () {
				$("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
				$("#resultado").html(response);
				//alertify.success(response);
				if(response==1){
				  $('#tableO').load('tablaLibrosOrdenes.php');
				  //alertify.success(response);
				  alertify.success("Actualizado con exito");
				}else{
				  alertify.error("Error al actualizar");
				}
		}
	});
		
	}