<?php

   include "../conexion.php"; //me conecta a la base de datos.

    if(isset($_GET["gasto2_id"])){

        $gasto2_id=$_GET["gasto2_id"];

        $sql="DELETE FROM gastos2 WHERE gasto2_id=".$gasto2_id;//DELETE es la consulta a la base de datos para borrar un dato. Digo de dónde lo debe sacar (la base de datos gasto_id). Dice: borrá de la tabla gastos donde el campo gasto_id
        //Primero debía comprobar que exista la variable gasto_id. Si no existe, no hay nada para borrar.
        //Acordate que tengo el pdf con las consultas. 
        $res=mysqli_query($link, $sql); //recordá que devuelve false si no se pudo hacer y un true si se puede hacer

        if($res){
            header("location:../frm/frm_gastos.php?INFORMACION=GASTO_ELIMINACION_EXITO"); 
        }else{
            header("location:../frm/frm_gastos.php?INFORMACION=GASTO_ELIMINACION_FRACASO");
        }//Acá digo: si $res devuelve true (lo cual significa que el dato se borró), enviame a frm_gastos.php y que en la URL diga GASTO_ELIMINACION_EXITO. Entonces, lo que le estoy diciendo al sistema es: si lo hizo, si existe(tiró true) andá a frm_gastos y tirame en la url GASTO_ELIMINACION_EXITO; sino, vas a frm_gastos.php pero con el valor de la variable INFORMACION GASTO_ELIMINACION_FRACASO.
    }


        
?>
<!-- En este archivo necesito que se haga la acción que se borre un dato. Para eso, necesita hacerle una consulta a la base de datos. Recordá que todas las consutlas las tengo en el pdf.
Con el include ya me conecto a la base de datos. 
 -->