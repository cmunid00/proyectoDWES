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
        <h1>Ejercicio 6</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 06/11/2018
          Comentarios: en este programa se da de alta nuevos departamentos en la base de datos con una sentencia preparada.
         */
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        include '../config/configuracionDB.php';
        $entradaOK = true;
        //Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
        $num = 1;
        while ($num <= 3) { //Recorre las filas del array mientras ésta sea menor o igual a 4.
            $aErrores[$numDep]['codDepartamento'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $departamentosNuevo[$numDep]['codDepartamento'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $aErrores[$numDep]['descDepartamento'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $departamentosNuevo[$numDep]['descDepartamento'] = null; //Asigna el valor null a la posición donde apunta el puntero del array. 
            $num++; //Avanza el puntero de las filas del array en una posición.
        }
        $numero = $num;
        if (isset($_POST['Registrarse'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
            for ($numInsert = 1; $numInsert < $numero; $numInsert++) {
                $aErrores[$numInsert]['codDepartamento'] = validacionFormularios::comprobarAlfabetico($_POST['codDepartamento' . $numInsert], 3, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                $aErrores[$numInsert]['descDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_POST['descDepartamento' . $numInsert], 255, 10, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.    
            }
            foreach ($aErrores as $num => $a_Persona) {
                foreach ($a_Persona as $numDep => $nombre) {
                    if ($aErrores[$num][$numDep] != null) {
                        $entradaOK = false; //Si la posición del array es distinta de null se cambia el valor de la variable booleana a false.
                        $_POST[$numDep . $num] = ""; //Si la posición del array es distinta de null se limpia el valor de la variable $_POST correspondiente.
                    }
                }
            }
        } else {
            $entradaOK = false; //Si no se ha pulsado el botón submit la variable booleana tendrá valor false, ya que los campos estarán vacíos.
        }
        if ($entradaOK) { //Si la entrada de datos es correcta se imprimen por pantalla los campos.
            //Se meten los valores de la variable $POST en un array que recoge todos los datos del formulario.
            for ($numInsert = 1; $numInsert < $numero; $numInsert++) {
                $departamentosNuevo[$numInsert]['codDepartamento'] = strtoupper($_POST['codDepartamento' . $numInsert]); //Recoge el valor de cada campo nombre ya validado.
                $departamentosNuevo[$numInsert]['descDepartamento'] = $_POST['descDepartamento' . $numInsert]; //Recoge el valor de cada campo fecha ya validado.
            }
            try {
                $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO.
                $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<p>Conexión correcta</p>";
                $consulta=$baseDeDatos->prepare("insert into Departamento values (:codigo, :descripcion)"); //Prepara la consulta con dos incógnitas.
                for ($numInsert = 1; $numInsert < $numero; $numInsert++) { //Recorre todos los departamentos que van a insertarse.
                    $codigo = $departamentosNuevo[$numInsert]['codDepartamento']; //Guarda el valor de cada código en una variable temporal para pasarle al insert.
                    $descripcion = $departamentosNuevo[$numInsert]['descDepartamento']; //Guarda el valor de cada descripción en una variable temporal para pasarle al insert.
                    $consulta->bindParam(":codigo", $codigo); //Sustituye la primera incógnita por el código, que irá variando cada vuelta del for.
                    $consulta->bindParam(":descripcion", $descripcion); //Sustituye la primera incógnita por la descripción, que irá variando cada vuelta del for.
                    if($consulta->execute()){
                        echo "<p>Se insertó el departamento con el código " . $codigo . " </p>"; //Si se ejecuta la inserción correctamente muestra el mensaje.
                    } else {
                        echo "<p>No se pudo insertar el departamento con el código " . $codigo . " </p>"; //Si no se ha producido alguna de las inserciones muestra el mensaje de error.
                    } 
                }
            } catch (PDOException $error) {
                echo "<p>Error " . $error->getMessage() . "</p>"; //Si se produce algún error en la conexión se muestra el mensaje de la excepción.
            } finally {
                unset($baseDeDatos); //Se cierra la conexión con la base de datos.
            }
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario, que mostrará el resultado en la misma página.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="contenedor">
                    <table>
                        <tr>
                            <td>Código de departamento*</td>
                            <!--Recorre todas las personas que han contestado el formulario y recoge la información en el campo nombre con una celda por persona y guardando la información introducida anteriormente-->
                            <?php for ($numInsert = 1; $numInsert < $numero; $numInsert++) { ?>
                                <td><input type="text" name="codDepartamento<?php echo $numInsert ?>" value="<?php echo $_POST['codDepartamento' . $numInsert] ?>"></td>
                                <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numInsert]['codDepartamento'] . "</font>"; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>Descripción de departamento*</td>
                            <!--Recorre todas las personas que han contestado el formulario y recoge la información en el campo nombre con una celda por persona y guardando la información introducida anteriormente-->
                            <?php for ($numInsert = 1; $numInsert < $numero; $numInsert++) { ?>
                                <td><input type="text" name="descDepartamento<?php echo $numInsert ?>" value="<?php echo $_POST['descDepartamento' . $numInsert] ?>"></td>
                                <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numInsert]['descDepartamento'] . "</font>"; ?></td>
                            <?php } ?>
                        </tr>
                        <tr><td><input type="submit" name="Registrarse" value="Enviar los datos del formulario" class="boton"></td></tr>
                    </table>
                </div>                   
            </form>
        <?php } ?>
        <div class="atras"><a href="../indexProyectoTema4.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>