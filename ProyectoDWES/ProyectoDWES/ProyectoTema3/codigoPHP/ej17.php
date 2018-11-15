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
        <h1>Ejercicio 17</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 03/10/2018
          Comentarios: el programa crea un array bidimensional numérico y lo recorre con foreach, while y for.
         */
        $numfila = 1;
        while ($numfila <= 20) { //Recorre las filas del array mientras ésta sea menor o igual a 20.
            $numasiento = 1; // Asigna el valor 1 de columna al array cuando se pasa a la siguiente fila.
            while ($numasiento <= 15) { //Recorre las columnas del array mientras ésta sea menor o igual a 15.
                $teatro[$numfila][$numasiento] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
                $numasiento++; //Avanza el puntero de las columnas del array en una posición.
            }
            $numfila++; //Avanza el puntero de las filas del array en una posición.
        }
        //Asignamos 5 valores dentro del array.
        $teatro[1][3] = "Pepe";
        $teatro[5][6] = "Luis";
        $teatro[7][9] = "Antonio";
        $teatro[10][11] = "Mario";
        $teatro[12][13] = "Pedro";
        echo "<h3>Array recorrido con un foreach</h3>";
        foreach ($teatro as $numfila => $a_fila) { //Recorre las filas del array guardando el número de fila.
            foreach ($a_fila as $numasiento => $nombre) { //Recorre las columnas del array guardando el número de asiento y el nombre del cliente.
                if (!is_null($teatro[$numfila][$numasiento])) {
                    echo "<p>El cliente en la fila " . $numfila . " y el asiento " . $numasiento . " se llama " . $nombre . "</p>"; //Imprime por pantalla el número de fila, asiento y nombre del cliente de la posición a la que apunta el puntero del array.
                }
            }
        }
        echo "<h4>Count del array teatro</h4>";
        echo "<p>El número de filas del array teatro es " . count($teatro) . "</p>";
        echo "<h3>Array recorrido con un while</h3>";
        $numfila = 1; //Inicializa el contador de filas a 1.
        while ($numfila <= 20) { //Recorre las filas del array mientras ésta sea menor o igual a 20.
            $numasiento = 1; // Asigna el valor 1 de columna al array cuando se pasa a la siguiente fila.
            while ($numasiento <= 15) { //Recorre las columnas del array mientras ésta sea menor o igual a 15.
                if ($teatro[$numfila][$numasiento]) { //Valora si la posición donde apunta el puntero del array está vacía o tiene valor.
                    echo "<p>El cliente en la fila " . $numfila . " y el asiento " . $numasiento . " se llama " . $teatro[$numfila][$numasiento] . "</p>"; //Imprime por pantalla el número de fila, asiento y nombre del cliente de la posición a la que apunta el puntero del array.
                }
                $numasiento++; //Avanza el puntero de las columnas del array en una posición.
            }
            $numfila++; //Avanza el puntero de las filas del array en una posición.
        }
        echo "<h3>Array recorrido con un for</h3>";
        for ($numfila = 1; $numfila <= 20; $numfila++) { //Recorre las filas del array y va avanzando el puntero de éstas.
            for ($numasiento = 1; $numasiento <= 15; $numasiento++) { //Recorre las columnas del array y va avanzando el puntero de éstas.
                if ($teatro[$numfila][$numasiento]) { //Valora si la posición donde apunta el puntero del array está vacía o tiene valor.
                    echo "<p>El cliente en la fila " . $numfila . " y el asiento " . $numasiento . " se llama " . $teatro[$numfila][$numasiento] . "</p>"; //Imprime por pantalla el número de fila, asiento y nombre del cliente de la posición a la que apunta el puntero del array.
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