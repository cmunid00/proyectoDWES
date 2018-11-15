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
        <h1>Ejercicio 18</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 03/10/2018
          Comentarios: el programa crea un array bidimensional numérico y lo recorre con funciones.
         */
        while ($fila <= 20) { //Recorre las filas del array mientras ésta sea menor o igual a 20.
            $asiento = 1; // Asigna el valor 1 de columna al array cuando se pasa a la siguiente fila.
            while ($asiento <= 15) { //Recorre las columnas del array mientras ésta sea menor o igual a 15.
                $teatro[$fila][$asiento] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
                $asiento++; //Avanza el puntero de las columnas del array en una posición.
            }
            $fila++; //Avanza el puntero de las filas del array en una posición.
        }
        //Asignamos 5 valores dentro del array.
        $teatro[1][3] = "Pepe";
        $teatro[5][6] = "Luis";
        $teatro[7][9] = "Antonio";
        $teatro[10][11] = "Mario";
        $teatro[12][13] = "Pedro";
        reset($teatro);
        echo "<h3>Array recorrido con funciones</h3>";
        foreach ($teatro as $numfila => $a_fila) { //Recorre las filas del array guardando el número de fila.
            foreach ($a_fila as $numasiento => $nombre) { //Recorre las columnas del array guardando el número de asiento y el nombre del cliente.
                if (!is_null($teatro[$numfila][$numasiento])) {
                    echo "<p>El cliente en la fila " . $numfila . " y el asiento " . $numasiento . " se llama " . $nombre . "</p>"; //Imprime por pantalla el número de fila, asiento y nombre del cliente de la posición a la que apunta el puntero del array.
                }
            }
        }
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>