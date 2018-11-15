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
          @since: 05/11/2018
          Comentarios: en este programa se conecta a la base de datos y se recogen todos los registros de la tabla Departamentos en un array, que se muestra.
         */
        include '../config/configuracionDB.php';
        $baseDeDatos = new mysqli(); //Se inicia la variable como un elemento mysqli.
        $baseDeDatos->connect(IP, USUARIO, PASS, DB); //Se conecta a la base de datos pasándole la IP, usuario, contraseña y base de datos.
        if ($baseDeDatos->connect_error == null) { //Si no se produce ningún error se llevan a cabo las siguientes instrucciones.
            echo "<p>La conexión ha sido correcta</p>"; //Imprime por pantalla un mensaje.
            $consulta = $baseDeDatos->query('select * from Departamento', MYSQLI_USE_RESULT); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
            $objetoResultados = $consulta->fetch_object(); //Vuelca el resultado del query en un array.
            while($objetoResultados!=null){ //Mientras el array siga teniendo registros realiza las siguientes instrucciones.
                echo "<p>".$objetoResultados->CodDepartamento."=".$objetoResultados->DescDepartamento."</p>"; //Imprime por pantalla la clave primaria y la descripción del elemento al que apunta el puntero del array.
                $objetoResultados = $consulta->fetch_object(); //Vuelca el siguiente resultado del query en un array.
            }
            echo "<p>Número de registros: ".$consulta->num_rows."</p>"; //Imprime por pantalla el número de registros en el array.
        } else {
            echo "<p>Se ha producido el error " . $baseDeDatos->connect_error . "</p>"; //Se imprime por pantalla el mensaje de error correspondiente.
            echo "<p>Se ha producido el error con el código " . $baseDeDatos->connect_errno . "</p>"; //Se imprime por pantalla el código de error correspondiente.
        }
        $baseDeDatos->close(); //Se cierra la conexión con la base de datos.
        ?>
        <div class="atras"><a href="../indexProyectoTema4.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>