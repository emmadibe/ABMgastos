<?php include "config.php"; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="frm_gastos.php">Gastos</a>
        </li>
    </ul>
    <span class="navbar-text">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle">&nbsp;</i><?php echo @$usuario_id ?>
                </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="#">Cambiar nombre usuario</a>
                        <a class="dropdown-item" href="#">Cambiar contraseña</a>
                    </div>
                </div>
        <!-- <a class="nav-link btn btn-danger" href="../acc/acc_salir.php"><i class="bi bi-person-circle">&nbsp;</i>Usuario</a> -->
    </span>
    &nbsp;
    <span class="navbar-text">
        <a class="nav-link btn btn-danger  btn-sm" href="../acc/acc_salir.php"><i class="bi bi-door-open">&nbsp;</i>Salir</a>
    </span>
  </div>
</nav>
       
       <!-- En boostrap busqué como "person" -->
                        <!-- También busqué en Boostrap Dropdown. -->
    <!-- Copiar el código que copió el profe. 
 Utilizo USUARIO, la constante, para que se vea el nombre dle usuario. Le digo a la barra: escribime lo que dice la constante usuario. Creo una constante y una variable porque no va a cambiar el usuario. Es constante, no varía. -->
 

<!-- Me debe llevar a la página principal. -->


    
      <!-- Es un link, un vínculo, con forma de botón que me envía al archivo acc_salir, lo cual me cierra sesión y me redirecciona automáticamente a index.php -->


<!-- La barra la saqué de Boostrap. Pongo NAVBAR y me tira la página un montón de modelos de barras prediseñadas. También busco en ICONS para agregarle un ícono lindo ccomo un tachito.

No es necesario agregar Boostrap porque eso está en los formularios. Recordá que este archivo no lo ve el usuario.

Recordar que <u></u> en html es una lista y <li></li> son los elementos de esa lista. Lo vimos en la primera clase.

Debo incluir la barra en cada fmr.-->