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
        <h1>Ejercicio 5</h1>
        <?php
        /**
           @author: Christian Muñiz de la Huerga
           @since: 02/10/2018
           Comentarios: el programa muestra una variable timestamp previamente inicializada.
         */
        $fecha = new DateTime(); //Inicializa la variable $fecha como una variable DateTime con fecha y hora.
        $fecha->setTimestamp(1538504786); //Fija el Timestamp que se encuentra entre paréntesis a la variable $fecha.
        echo "<p>Timestamp: " . $fecha->getTimestamp()."</p>"; //Imprime por pantalla el Timestamp como valor entero.
        echo "<p>Fecha: " . $fecha->format('Y-m-d H:i:s')."</p>"; //Formatea el Timestamp como una variable de tipo Date, formando una fecha.
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>