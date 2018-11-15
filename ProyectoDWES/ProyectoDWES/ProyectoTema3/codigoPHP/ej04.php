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
        <h1>Ejercicio 4</h1>
        <p>
            <?php
            /**
               @author: Christian Muñiz de la Huerga
               @since: 02/10/2018
               Comentarios: el programa muestra la hora en Oporto formateada en portugués.
             */
            setlocale(LC_TIME, 'pt_PT.UTF-8'); //Selecciona el idioma portugués.
            date_default_timezone_set('Europe/Lisbon'); //Selecciona la zona horaria en Portugal.
            echo "<p>Hora en Oporto: ".date('H:i:sa')."</p>"; //Imprime por pantalla la hora en Portugal.
            echo "<p>Fecha Oporto: ".strftime("%A %d de %B del %Y")."</p>"; //Imprime por pantalla la fecha en Portugal.
            ?>
        </p>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>