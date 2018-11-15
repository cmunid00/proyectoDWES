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
        <h1>Ejercicio 13</h1>
        <?php
        /**
           @author: Christian Muñiz de la Huerga
           @since: 03/10/2018
           Comentarios: el programa cuenta las visitas de la página desde una fecha.
         */
        $archivo = "../tmp/visitas.txt"; // Selecciona el fichero.
        $f = fopen($archivo, "r"); // Abre el fichero que contará las visitas para lectura.
        if ($f) {
            $contador = fread($f, filesize($archivo)); // Lee el fichero.
            $contador = $contador + 1; // IncrementA el contador.
            fclose($f); // Cierra el fichero.
        }
        $f = fopen($archivo, "w+"); // Abre el fichero que contará las visitas como escritura.
        if ($f) {
            fwrite($f, $contador); // Sobreescribe el contador actualizado sumándole 1.
            fclose($f); // Cierra el fichero.
        }
        echo "<p>El programa tiene " . $contador . " visitas</p>"; //Imrpime por pantalla el contador de visitas.
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>