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
        <h1>Ejercicio 1</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 05/11/2018
          Comentarios: en este programa se conecta a la base de datos y se comprueban los errores.
         */
        include '../config/configuracionDB.php';
        $baseDeDatos = new mysqli(); //Se inicia la variable como un elemento mysqli.
        $baseDeDatos->connect(IP, USUARIO, PASS, DB); //Se conecta a la base de datos pasándole la IP, usuario, contraseña y base de datos.
        if ($baseDeDatos->connect_error == null) { //Si no se produce ningún error se llevan a cabo las siguientes instrucciones.
            echo "<p>La conexión ha sido correcta</p>"; //Imprime por pantalla un mensaje.
        } else {
            echo "<p>Se ha producido el error " . $baseDeDatos->connect_error . "</p>"; //Se imprime por pantalla el mensaje de error correspondiente.
            echo "<p>Se ha producido el error con el código " . $baseDeDatos->connect_errno . "</p>"; //Se imprime por pantalla el código de error correspondiente.
        }
        $baseDeDatos->close(); //Cierra la base de datos.
        $baseDeDatos->connect('192.168.20.1', USUARIO, PASS, DB); //Se conecta a la base de datos pasándole la IP, usuario, contraseña y base de datos.
        if ($baseDeDatos->connect_error == null) { //Si no se produce ningún error se llevan a cabo las siguientes instrucciones.
            echo "<p>La conexión ha sido correcta</p>"; //Imprime por pantalla un mensaje.
        } else {
            echo "<p>Se ha producido el error " . $baseDeDatos->connect_error . "</p>"; //Se imprime por pantalla el mensaje de error correspondiente.
            echo "<p>Se ha producido el error con el código " . $baseDeDatos->connect_errno . "</p>"; //Se imprime por pantalla el código de error correspondiente.
        }
        $baseDeDatos->close(); //Cierra la base de datos.
        ?>
        <div class="atras"><a href="../indexProyectoTema4.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>