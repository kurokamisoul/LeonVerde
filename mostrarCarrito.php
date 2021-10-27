<?php 
include 'global/config.php';
include 'global/conexion.php';
include 'funcionalidad/carrito.php';
include 'funcionalidad/deseos.php';
include 'templates/cabecera.php';
include 'templates/buscador.php';
include 'templates/carrusel.php';
?>
<div class="container" style="background-color:#317535!important; margin-top:100px;margin-bottom:100px;" >
<br>
<h3>Lista del carrito</h3>
<?php if(!empty($_SESSION['CARRITO'])){?>
<table class="table table-dark table-bordered" style="margin-bottom:10px;" >
    <tbody>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>
        <?php $total=0;?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="40%"><?php echo $producto['NOMBRE']?></td>
            <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td width="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <td width="20%" class="text-center"><?php echo number_format($producto['CANTIDAD']*$producto['PRECIO'],2);?></td>
            <td width="5%">

            <form action="" method="post">

            <input type="hidden" 
            name="id" 
            value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
            
            <button class="btn btn-danger" 
            type="submit"
            name="btnAccion" 
            value="Eliminar" 
            >
            Eliminar</button>
                  
            </form>
            
            

            </td>
        </tr>
        <?php $total=$total+($producto['CANTIDAD']*$producto['PRECIO']);?>
      <?php }?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
                <form action="pagar.php" method="post">
                    <div class="alert alert-success" >
                    <div class="form-group">
                    <label for="my-input">Correo de contacto:</label>
                    <input id="email" 
                    name="email" 
                    class="form-control" 
                    type="email" 
                    placeholder="Por favor escribe tu correo"
                    required>
                    <label for="my-input">Nombre del cliente:</label>
                    <input id="nombre" 
                    name="nombre" 
                    class="form-control" 
                    type="text" 
                    placeholder="Por favor escribe tu nombre completo"
                    required>
                    <label for="my-input">Telefono de contacto:</label>
                    <input id="telefono" 
                    name="telefono" 
                    class="form-control" 
                    type="text" 
                    placeholder="Por favor escribe tu telefono"
                    required>
                </div>
                <small id="emailHelp"
                class="form-text text-muted"> 
                    Los productos se enviaran a este correo
                </small>
                    </div>
                
                    <button class="btn btn-primary btn-lg btn-block"  
                    type="submit"
                    name="btnAccion"
                    value="proceder"
                  
                    >
                        Proceder a pagar >>
                    </button>
                </form>
                

            </td>
        </tr>

    </tbody>
</table>
<br>
<br>
<?php }else{?>
<div class="alert alert-succes" >
   Nohay productos en el carrito
</div>
<?php }?>    
<?php
include 'templates/pie.php'
?>