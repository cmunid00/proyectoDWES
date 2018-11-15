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
        <h1>Ejercicio 2</h1>
        <?php
        /**
           @author: Christian Muñiz de la Huerga
           @since: 02/10/2018
           Comentarios: el programa inicializa y muestra una variable Heredoc
         */
        $heredoc = <<<cadena
            DAW2<br/>
            DWES<br/>
            Ejercicio Heredoc
cadena;
        print "<p>".$heredoc."</p>";
        /* Se declara la variable heredoc con la notación <<<'nombre_variable',
         * luego se añaden líneas de código y se finaliza la variable heredoc
         * introduciendo el mismo nombre de variable sin tabular, finalmente
         * se muestra por pantalla. */
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>