<?php

    include "../proteccion.php";//Hace que solo puedas entrar si estás logueado. 
    
    include "../conexion.php";
     // Con ../ voy una carpeta hacia atrás.
    //Acordate que con ese include estoy trayendo los siguientes códigos muy usados en mi proyecto:
     //$link = mysqli_connect("localhost", "root", "");
     //mysqli_select_db($link, "gastos2_db");
     /*$sql="SELECT <campo1> , <campo2> FROM <tabla> WHERE <cond> ORDER BY <campo1>
     DESC, <campo2> ASC LIMIT 9 , 10"*/

     $usuario_id=$_SESSION["usuario_id"];//La variable usuario_id me la traigo de $_SESSION.

     include "../barra.php";//Lo copio acá para que en la barra esté $usuario.

    $sql="SELECT * FROM gastos2 WHERE usuario_id=".$usuario_id." ORDER BY fecha DESC LIMIT 60";
    //Lease: traeme todos los datos de la tabla gastos2 mientras usuario_id sea igual a $usuario_id y ordenamelos en función de la fecha en forma descendente hasta llegar a los sesenta datos.
    //Me ordena los datos por fecha y hora poniendo la última fecha arriba del todo (orden descendente= DESC). También hace que aparezcan como máximo 60 datos, más que nada para que no se haga un choclo.
    //Así, me trae toda la información de la tabla gastos2 donde usuario_id sea igual a usuario_id, me los ordena de forma descendente hasta alcanzar los 60 datos.
  //Gracias a que le ordeno que me traiga solo la información que pertenezca a usuario_id, el usuario solo ve sus gastos, no todos. O sea, el WHERE me filtra los datos según uan condición. En este caso, la condición es que usuario_id sea igual a $usuario_id.
  //El usuario_id también lo debo agregar en acc_nuevo gasto porque en ese archivo se guardan los datos. Los datos deben guardarse por usuario_id.
    $res=mysqli_query($link, $sql);  //OJO! Es un $res totalmente diferente del que está en acc_nuevo_gasto.php. No es que me traigo la variable de allá.

     //Con el siguiente bucle while traigo formateado los datos de la base de datos. Los trae en forma de array. Debo escribirlo como comentario para que no me trabe el array que hace la tabla (el que finalmente usamos).
     //while($fila=mysqli_fetch_array($res)){
       // echo "<pre>";
        //print_r($fila);
        //echo "</pre>";
     //}

     //Ahora veamos cómo traer los datos en forma de texto. Esto es lo que voy a querer que haga la tabla. De nuevo, lo escirbo en forma de comentario para que no me bloqueé el array que hace la tabla. 
     // while($fila=mysqli_fetch_array($res)){
    //    echo '<br>Descripción: '.$fila["descripcion"];
    //    echo '<br>Tipo de gastos: '.$fila["tipo_gasto"];
    //    echo '<br>Importe: '.$fila["importe"];
     // }
     //** Le dije: mientras puedas traerme fila, traé los datos; sino, no hagas nada. Es la función mysqli_fetch_array() devuelve un false si no tiene nada para poner.  */
     //** Esto lo hago para yo ver cómo se guardan los datos. Obviamente, en una app real, esto no lo hago porque queda horrible que el usuario lo vea.  */
     
    
     //Lo que escribí dentro de este php (include, $sql y $res es necesario para más abajo hacer el bucle while que me crea la tabla con los datos. Acá ya me conecto a la base de datos. )
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


        <title>App de Gastos</title>
    </head>
    <body>
        <div class="container text-center">

            <?php

                if(isset($_GET["INFORMACION"])){
                    include ("../alertas.php");
                }
                //Lo que le estoy diciendo al sistema es: "si existe la variable INFORMACION, la cual me la traigo vía GET ya que la mandé por URL, incluime el código que está en el archivo 'alerta.php'". Debo hacer eso ya que quiero que el cartel salga solo si el usuario ya envío un dato (un gasto), sino hago el isset, va a aparecer el cartel desde el inicio.
                //En el archivo alertas.php guardé todos los códigos de todas las alertas. Si el dato fue guardado exitosamente, o sea, si en el archivo acc_nuevo_gasto.php existe la variable $res, va a saltar un cartel que diga que el dato se guardo exitosamente; sino, que no. 
                //Si en la página de Boostrap escribo alertas me salen un montón de modelos de alertas. 
                //Al poner las alertas arriba del todo, me aparecerán arriba de la página. 
            ?>
            <div class="row">

                <div class="col-12"><hr><h1>Gastos</h1><hr></div>

            </div>
            <br>
            <div class="row">

                <div class=col-4>

                    &nbsp;

                </div>

                <div class=col-4>

                    <form action="../acc/acc_nuevo_gasto.php?usuario_id=<?php echo $usuario_id ?>" method="POST">
                    <!-- Como usuario_id lo mando vía GET al archivo acc_nuevo_gasto, los demás datos los debo enviar vía POST. -->
                        <!-- Me estoy llevando la variable $usuario_id al archivo acc_nuevo_gasto (que es donde se guardan los datos) vía URL (GET, por ende). Yo me debo llevar la variable $usuario_id al archivo donde se guardan los datos para que se guarden por usuario, para que cada usuario vea SUS datos, no el de todos los usuarios. -->
                        <div class="form-group">
                            <!-- Fijate como Boostrap tiene sus formularios. Hay otros que puedo ver en la página de Boostrap. -->
                            <label for="descripcion">Descripción del gasto</label>

                            <input type="text" class="form-control" placeholder="Ej: pan" required name="descripcion">

                        </div>

                        <div class="form-group">

                            <label for="tipo_gasto">Seleccionar el tipo de gasto</label>
                           
                            <select class="form-control" name="tipo_gasto">
                                <option value="Comida">Comida</option>
                                <option value="Transporte">Transporte</option>
                                <option value="Impuestos">Impuestos</option>
                                <option value="Servicios">Servicios</option>
                                <option value="Vacaciones">Vacaciones</option>
                                <option value="Ropa">Ropa</option>
                                <option value="Regalos">Regalos</option>
                                <option value="Varios">Varios</option>
                            </select>

                        </div>

                        <div class="form-group">

                            <label for="importe">Importe</label>

                            <input type="number" class="form-control" placeholder="Ej: 1265" required name="importe">

                        </div>

                        <button type="submit" class="btn btn-primary" name="boton">Guardar gasto</button></br></br></br>

                    </form>

                </div>
              
                <div class=col-4>

                    &nbsp;
                    
                </div>

                <!-- A continuación, voy a crear una tabla. Fijate que en la página de Boostrap hay muchos modelos de tablas.  -->
                <table class="table table-hover" id="tabla">

                    <thead>

                        <tr>
                            <th scope="col">Gasto Nº</th>
                            <th scope="col">Descripción del gasto</th>
                            <th scope="col">Tipo de gasto</th>
                            <th scope="col">Importe</th>
                            <th scope="col">Fecha y hora</th>
                            <th scope="col">Borrar / Editar</th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                            //Acordate que metí el include que me conecta a la base de datos y me traje las variables $sql y $res arriba del todo.
                            while($fila=mysqli_fetch_array($res)){                   
                         //Lo que le digo al sistema es: mientras me puedas seguir trayendo datos, hacé: creame una fila con su celda. Si hay 10 elementos, me creará 10 filas con sus celdas. En la primera celda me pone descripción; en la segunda, fechayhora; y así hasta que no me pueda trar más datos. 
                            // es que la función mysqli_fetch_array devuelve true o false. Mientras sea true, es que hay datos, por lo que while creará las filas con sus columnas. 
                            //La idea, entonces, es que el while me genere las filas y columnas y me meta los datos.
                        ?>

                                <tr>
 
                                    <td> <?php echo $fila["gasto2_id"] ?></td> 
                                    <!-- En la columna de arriba me pone el número del id. Entonces, los datos están ordenados. Como arriba del todo, en la función SLECT contenida en la varible $sql, dije que me ordene los datos (ORDER BY) por fecha, me aparecerá primero el número más grande porque es el último dato ue agregué. ¡GENIAL! -->

                                    <td> <?php echo $fila["descripcion"] ?></td>

                                    <td> <?php echo $fila["tipo_gasto"] ?></td>

                                    <td> <?php echo $fila["importe"] ?></td>

                                    <td> <?php echo $fila["fecha"] ?></td>

                                    <td> 
                                        <!-- Voy a utilizar modales, sacados de la página de Boostrap, para crear los botones de editar y de eliminar -->

                                        <!-------------------------------------------------- MODAL ELIMINAR    -------------------------------------------------->

                                        <div class="modal" tabindex="-1" id="modal_eliminar<?php echo $fila["gasto2_id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title ">ADVERTENCIA!!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro de eliminar el gasto?</p>
                                                <p>Esta accion no se puede revertir.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a href="../acc/acc_borrar_gasto.php?gasto2_id=<?php echo $fila["gasto2_id"]; ?>" class="btn btn-danger">Eliminar gasto</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                               
                                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_eliminar<?php echo $fila["gasto2_id"]; ?>"><i class="bi bi-trash-fill"></i></button>    
                                        <!-- Debo hacer que viaje al archivo acc_borrar_gasto.php la variable ya que es lo que debe ser eliminado. 
                                         < Este modal viene en boostrap. Lo busco en boostrap al código y modifico cosas como el mensaje. El presente modal sirve para hacer un símolo de eliminar (un tacho de basura, en este caso) y con el cartelito de alerta. 
¡OJO! con esto solo estoy haciendo la parte visual. Aún no elimina absolutamente nada.  Eso lo hará en el otro archivo al cual el vínculo me lleva. -->
<!-- Para que los modales me funcionen tengo que copiar los link de Boostrap que aparecen abajo del todo. -->
                                        <!-------------------------------------------------- FIN DEL MODAL ELIMINAR    -------------------------------------------------->

                                        <a href="frm_editar_gasto.php?gasto2_id=<?php echo $fila["gasto2_id"]; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <!-- Botón con el  modal de editar. -->
                                <!-- O sea, me lleva a frm_editar_gasto.php con la variable gasto_id para saber qué dato editar. Me redirecciona con el id del gasto a editar. Por eso es tan importante dar click al botón Auto Incrementar en Mysql. -->
                                <!-- Fijate que tanto el botón de eliminar como el de editar son, en realidad, vínculos que me llevan a otro archivo (el de eliminar el vínculo está en el modal). Pero, gracias a la class btn, se ve como un botón, lo cual es más lindo para el usuario. Pero es un vínculo.
                            Entonces,  para eliminar y editar transformo el botón en un link. Sin embargo, con el class btn hago que siga pareciendo un botón. Como en el otro archivo hago que vuelva a frm:gastos.php, va y viene pero no lo vemos.  
                            
                                Yo necesito, para editar, que me lleve a otra página para editar el gasto (frm_editar_gasto). Por eso debo crear otro frm en el otro archivo. En ese otro archivo no voy a mostrar la parte de la tabla porque no me interesa.
Tampoco voy a necesitar las alertas. 
En frm_gasto.php hago click en editar. Eso me lleva, junto con la variable gasto_id, a la variable frm_editar_gasto.php. Por eso el botón es un link, pero parece un botón. Para editarlo, le tengo qué decir qué había. Para eso necesito gasto_id. Hago un select.

Creo en la base de datos un nuevo campo llamado fecha_editar con un datetime para saber la fecha de edición. Como predeterminado pongo NULO. Pues, así, los datos no editados tendrán nulo como valor en fecha_editar. 

Con echo $datos["descripcion"] hace que se vea el valor del campo descripción, así el usuario ve qué está escrito para que pueda editarlo luego. Lo mismo con importe. 
EN fecha_editar debe ir $fecha; pues, va la fecha actual.

Me lleva al frm originar con una url que dice GASTO_EDITAR_EXITO, si funcionó; FRACASO, si no.
                                 -->
                                </td>
                            
                            </tr>
                            
                        <?php

                            }

                        ?>
                         
                    </tbody>

                </table>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <!-- Decargué la versión minificada de la librería de JS en jQuery CDN. -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!-- Los links de arriba los tengo que copiar para que los modales me funciones!! -->
        

      <!-- Modifiquemos la tabla con JS: -->
      <!-- EVENTOS. Quiero que cuando le haga click a la cabecera de la tabla se ponga azul: -->

        <script>

            $(#tabla).click(function(){//Le digo a qué elemento aplicarle lo que voy a decir. Como escribo el id debo poner el numeral (#) primero. click es un evento que, literal, es cuando hago "click" con el mouse.
                // O sea, le digo, cuando hagas click en el elemento con el id tabla, quiero que hagas la siguiente función:

                console.log("Click en tabla");
                //Cada vez que hago click en la tabla, lo muestra por consola. Eso lo puede hacer porque JS es un lenguaje que trabaja just in time. Por eso, lo puede mostrar en la consola en tiempo real mientras que hago click en la tabla.

                $(this).addClass("table-dark");//Le digo: a la tabla agregale el atributo table-dark. Con la función $(this) trabaja con el elemento ya seleccionado en $(). Con la función addClass le agrega el atributo que esté entre paréntesis a mi elemento con el que estoy tabajando (#tabla, en mi caso).
                $(this).removeClass("table-striped");//Con la función removeClass me saca el atributo que está entre paréntesis.
                }).

                //JS es un lenguaje para funcionalidades, no para la parte visual. La función que hizo JS en este caso fue cambiar el color de la tabla cuando hago click en id tabla. Pero la parte estética la hizo Boostrap basado en CSS, NO JAVA SCRIPT. De nuevo, el color lo da Boostrap basado en CSS, Js lo que hizo fue la función que toma el color dark al hacer un click.
        </script>


    </body>

</html>
