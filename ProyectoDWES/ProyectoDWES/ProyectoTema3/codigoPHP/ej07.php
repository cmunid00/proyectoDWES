<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="../../webroot/css/estilos.css"/>
        <style>
            h1{
                font: normal 3.4em "fb", "Trebuchet MS", Helvetica, Arial;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 7</h1>
        <?php
        /**
           @author: Christian Muñiz de la Huerga
           @since: 02/10/2018
           Comentarios: el programa muestra el path del fichero y el nombre del fichero que se está ejecutando.
         */
        echo "<p>Path completo: " . $_SERVER['PHP_SELF'] . "</p>"; //Imprime por pantalla el path completo del archivo actual y su nombre.
        echo "<p>Nombre fichero: " . array_pop(explode('/', $_SERVER['PHP_SELF']))."</p>"; //Imprime por pantalla el nombre del archivo que se está ejecutando actualmente.
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>