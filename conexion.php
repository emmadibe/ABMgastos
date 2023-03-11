<?php

    $link=mysqli_connect("localhost", "root", ""); //Me conecto al SERVIDOR de la base de datos. Por convención, la variable que contiene a la consulta mysqli_connect se llama $link. Yo le podría haber puesto $pepito, obviamente, pero siempre es bueno trabajar con convenciones por si alguien que no soy yo lee mi código. O incluso yo podría olvidarme y al ver que dice $link ya sé de qué se trata por convención.

    mysqli_select_db($link, "gastos2_db"); //Acá me conecto con mi base de datos.
    //Cómo conectarme al servidor de mi base de datos: mysqli_select_db($variablequemeconectaalservidordelabasededatos, "nombre de mi base de datos");

?>
<!-- Este archivo lo uso para conectarme a la base de datos. Lo convoco a otros archivos mediante un include. -->