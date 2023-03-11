<!-- COmo es el archivo principal, debe llamarse index. El sistema es el primer archivo que va a buscar. -->

<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <title>Iniciar sesión</title>
    </head>
    <body>

        <div class="conteiner text-center">

        <?php

            if(isset($_GET["INFORMACION"])){       
                    include ("alertas.php");
            }//if isset

        ?>

            <div class="row">

                <div class="col-12">

                    <br><hr><h1 style="color:purple">Iniciar sesión<hr></h1>

                </div>

            </div>

                <div class="row">

                    <div class="col-4">

                        &nbsp;

                    </div>

                    <div class="col-4">

                    <form action="acc/acc_autorizacion.php" method="POST">

                        <div class="form-group">

                            <label for="usuario">Ingrese usuario</label>
                            <input type="text" class="form-control" name="usuario" required>

                        </div>

                        <div class="form-group">

                            <label for="pass">Ingrese su contraseña</label>
                            <input type="password" class="form-control" name="pass" required>
                            <!-- Poniendo "password" como valor del atributo type, no se muestra lo que escribís. 
                                    Recordá también que, para que la contraseña no se vea en el URL, la debo enviar al otro archivo vía POST. -->

                        </div>

                        <button type="submit" class="btn btn-primary" name="boton">Iniciar sesión</button>

                    </form>
                        
                    </div>

                    <div class="col-4">

                        &nbsp;

                    </div>

                </div>

            

        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- Lo de arriba son los links que debo copiar de Boostrap para que las alertas se vean.  -->
    </body>

</html>
<!-- 

        La idea es que cada usuario tenga su tabla de gastos y que no pueda ver la de los demás. Por eso, cuando genero el dato necesito que me diga de quién es el dato. En mysql, en estructura, agrego un campo llamado usuario_id (INT) dentro de la tabla gastos2 QUE NO VA A SER A.I.
   Al usuario_id me lo descargo desde el servidor.

 -->

 <!-- En la clase del 10 de marzo modifiqué los siguientes archivos:
    1) Problema de session start porque is already active. El archivo de proteccion no va en config.
    


-->