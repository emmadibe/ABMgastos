<?php
    SESSION_START();

    SESSION_DESTROY();//Dstruye las variables. Es para cerrar sesión.

    header("location:../index.php");



?>

<!-- Al entrar a este archivo, me cierra la sesión. -->