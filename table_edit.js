$(document).ready(function(){
    $('#data_table').Tabledit({
        deleteButton: false,
        editButton: false,          
        columns: {
          identifier: [0, 'id_libro'],                    
          editable: [[1, 'nombre'], [2, 'autor'], [3, 'isbn'], [4, 'precio']]
        },
        hideIdentifier: true,
        url: 'editarCelda.php'      
    });
});
