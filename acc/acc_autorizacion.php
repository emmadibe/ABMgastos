<?php
    
    SESSION_START(); //SIEMPRE SE USA PARA EL LOGIN EN PHP. 

    if(isset($_POST["usuario"]) AND
        (isset($_POST["pass"]))){

            $usuario=$_POST["usuario"];
            $pass=$_POST["pass"]; //me traigo las variables.

            include "../conexion.php";

            $sql="SELECT * FROM usuario WHERE usuario='".$usuario."' AND pass='".$pass."'";
            /**Quiero que me selecciones de la tabla usuario donde usuario sea igual a usuario y pass sea igual a pass.*/
    
        //mysqli_query nos permite hacer la consulta a la base de datos
        //mysqli_query("credencial", "consulta")
        //SET significa: a este campo, escribile este dato.

        $res=mysqli_query($link,$sql); //Me lo transforma en un array el res

        $datos= mysqli_fetch_array($res);//La función mysqly_fetch_array me decodifica un dato en forma de array. Debo hacerlo. 

        if(mysqli_affected_rows($link)){ //el affected es una consulta que permite ver si hay una coincidencia. Si marca 1, hay coincidencia ( o sea, el usuario fue bien ingresado); sino, 0. //Si encontraste alguna fila (lo cual quiere decir que el usuario y la contraseña ingresados son correctos) hacé lo siguiente:
            $_SESSION["usuario"]=$usuario;
            
            $_SESSION["usuario_id"]=$datos["usuario_id"]; //COn esto podría decir: traeme los gastos de ESE usuario_id.
            header("location:../frm/frm_gastos.php");
        }else{
            header("location:../index.php?INFORMACION=ERROR_CREDENCIALES"); //En frm_login voy a poner un if que si INFORMACION=ERROR_CREDENCIALES salga un cartelito.
        }//if mysqli affected rows
    //O sea, si hay coincidencia (usuario y pass bien ingresado) me manda a la página de gastos; sino, me devuelve a la página de login.
    }
?>

<!-- Dentro de la base de datos gastos_db debo crear otra tabla a la cual llamaré usuario. Dentro de esa tabla creo los siguientes campos:
-usuario:id      SIEMPRE el primer campo es el _id y le debo seleccionar el A.I.
-usuario
-pass
-fecha
-fecha_ult_conex

El primer usuario debe ser creado desde la página de sql. Aprieto "insertar".-->