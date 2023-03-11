<?php
    $info=$_GET["INFORMACION"];

    switch($info){

        case "GASTO_EXITO";
?>

            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">EXCELENTE!</h4>
            <p>Su gasto ha sido guardado exitosamente. Usted podrá verlo reflejado en la tabla de gastos.</p>
            <hr>
            <p class="mb-0">Recuerde que puede seguir agregando tantos gastos como desee.</p>
            </div>

    <?php

        break;

    ?>

    <?php

        case "GASTO_FRACASO";

    ?>

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">¡¡¡¡ERROR!!!!</h4>
                <p>Lamentablemente, su gasto no pudo ser guardado.</p>
                <hr>
                <p class="mb-0">Revise su conexión a internet e intentelo de nuevo, por favor.</p>
            </div>

    <?php

        break;

    ?>

    <?php

        case "GASTO_ELIMINACION_EXITO";

    ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Operación realizada correctamente!</h4>
            <p>Su gasto ha sido eliminado correctamente.</p>
            <hr>
            <p class="mb-0">Suerte.</p>
        </div>

    <?php

        break;

    ?>

    <?php

        case "GASTO_ELIMINACION_FRACASO";

    ?>

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">¡¡¡¡ERROR!!!!</h4>
                <p>Lamentablemente, su gasto no pudo ser eliminado.</p>
                <hr>
                <p class="mb-0">Revise su conexión a internet e intentelo de nuevo, por favor.</p>
            </div>

    <?php

        break;

    ?>

    <?php

        case "GASTO_EDITAR_EXITO";

    ?>
    
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">EXCELENTE!!</h4>
                <p>Su gasto ha sido editado y guardado con éxito.</p>
                <hr>
                <p class="mb-0">Puede seguir editando o agregando datos.</p>
            </div>


    <?php

        case "GASTO_EDITAR_FRACASO";

    ?>

    <?php

        break;

    ?>

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">¡¡¡¡ERROR!!!!</h4>
                <p>Lamentablemente, su gasto no pudo ser editado.</p>
                <hr>
                <p class="mb-0">Revise su conexión a internet e intentelo de nuevo, por favor.</p>
            </div>

    <?php

        break;

    ?>
    
    <?php

        case "ERROR_CREDENCIALES":
    ?>
            
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El usuario y/o la contraseña son incorrectos!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

    <?php
            
         break;

    ?>

<?php

        case "PROHIBIDO";

?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Debe loguearse antes de entrar al sistema.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

<?php

        break;

?>

<?php

        case "FORMULARIO";

?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                No se permite el ingreso a las acciones!!!!!!!!!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

<?php

        break;

?>


<?php
    }
?>
<!-- 
    La instrucción switch es una función muy similar a if. También genera estructuras condicionales. Su sintaxis es:
        
        switch ($variable){

            case "valor1";

                Acción a realizar en caso de que el valor de la variable sea 1.

            break;

            case "valor2";

                Acción a realizar en caso de que el valor de la variable sea 2.

            break;

        }
 -->