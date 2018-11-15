<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="webroot/css/estilos2.css"/>
    </head>
    <body>
        <h1>MtoDepartamentosTema4</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 12/11/2018
          Comentarios: aplicación completa para la gestión de departamentos.
         */
        include '../../config/configuracionDB.php';
        try {
            $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO y se establece la conexión.
            $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $clave = $_POST['nombre'];
            if ($_POST['altaBaja'] == "Todos") {
                $query = "select * from Departamento where DescDepartamento like '%$clave%' or DescDepartamento like '$clave%' or DescDepartamento like '%$clave'";
            } else {
                if ($_POST['altaBaja'] == "Baja") {
                    $query = "select * from Departamento where bajaLogica and (DescDepartamento like '%$clave%' or DescDepartamento like '$clave%' or DescDepartamento like '%$clave')";
                } else {
                    $query = "select * from Departamento where bajaLogica is null and (DescDepartamento like '%$clave%' or DescDepartamento like '$clave%' or DescDepartamento like '%$clave')";
                }
            }
            $consulta = $baseDeDatos->query($query); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table>
                    <tr>
                        <td><input type="submit" name="importar" value="Importar"></td>
                        <td><input type="submit" name="exportar" value="Exportar"></td>
                        <td><input type="button" value="Añadir" onclick="location = 'codigoPHP/añadirDepartamento.php'"></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="altaBaja" value="Alta"  <?php echo "checked"; ?>>Alta</td>
                        <td><input type="radio" name="altaBaja" value="Baja" <?php
                            if ($_POST['altaBaja'] == "Baja") {
                                echo "checked";
                            }
                            ?>>Baja</td>
                        <td><input type="radio" name="altaBaja" value="Todos" <?php
                            if ($_POST['altaBaja'] == "Todos") {
                                echo "checked";
                            }
                            ?>>Todos</td>
                    </tr>
                    <tr>
                        <td>Descripción Departamento</td>
                        <td><input type="text" name="nombre"></td>
                        <td><input type="submit" name="buscar" value="Buscar"></td>
                    </tr>
                    <tr>
                        <td>Código</td>
                        <td>Descripción</td>
                        <td>Opciones</td>
                    </tr>
                    <?php
                    while ($registro = $consulta->fetchObject()) {
                        if ($registro->bajaLogica != null) {
                            ?>
                            <tr class="rojo">
                                <td><?php echo $registro->CodDepartamento ?></td>
                                <td><?php echo $registro->DescDepartamento ?></td>
                                <td>
                                    <input type="button" class="modificar" name="modificar" onclick="location = 'codigoPHP/modificarDepartamento.php?CodDepartamento=<?php echo $registro->CodDepartamento ?>'">
                                    <input type="button" class="eliminar" name="eliminar" onclick="location = 'codigoPHP/eliminarDepartamento.php?CodDepartamento=<?php echo $registro->CodDepartamento ?>'">
                                    <input type="button" class="alta" name="alta" onclick="location = 'codigoPHP/altaLogica.php?CodDepartamento=<?php echo $registro->CodDepartamento ?>'">
                                </td>
                            </tr>
                            <?php
                        } else {
                            ?>
                            <tr class="verde">
                                <td><?php echo $registro->CodDepartamento ?></td>
                                <td><?php echo $registro->DescDepartamento ?></td>
                                <td>
                                    <input type="button" class="modificar" name="modificar" onclick="location = 'codigoPHP/modificarDepartamento.php?CodDepartamento=<?php echo $registro->CodDepartamento ?>'">
                                    <input type="button" class="eliminar" name="eliminar" onclick="location = 'codigoPHP/eliminarDepartamento.php?CodDepartamento=<?php echo $registro->CodDepartamento ?>'">
                                    <input type="button" class="baja" name="baja" onclick="location = 'codigoPHP/bajaLogica.php?CodDepartamento=<?php echo $registro->CodDepartamento ?>'">
                                </td>
                            </tr>
                        <?php  }
                    } ?>   
                        <tr><td><input type="button" value="Salir" onclick="location='../../indexProyectoTema4.php'"></td></tr>
                    </table>
                </form>
                <?php
                if (isset($_POST['exportar'])) {
                    $archivo = new DOMDocument(); //Crea un nuevo objeto DOM.
                    $archivo->formatOutput = true; //Da formato al XML.
                    $departamentos = $archivo->createElement('departamentos'); //Crea el elemento raiz departamentos.
                    $departamentos = $archivo->appendChild($departamentos); //Añade el elemento departamentos como hijo del objeto DOM, elemento raiz.
                    $consulta = $baseDeDatos->query('select * from Departamento'); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
                    while ($registro = $consulta->fetchObject()) { //Por cada registro da una vuelta al bucle ejecutando las instrucciones siguientes.
                        $departamento = $archivo->createElement('departamento'); //Crea un elemento departamento por cada registro.
                        $departamento = $departamentos->appendChild($departamento); //Añade el elemento departamento como hijo del elemento raiz.
                        $CodDepartamento = $archivo->createElement('CodDepartamento', $registro->CodDepartamento); //Crea un elemento código por cada registro.
                        $CodDepartamento = $departamento->appendChild($CodDepartamento); //Añade el elemento código como hijo del elemento departamento creado anteriormente.
                        $DescDepartamento = $archivo->createElement('DescDepartamento', $registro->DescDepartamento); //Crea un elemento descripción por cada registro.
                        $DescDepartamento = $departamento->appendChild($DescDepartamento); //Añade el elemento descripción como hijo del elemento departamento creado anteriormente.
                        $bajaLogica = $archivo->createElement('bajaLogica', $registro->bajaLogica); //Crea un elemento baja lógica por cada registro.
                        $bajaLogica = $departamento->appendChild($bajaLogica); //Añade el elemento baja lógica como hijo del elemento departamento creado anteriormente.
                    }
                    $archivo->saveXML(); //Guarda el objeto DOM como elemento XML.
                    if ($archivo->save('tmp/copiaDB.xml') != false) { //Guarda el elemento XML anterior en la ruta especificada.
                        echo "<p>Se han guardado " . $consulta->rowCount() . " registros</p>";
                    } else {
                        echo "<p>No pudo guardarse la base de datos</p>";
                    }
                }
                if (isset($_POST['importar'])) {
                    $ok = true; //Se inicializa la variable booleana a true.
                    $baseDeDatos->beginTransaction(); //Desactiva el autocommit para llevar a cabo la transacción.
                    if ($archivo = simplexml_load_file('tmp/copiaDB.xml')) { //Carga el archivo XML desde la ruta especificada como parámetro. 
                        $consulta = $baseDeDatos->prepare("insert into Departamento (CodDepartamento, DescDepartamento) values (:codigo, :descripcion)"); //Prepara la consulta con dos incógnitas.
                        $consulta->bindParam(":codigo", $codigo); //Sustituye la primera incógnita por el código, que irá variando cada vuelta del for.
                        $consulta->bindParam(":descripcion", $descripcion); //Sustituye la segunda incógnita por la descripción, que irá variando cada vuelta del for.
                        foreach ($archivo as $departamento) {
                            $codigo = $departamento->CodDepartamento; //Guarda el código de cada departamento.
                            $descripcion = $departamento->DescDepartamento; //Guarda la descripción de cada departamento.
                            if (!$consulta->execute()) { //Ejecuta cada consulta.
                                $ok = false; //Si no se ha producido alguna de las inserciones cambia el valor de la variable booleana a false.
                            }
                        }
                        if ($ok) {
                            $baseDeDatos->commit(); //Si se han insertado todos los valores se hace el commit, que confirma los cambios.
                            echo "<p>Base de datos importada con éxito</p>";
                        } else {
                            $baseDeDatos->rollBack(); //En caso de no haberse podido realizar alguna inserción se cancelan los cambios realizados.
                            echo "<p>No pudo importarse la base de datos</p>";
                        }
                    } else {
                        echo "<p>No se pudo cargar el archivo.</p>";
                    }
                }
            } catch (PDOException $error) {
            echo "<p>Error " . $error->getMessage() . "</p>"; //Si se produce algún error en la conexión se muestra el mensaje de la excepción.
        } finally {
            unset($baseDeDatos); //Se cierra la conexión con la base de datos.
        }
        ?>
        <div class="atras"></div>
        <footer>
            <p><a href="../../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>