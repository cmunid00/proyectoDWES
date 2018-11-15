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
        try {
            $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO y se establece la conexión.
            $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p>Conexión correcta</p>"; //Si la conexión fue correcta muestra el mensaje.
            $ok=true; //Se inicializa la variable booleana a true.
            $baseDeDatos->beginTransaction(); //Desactiva el autocommit para llevar a cabo la transacción.
            if ($archivo = simplexml_load_file('../tmp/copiaDB.xml')) { //Carga el archivo XML desde la ruta especificada como parámetro.
                echo "<p>El archivo se ha cargado correctamente.</p>";
                $consulta=$baseDeDatos->prepare("insert into Departamento values (:codigo, :descripcion)"); //Prepara la consulta con dos incógnitas.
                $consulta->bindParam(":codigo", $codigo); //Sustituye la primera incógnita por el código, que irá variando cada vuelta del for.
                $consulta->bindParam(":descripcion", $descripcion); //Sustituye la primera incógnita por la descripción, que irá variando cada vuelta del for.
                foreach ($archivo as $departamento) {
                    $codigo=$departamento->CodDepartamento; //Guarda el código de cada departamento.
                    $descripcion=$departamento->DescDepartamento; //Guarda la descripción de cada departamento.
                    if(!$consulta->execute()){ //Ejecuta cada consulta.
                        $ok=false; //Si no se ha producido alguna de las inserciones cambia el valor de la variable booleana a false.
                    }
                }
                if($ok){
                    $baseDeDatos->commit(); //Si se han insertado todos los valores se hace el commit, que confirma los cambios.
                    echo "Base de datos importada con éxito";
                }else{
                    $baseDeDatos->rollBack(); //En caso de no haberse podido realizar alguna inserción se cancelan los cambios realizados.
                    echo "No pudo importarse la base de datos";
                }
            } else {
                echo "<p>No se pudo cargar el archivo.</p>";
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