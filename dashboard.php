<?php 
include 'global/config.php';
include 'global/conexion.php';

include 'templates/cabecera2.php';
session_start();


if(isset($_SESSION['userName'])){







// $usuario=$_SESSION['userName'];



?>
<div class="container-xl"  style="background-color:#317535!important; min-height: 100%;
height: 100%; ">
<iframeset   >
 
    <iframe   width="100%" height="100%" src="datosLibros.php" name="Libro"></iframe>

</iframeset>


</div>
</div>

</body>

</html>
<?php 
}else{
    header("location: ../login.php");   
}
?>