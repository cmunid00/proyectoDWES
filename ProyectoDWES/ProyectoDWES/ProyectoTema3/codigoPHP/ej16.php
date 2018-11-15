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
        <h1>Ejercicio 16</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 03/10/2018
          Comentarios: el programa crea un array asociativo y lo recorre con funciones.
         */
        $salario = array("Lunes" => 100,
            "Martes" => 100,
            "Miercoles" => 100,
            "Jueves" => 100,
            "Viernes" => 200,
            "Sabado" => 200,
            "Domingo" => 200);
        //Inicializa el array con los días de la semana de identificador y el sueldo percibido cada día.
        $salarioSemanal = 0;
        echo "<h2>Salario semanal con each</h2>";
        while ($salarioDiario = each($salario)) { //Recorre el array guardando el identificador y el valor de cada campo en dos variables ($dia[0] y $dia[1]).
            echo "<p>El " . $salarioDiario[0] . " cobra " . $salarioDiario[1] . " euros" . "</p>"; //Imprime por pantalla el identificador y el valor de cada campo.
            $salarioSemanal += $salarioDiario[1]; //Le sumamos al acumulador el salario de cada uno de los días.
        }
        echo "<h3>El salario total de la semana es de " . $salarioSemanal . " euros</h3>"; //Imprimimos por pantalla el salario semanal.
        $salarioSemanal = 0;
        reset($salario);
        echo "<h2>Salario semanal con reset, current, next y key</h2>";
        while (!is_null(key($salario))) { //Se sigue en el bucle mientras la clave de la posición del array no sea igual a null.
            echo "<p>El " . key($salario) . " cobra " . current($salario) . " euros" . "</p>"; //Imprime por pantalla el identificador y el valor del campo sobre el que se encuentra el puntero del array..
            $salarioSemanal += current($salario); //Le sumamos al acumulador el salario de la posición en la que se encuentra el puntero del array.
            next($salario); //Avanzamos una posición el puntero.
        }
        echo "<h3>El salario total de la semana es de " . $salarioSemanal . " euros</h3>"; //Imprimimos por pantalla el salario semanal.
        echo "<h2>Array Values</h2>";
        print_r(array_values($salario));
        echo "<h2>Count de un array</h2>";
        echo "<p>El número de registros del array salario es ".count($salario)."</p>";
        echo "<h2>Array Key Exists</h2>";
        if(array_key_exists("Lunes", $salario)){
            echo "<p>Existe la key introducida</p>";
        }else{
            echo "<p>No existe la key introducida</p>";
        }
        echo "<h2>Array Search</h2>";
        if((array_search(100, $salario))!=FALSE){
            echo "<p>Existe el valor introducido</p>";
        }else{
            echo "<p>No existe el valor introducido</p>";
        }
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>