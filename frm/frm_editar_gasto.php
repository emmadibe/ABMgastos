<?php

    if(isset($_GET["gasto2_id"])){

    $gasto2_id=$_GET["gasto2_id"];

    include "../conexion.php";
    include "../barra.php";

    $sql="SELECT * FROM gastos2 WHERE gasto2_id=".$gasto2_id; //con esta consulta le digo al sistema qué datos me debe traer, de dónde los saca. 

    $res=mysqli_query($link, $sql); //descargo los datos.

    $datos=mysqli_fetch_array($res);

    }

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Editor de Gastos</title>
  </head>
  <body>

<!-- Copiaré la mayor parte de otros archivos. -->

    <div class="container text-center">

        <div class="row">
            <div class="col-12">
                <h1>Editar el gasto</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">&nbsp;</div>
        
            <div class="col-4">
                <form action="../acc/acc_editar_gasto.php" method="GET">
                    <div class="form-group">
                        <label for="descripcion">Descripción del gasto</label>
                        <input type="text" class="form-control" name="descripcion"  required value=<?php echo $datos["descripcion"]; ?>>
                        <!-- Debo poner qué campo editar. Acá, hago que se vea el valor que aparecía en descripción. Luego, haré que se vea el de importe. 
                    Obviamente, al traerme una variable debo abrir php dentro de html. -->
                    </div>
                    <div class="form-group">
                        <label for="tipo_gasto">Tipo de gasto</label>
                        <select class="form-control" name="tipo_gasto">
                                <?php if($datos["tipo_gasto"]=="comida"){ ?>
                                     <!-- Si el valor que me traje es igual a comida quiero que me marques el option de value comida como seleccionado (select)-->
                                    <option value="Comida" selected>Comida</option>
                                     <!-- el atributo selected hace que quede tildado. -->
                                <?php }else{ ?>
                                        <option value="Comida">Comida</option>
                                <?php } ?>

                                <?php if($datos["tipo_gasto"]=="Transporte"){ ?>
                                        <option value="Transporte" selected>Transporte</option>
                                <?php }else{ ?>
                                        <option value="Transporte">Transporte</option>
                                <?php } ?>

                                <?php if($datos["tipo_gasto"]=="Impuestos"){ ?>
                                    <option value="Impuestos" selected>Impuestos</option>
                                <?php }else{ ?>
                                        <option value="Impuestos">Impuestos</option>
                                <?php } ?>

                                <?php if($datos["tipo_gasto"]=="Servicios"){ ?>
                                        <option value="Servicios" selected>Servicios</option>
                                <?php }else{ ?>
                                        <option value="Servicios">Servicios</option>
                                <?php } ?>

                                <?php if($datos["tipo_gasto"]=="Vacaciones"){ ?>
                                    <option value="Vacaciones" selected>Vacaciones</option>
                                <?php }else{ ?>
                                        <option value="Vacaciones">Vacaciones</option>
                                <?php } ?>

                                <?php if($datos["tipo_gasto"]=="Impuestos"){ ?>
                                    <option value="Impuestos" selected>Impuestos</option>
                                <?php }else{ ?>
                                        <option value="Impuestos">Impuestos</option>
                                <?php } ?>

                                <?php if($datos["tipo_gasto"]=="Regalos"){ ?>
                                    <option value="Regalos" selected>Regalos</option>
                                <?php }else{ ?>
                                        <option value="Regalos">Regalos</option>
                                <?php } ?>

                                <?php if($datos["tipo_gasto"]=="Ropa"){ ?>
                                    <option value="Ropa" selected>Ropa</option>
                                <?php }else{ ?>
                                        <option value="Ropa">Ropa</option>
                                <?php } ?>

                                <?php if($datos["tipo_gasto"]=="Varios"){ ?>
                                    <option value="Varios" selected>Varios</option>
                                <?php }else{ ?>
                                        <option value="Varios">Varios</option>
                                <?php } ?>
                                
                        </select>
                    </div>
                    <div class="form-group"> 
                        <label for="importe">Importe</label>
                        <input type="number" class="form-control" name="importe"  required value=<?php echo $datos["importe"]; ?>>
                    </div>
                    
                    <!-- debo volver a infiormar el gasto id al otro lado. -->
                    <input type="text" class="form-control" name="gasto2_id" value=<?php echo $datos["gasto2_id"]; ?> hidden>

                    <button type="submit" class="btn btn-primary" name="boton">Guardar gasto</button>
                </form>
                <!-- Para que se entienda: Puse como value (o como primero opción, en el caso del select) los valores del dato original. Es para que el usuario recuerde cómo era el dato al principio. -->
            </div>

            <div class="col-4">&nbsp;</div>

        </div>
        <br>

</div> <!-- div container -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    
  </body>
</html>