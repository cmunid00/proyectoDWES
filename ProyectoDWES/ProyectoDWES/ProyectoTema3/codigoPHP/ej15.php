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
        <h1>Ejercicio 15</h1>
        <?php
        /**
           @author: Christian Muñiz de la Huerga
           @since: 03/10/2018
           Comentarios: el programa crea un array asociativo y lo recorre.
         */
        $salario = array("Lunes" => 100,
                         "Martes" => 100,
                         "Miercoles" => 100,
                         "Jueves" => 100,
                         "Viernes" => 200,
                         "Sabado" => 200,
                         "Domingo" => 200);
        //Inicializa el array con los días de la semana de identificador y el sueldo percibido cada día.
        $salarioSemanal=0;
        foreach ($salario as $dia => $sueldo) { //Recorre el array guardando el identificador y el valor de cada campo en dos variables.
            echo "<p>El " . $dia . " cobra " . $sueldo . " euros" . "</p>"; //Imprime por pantalla el identificador y el valor de cada campo.
            $salarioSemanal+=$sueldo;
        }
        echo "El salario total de la semana es de ".$salarioSemanal." euros";
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>