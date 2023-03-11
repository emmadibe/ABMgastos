<?php

    if(isset($_GET["descripcion"]) AND
        isset($_GET["tipo_gasto"]) AND
        isset($_GET["importe"])){

            $descripcion=$_GET["descripcion"];
            $tipo_gasto=$_GET["tipo_gasto"];
            $importe=$_GET["importe"];
            $gasto2_id=$_GET["gasto2_id"]; //Esta variable me la traigo vía GET.
            $fecha=date("Y-m-d H:i:s"); //Me traigo todas las variables.

            include "../conexion.php";

            $sql= "UPDATE gastos2 SET descripcion='".$descripcion."', 
                                    tipo_gasto='".$tipo_gasto."',
                                    importe=".$importe.",
                                    fecha_editar='".$fecha."' 
                                WHERE gasto2_id=".$gasto2_id;
                // UPDATE es la consulta para editar. En el WHERE le digo de dónde sacar los datos.
                //Todas esas variables deben estar creadas en mi base de datos. 
            
            $res=mysqli_query($link,$sql);
            //mysqli_query nos permite hacer la consulta a la base de datos
        //mysqli_query("credencial", "consulta")

        if($res){

            header("location: ../frm/frm_gastos.php?INFORMACION=GASTO_EDITAR_EXITO");

        }else{

            header("location: ../frm/frm_gastos.php?INFORMACION=GASTO_EDITAR_FRACASO");
            
        }//Acá lo que hago es: si mysqli_query() me tira true (lo cual significa que los datos fueron editados y guardados), me envíe al frm_gastos.php y que en la URL diga "GASTO_EDITAR_EXITO"; sino, que diga "GASTO_EDITAR_FRACASO".

    }else{
        echo "<h1>Debe pasar por el formulario primero</h1>";
    }
    echo "<a href='frm_gastos.php' class='btn btn-primary'>Volver al formulario</a>";

?>