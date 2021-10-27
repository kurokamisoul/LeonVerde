<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';
//include 'table_edits.js';
//include 'editarCelda.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<div class="container home">    
    <h2>Ejemplo tabla editable con PHP, MySQL y jQuery</h2>      
    <table id="data_table" class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>ISBN</th>   
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                
                //$dato=$_POST['DatoBuscar'];
            
                    $sentencia=$pdo->prepare("SELECT id_libro, titulo, autor, isbn, precio FROM libros");
                    $sentencia->execute();
                    $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    if($sentencia->rowCount()>0){
                   // print_r($listaProductos);
              
             
                 foreach($listaProductos as $libro){?>
         
               <tr id="<?php echo $libro ['id_libro']; ?>">
               <td><?php echo $libro ['id_libro']; ?></td>
               <td><?php echo $libro ['titulo']; ?></td>
               <td><?php echo $libro ['autor']; ?></td>
               <td><?php echo $libro ['isbn']; ?></td>   
               <td><?php echo $libro ['precio']; ?></td>  
               </tr>
            <?php } }else{

$mensaje="No hay libros con el criterio de busqueda! ";
            }?>
        </tbody>
    </table>    
</div>