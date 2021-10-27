<?php 
session_start();

include __DIR__ .'/../global/config.php';
include __DIR__ .'/../global/conexion.php';
include __DIR__ .'/../global/datos.php';

?>
<script src="js/funciones.js"></script>
<div class="row">
	<div class="col-sm-12">
    <font color=white><strong> 
        		<h2>Tabla dinamica</h2>
		<table class="table table-hover table-condensed table-bordered" id="tablaDinamicaLoad" >

			<caption>
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">Agregar nuevo
 				<span class=" glyphicon glyphicon-plus"></span>
				</button>
			</caption>
			<thead style="background-color:#FFFF!important; color:#000000">
			<tr>
				<td>Id libro</td>
				<td>Titulo</td>
				<td>Autor</td>
				<td>Precio</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			</thead>
			<tbody style="background-color:#FFFF!important; color:#000000">
				 <?php 
                
                //$dato=$_POST['DatoBuscar'];
				    //$sentencia=$pdo->prepare("SELECT id_libro, titulo, autor, isbn, precio FROM libros");
					$sentencia='';
					if(isset($_SESSION['consulta'])){
						if($_SESSION['consulta']>0){
							$idLib=$_SESSION['consulta'];
							$sentencia=$pdo->prepare("SELECT id_libro,titulo,autor,descripcion,isbn,editorial,edicion,piezas,precio,numero_paginas,imagen FROM libros where id_libro=$idLib");
						}else{
							$sentencia=$pdo->prepare("SELECT id_libro,titulo,autor,descripcion,isbn,editorial,edicion,piezas,precio,numero_paginas,imagen FROM libros");
						}
					}else{
						$sentencia=$pdo->prepare("SELECT id_libro,titulo,autor,descripcion,isbn,editorial,edicion,piezas,precio,numero_paginas,imagen FROM libros");
					}
                    
                    $sentencia->execute();
                    $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    if($sentencia->rowCount()>0){
                   // print_r($listaProductos);
              
             
                 foreach($listaProductos as $libro){
					 $id=$libro ['id_libro'];
					 $datos=$libro ['id_libro']."||".$libro ['titulo']."||".$libro ['autor']."||".$libro ['descripcion']."||".$libro ['isbn']."||".$libro ['editorial']."||".
					 $libro ['edicion']."||".$libro ['piezas']."||".$libro ['precio']."||".$libro ['numero_paginas']."||".$libro ['imagen'];
					 ?>
		       <tr id="<?php echo $libro ['id_libro']; ?>">
               <td><?php echo $libro ['id_libro']; ?></td>
               <td><?php echo $libro ['titulo']; ?></td>
               <td><?php echo $libro ['autor']; ?></td>
               <td><?php echo $libro ['precio']; ?></td>   
           
			<td>
			<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaForm('<?php echo $datos?>')"></button>
			</td>
			<td>
				<button class="btn btn-danger glyphicon glyphicon-trash" onclick="confirmacion('<?php echo $id?>')"></button>
			</td>		
			</tr>
			 <?php } }else{

   $mensaje="No hay libros con el criterio de busqueda! ";
            }?>
			</tbody>
		</table>
        </font></strong>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $('#tablaDinamicaLoad').DataTable({
		language:{
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vacío",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vacío",
                "contains": "Contiene",
                "notEmpty": "No Vacío",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        },
        "rows": {
            "1": "1 fila seleccionada",
            "_": "%d filas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "AM",
            "PM"
        ],
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    },
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
} 
	});
} );
</script>