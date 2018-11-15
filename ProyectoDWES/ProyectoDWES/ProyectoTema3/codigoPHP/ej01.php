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
           @since: 02/10/2018
           Comentarios: en este programa se inicializan y muestran variables de distintos tipos.
         */
        $cadena = "cadena"; //inicializa la variable $cadena con un valor String.
        $entero = 1; //Inicializa la variable $entero con un valor Entero.
        $decimal = 13.9; //Inicializa la variable $decimal con un valor Decimal.
        $bool = true; //Inicializa la variable $bool con un valor Booleano.
        $array = [1, 2, 3, 4, 5]; //Inicializa la variable $array como un array de una dimensión.
        print "<p>La variable " . $cadena . " es de tipo " . gettype($cadena)."</p>"; //Imprime por pantalla el valor de la variable $cadena y su tipo.
        printf("%s es una cadena", $cadena); //Imprime por pantalla la variable $cadena, que es tratada como un String con el especificador %s.
        print_r($array); //Imprime por pantalla todos los valores del Array y su posición.
        echo "<br>";
        var_dump($entero, $decimal); //Imprime por pantalla las variables $entero y $decimal y sus tipos.
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>