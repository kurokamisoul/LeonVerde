<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria Online el León verde</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="archivos/logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</head>
<body style="background-color:#ffe161!important; " >

    <!--inicio del menu-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color:#ffe161!important;" >
        <a class="navbar-brand" href="index.php">
        <img 
                 title="Libreria leon verde" 
                 alt="Libreria leon verde" 
                
                 src="archivos/logo.png" 
                
                 width="54px"
                 
                 
                 > 
        </a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link " href="index.php"><b>Libreria Online el León verde</b></a>
                </li>
                
            </ul>
        </div>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <img title="Lista de deseos" alt="Lista de deseos" src="archivos/corazon.png"width="54px" >
            </li>   
            <li class="nav-item">
                <a class="nav-link active" href="mostrarDeseos.php">Lista deseos(
                        <?php
                        echo(empty($_SESSION['DESEOS']))?0:
                     count($_SESSION['DESEOS']);?>
                     )</a>
            </li>
            <li class="nav-item">
                <img title="Carrito de compras" alt="Carrito de compras" src="archivos/carrito.png"width="54px" >
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="mostrarCarrito.php">Carrito(
                        <?php
                        echo(empty($_SESSION['CARRITO']))?0:
                     count($_SESSION['CARRITO']);?>
                     )</a>
            </li>
        </ul>
    </div>

    </nav>
<!--fin del menu -->
<br>
<br>

