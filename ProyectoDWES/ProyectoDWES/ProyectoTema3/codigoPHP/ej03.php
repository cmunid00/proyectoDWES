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
        <h1>Ejercicio 3</h1>
        <p>
            <?php
            /**
               @author: Christian Muñiz de la Huerga
               @since: 02/10/2018
               Comentarios: el programa muestra la hora en España formateada en castellano.
             */
            setlocale(LC_TIME, 'es_ES.UTF-8'); //Selecciona el idioma.
            date_default_timezone_set('Europe/Madrid'); //Selecciona la zona horaria.
            echo "<p>Hora en España: " . date('H:i:sa') . "</p>"; //Imprime por pantalla la hora en España.
            echo "<p>Fecha España: " . strftime("%A %d de %B del %Y")."</p>"; //Imprime por pantalla la fecha en España.
            ?>
        </p>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>