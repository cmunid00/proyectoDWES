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
        <h1>Ejercicio 8</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 06/11/2018
          Comentarios: en este programa se exportan departamentos a un fichero xml desde la base de datos.
         */
        include '../config/configuracionDB.php';
        try {
            $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO y se establece la conexión.
            $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p>Conexión correcta</p>"; //Si la conexión fue correcta muestra el mensaje.
            $archivo = new DOMDocument(); //Crea un nuevo objeto DOM.
            $archivo->formatOutput = true; //Da formato al XML.
            $departamentos = $archivo->createElement('departamentos'); //Crea el elemento raiz departamentos.
            $departamentos = $archivo->appendChild($departamentos); //Añade el elemento departamentos como hijo del objeto DOM, elemento raiz.
            $consulta = $baseDeDatos->query('select * from Departamento'); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
            echo "<p>Se encontraron " . $consulta->rowCount() . " registros</p>"; //Muestra el número de registros encontrados.
            while ($registro = $consulta->fetchObject()) { //Por cada registro da una vuelta al bucle ejecutando las instrucciones siguientes.
                $departamento = $archivo->createElement('departamento'); //Crea un elemento departamento por cada registro.
                $departamento = $departamentos->appendChild($departamento); //Añade el elemento departamento como hijo del elemento raiz.
                $CodDepartamento = $archivo->createElement('CodDepartamento', $registro->CodDepartamento); //Crea un elemento código por cada registro.
                $CodDepartamento = $departamento->appendChild($CodDepartamento); //Añade el elemento código como hijo del elemento departamento creado anteriormente.
                $DescDepartamento = $archivo->createElement('DescDepartamento', $registro->DescDepartamento); //Crea un elemento descripción por cada registro.
                $DescDepartamento = $departamento->appendChild($DescDepartamento); //Añade el elemento descripción como hijo del elemento departamento creado anteriormente.
            }
            $archivo->saveXML(); //Guarda el objeto DOM como elemento XML.
            if($archivo->save('../tmp/copiaDB.xml')!=false){ //Guarda el elemento XML anterior en la ruta especificada.
                echo "<p>La base de datos se ha guardado correctamente</p>";
            }else{
                echo "<p>No pudo guardarse la base de datos</p>";
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