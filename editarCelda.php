<?php


$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {   
    $update_field='';
    if(isset($input['titulo'])) {
        $update_field.= "nombre='".$input['titulo']."'";
    } else if(isset($input['autor'])) {
        $update_field.= "autor='".$input['autor']."'";
    } else if(isset($input['isbn'])) {
        $update_field.= "isbn='".$input['isbn']."'";
    } else if(isset($input['precio'])) {
        $update_field.= "precio='".$input['precio']."'";
    }   
    if($update_field && $input['id_libro']) {
          
        
        $sql="UPDATE libros SET $update_field WHERE id_libro=:id_libro";
      
       
        $query=$pdo->prepare($sql);

        $query->bindParam(':id_libro',$input['id_libro'],PDO::PARAM_INT);
      
        
        
              
              $query->execute();
    }
}
?>