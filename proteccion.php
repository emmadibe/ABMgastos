<?php

    SESSION_START();

    if(!isset($_SESSION["usuario"])){

        header("location:index.php?INFORMACION=PROHIBIDO");
        exit();//esto me asegura que no continúa.
         //SI no existe la varible $_SESSION, significa que nunca se logueó, que intentó entrar al archivo directamente. Entonces, lo mando al formulario de iniciar sesión. Es fundamental hacer esto.
         
    }
   

?>

<!-- Código que utilizaré mucho. Es de seguridad. Siempre debe iniciar sesión. -->