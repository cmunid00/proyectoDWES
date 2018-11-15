﻿<!DOCTYPE html>
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
        <h1>Ejercicio 6</h1>
        <?php
        /**
           @author: Christian Muñiz de la Huerga
           @since: 02/10/2018
           Comentarios: el programa muestra la fecha y día de la semana de dentro de 60 días.
         */
        $fecha = date('j-m-Y'); //Inicializa la variable $fecha con tipo Date con formato día-mes-año.
        $fecha2 = strtotime('+60 day', strtotime($fecha)); //Crea una nueva fecha y suma 60 días a la variable $fecha.
        $fecha2 = date('j-m-Y', $fecha2); //Da formato a la variable anteriormente creada con formato día-mes-año.
        echo "<p>La fecha actual es: " . $fecha . "</p>"; //Imprime por pantalla la variable $fecha y añade un salto de línea.
        echo "<p>La nueva fecha es: $fecha2<p>"; //Imprime por pantalla la variable $fecha2.
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>