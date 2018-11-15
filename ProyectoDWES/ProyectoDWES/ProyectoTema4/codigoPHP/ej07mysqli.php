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
        <h1>Ejercicio 7</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 06/11/2018
          Comentarios: en este programa se importan departamentos a la base de datos desde un fichero xml.
         */
        include '../config/configuracionDB.php';
        $baseDeDatos = new mysqli(); //Se inicia la variable como un elemento mysqli.
        $baseDeDatos->connect(IP, USUARIO, PASS, DB); //Se conecta a la base de datos pasándole la IP, usuario, contraseña y base de datos.
        if ($baseDeDatos->connect_error == null) { //Si no se produce ningún error se llevan a cabo las siguientes instrucciones.
            echo "<p>La conexión ha sido correcta</p>"; //Imprime por pantalla un mensaje.
            $ok = true; //Se inicializa la variable booleana a true.
            $baseDeDatos->autocommit(false); //Desactiva el autocommit para llevar a cabo la transacción.
            if ($archivo = simplexml_load_file('../tmp/copiaDB.xml')) { //Carga el archivo XML desde la ruta especificada como parámetro.
                echo "<p>El archivo se ha cargado correctamente.</p>";
                $consulta = $baseDeDatos->stmt_init(); //Inicializa una sentencia.
                $consulta->prepare("insert into Departamento values (?,?)"); //Prepara la consulta con dos incógnitas.
                $consulta->bind_param('ss', $codigo, $descripcion); //Declara dos parámetros tipo string 'ss' y le pasa los dos valores.
                foreach ($archivo as $departamento) {
                    $codigo = $departamento->CodDepartamento; //Guarda el código de cada departamento.
                    $descripcion = $departamento->DescDepartamento; //Guarda la descripción de cada departamento.
                    if (!$consulta->execute()) { //Ejecuta cada consulta.
                        $ok = false; //Si no se ha producido alguna de las inserciones cambia el valor de la variable booleana a false.
                    }
                }
                if ($ok) {
                    $baseDeDatos->commit(); //Si se han insertado todos los valores se hace el commit, que confirma los cambios.
                    echo "Base de datos importada con éxito";
                } else {
                    $baseDeDatos->rollback(); //En caso de no haberse podido realizar alguna inserción se cancelan los cambios realizados.
                    echo "No pudo importarse la base de datos";
                }
            } else {
                echo "<p>No se pudo cargar el archivo.</p>";
            }
            $consulta->close(); //Cierra la consulta.
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