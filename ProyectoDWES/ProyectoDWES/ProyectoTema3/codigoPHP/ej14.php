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
        <h1>Ejercicio 14</h1>
        <?php
        /**
           @author: Christian Muñiz de la Huerga
           @since: 03/10/2018
           Comentarios: el programa comprueba las librerías predeterminadas empleadas y se añade una librería propia que cuenta las visitas.
         */
        //Los módulos predeterminados de php se encuentran en el directorio /usr/lib/apache2/modules/libphp7.2.so
        include "../core/libreria1.php"; // Incluye la librería propia creada.
        echo "<p>El programa tiene " . contador() . " visitas</p>"; //Imprime por pantalla el valor devuelto por la función contador.
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>