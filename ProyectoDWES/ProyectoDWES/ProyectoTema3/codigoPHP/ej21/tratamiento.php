<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="../../../webroot/css/estilos.css"/>
        <style>
            h1{
                font: normal 3.4em "fb", "Trebuchet MS", Helvetica, Arial;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 21</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 09/10/2018
          Comentarios: el programa muestra los datos introducidos por el usuario en el formulario anterior.
         */
        echo "<h2>Datos personales</h2>";
        echo "<p>El nombre introducido es: ".$_POST['nombre']."</p>"; //Se muestra la variable del campo input nombre.
        echo "<p>Los apellidos son: ".$_POST['apellidos']."</p>"; //Se muestra la variable del campo input apellidos.
        echo "<p>El correo electrónico es: ".$_POST['correo']."</p>"; //Se muestra la variable del campo input correo.
        echo "<p>La contraseña elegida es: ".$_POST['pass']."</p>"; //Se muestra la variable del campo input pass.
        echo "<p>La fecha de nacimiento es: ".$_POST['dia']."/".$_POST['mes']."/".$_POST['anyo']."</p>"; //Se muestra las variables del campo fecha de nacimiento.
        ?>
        <div class="atras"><a href="ej21.php"><img src="../../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>