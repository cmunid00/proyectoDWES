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
          @since: 06/11/2018
          Comentarios: en este programa se conecta a la base de datos y se recogen todos los registros de la tabla Departamentos en un array, que se muestra.
         */
        include '../config/configuracionDB.php';
        try {
            $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO.
            $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p>Conexión correcta</p>";
            $consulta = $baseDeDatos->query('select * from Departamento'); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
            echo "<p>Se encontraron ".$consulta->rowCount()." registros</p>";
            while ($registro = $consulta->fetchObject()) {
                echo "<p>" . $registro->CodDepartamento . "=" . $registro->DescDepartamento . "</p>"; //Imprime por pantalla la clave primaria y la descripción del elemento al que apunta el puntero del array.
            }
        } catch (PDOException $error) {
            echo "<p>Error " . $error->getMessage() . "</p>"; //Si se produce algún error en la conexión se muestra el mensaje de la excepción.
        } finally {
            unset($baseDeDatos); //Se cierra la conexión con la base de datos.
        }
        ?>
        <div class="atras"><a href="../indexProyectoTema4.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>