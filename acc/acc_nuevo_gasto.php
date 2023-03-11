<?php
    if(isset($_POST["importe"])AND
            ($_POST["tipo_gasto"]) AND
            ($_POST["importe"])){ //debo comprobar que existan esas variables para que el usuario no pueda saltearse pasos.

        $descripcion=$_POST["descripcion"];
        $tipo_gasto=$_POST["tipo_gasto"];
        $importe=$_POST["importe"];
        $usuario_id=$_GET["usuario_id"];
        $fecha=date("Y-m-d H:i:s");//Le envío la fecha a la base de datos.
                //Me traje todas las variables
        
        include "../conexion.php"; // Gracias al código guardado dentro del archivo conexion.php ya estoy conectado al servidor de mi base de datos y a la base de datos.

        //Ahora sí, con la consulta INSERT INTO guardaremos los datos en la base de datos:
        $sql="INSERT INTO   gastos2(usuario_id,
                                    descripcion,       /** Por convención, la variable que contiene a la consulta INSERT INTO se llama $sql */
                                    tipo_gasto, 
                                    importe, 
                                    fecha) 
                                    VALUES (".$usuario_id.",
                                        '".$descripcion."',
                                     '".$tipo_gasto."',
                                      ".$importe.",
                                       '".$fecha."')";      
                    
                //** Acá hacemos la consulta. Le debo decir qué tabla consultar de mi base de datos (la cual ya fue conectada en la función include) */
//Revisar el orden de los elementos de la consulta INSERT INTO en el pdf para entenderlo.
        //** Acordate que no se puede mezclar html con php. Por ende, debo concatenar con los puntos y comillas. Además, mysql exige que sí o sí las variables que son strings vayan entre comillas (no confundir comillas). El importe, como es número, no va entre comillas; pero la fecha sí. 
        //**También debo respetar el orden de las variables. */
        //** Finalmente, por una cuestión de que sea fácil de leer mi código, pongo cada parámetro y variable en un renglón distinto.  */

        $res=mysqli_query($link, $sql);//Con esta consulta el dato se termina guardando en mi base de datos. Por convención, la variable que contiene a la consulta mysqli_query se llama $res.

        //O sea, mirá todos los pasos para guardar un dato en una base de datos:
        // 1)Me conecto al servidor de mi base de datos con la consulta mysqli_connect, la cual está en el archivo conexion.php.
        // 2)Me conecto a mi base de datos con la consulta mysqli_select_db, la cual está en el archivo conexion.php.
        // 3)Consulta INSERT INTO
        // 4)Consulta mysqli_query



        if($res){
            header("location:../frm/frm_gastos.php?INFORMACION=GASTO_EXITO");
        }else{
            header("location:../frm/frm_gastos.php?INFORMACION=GASTO_FRACASO");
        }
        //** header("location:localización del archivo"); es una función primaria de php. Simplemente, me redirecciona a una página. */
         //** Ahí le digo al sistema: si hace la consulta (lo cual implica que los gastos estén guardados) enviame de nuevo a la pantalla principal. Porque no da que el usuario vaya a otra página solo para que diga "volver al formulario" o "datos guardados con éxito". No hace falta que salte a ninguna otra página. Con este if, la página va y viene, pero el usuario no lo verá.  */
        //** Luego, puse envío dos variables diferentes (según si el dato se guardó o no) vía URL (vía GET, por ende) al archivo frm_gastos.php. Entonces, voy a poder trabajar con esas variables en el otro archivo.  */

    }else{///Así no permite a nadie ingresar directamente a las acciones sin completar el formulario.

        header("location:../frm/frm_gastos.php?INFORMACION=FORMULARIO");
        
    }

?>
<!-- Entonces, en este archivo lo que hice fue:
        1) Me traje las variables $descripcion, $tipo_gasto e importe del formulario frm_gastos.php con los valores que el usuario le haya asignado. También me traje $fecha desde la base de datos. 
        2) Me conecté al servidor de mi base de datos y a la base de datos en el archivo conexion.php. Con la función primaria de php include convoqué a conexion.php en el presente archivo.
        3) Con las consultas INSERT INTO y mysqli_query() guardo los datos que me traje en las variables en mi base de datos. 
        4) Con la función primaria de php header redirecciono al usuario directamente a frm_gastos.php con la variable INFORMACION vía URL (GET, por ende). Por eso, el usuario nunca ve otra página. -->