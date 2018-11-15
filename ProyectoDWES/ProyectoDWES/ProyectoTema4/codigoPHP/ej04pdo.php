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
        <h1>Ejercicio 4</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 06/11/2018
          Comentarios: en este formulario se busca un código de departamento por su descripción.
         */
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        include '../config/configuracionDB.php';
        include '../config/configuracion.php';
        $entradaOK = true;
        //Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
        $aFormulario = [descripcionDepartamento => null];
        //Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
        $aErrores = [descripcionDepartamento => null];
        if (isset($_POST['Buscar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
            $aErrores[descripcionDepartamento] = validacionFormularios::comprobarAlfanumerico($_POST['descripcionDepartamento'], LONGMAXDESC, LONGMINDESC, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            foreach ($aErrores as $campo => $error) { //Recorre el array de errores en busca de algún mensaje de error.
                if ($error != null) {
                    $entradaOK = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
                    $_POST[$campo] = "";
                }
            }
        } else {
            $entradaOK = false; //Si no se ha pulsado el botón submit la variable booleana tendrá valor false, ya que los campos estarán vacíos.
        }
        if ($entradaOK) { //Si la entrada de datos es correcta se imprimen por pantalla los campos.
            //Se meten los valores de la variable $POST en un array que recoge todos los datos del formulario.
            $aFormulario[descripcionDepartamento] = $_POST['descripcionDepartamento']; //Recoge el valor del campo ya validado.
            try {
                $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO.
                $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<p>Conexión correcta</p>";
                $consulta = $baseDeDatos->query("select * from Departamento where DescDepartamento like '%$aFormulario[descripcionDepartamento]%' or DescDepartamento like '$aFormulario[descripcionDepartamento]%' or DescDepartamento like '%$aFormulario[descripcionDepartamento]'"); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
                if($consulta->rowCount()==0){ //Evalúa si se ha producido algún resultado.
                    echo "<p>No se encontraron registros</p>";
                }else{
                    echo "<p>Se encontraron ".$consulta->rowCount()." registros</p>";
                }
                while ($registro = $consulta->fetchObject()) {
                    echo "<p>" . $registro->CodDepartamento . "=" . $registro->DescDepartamento . "</p>"; //Imprime por pantalla la clave primaria y la descripción del elemento al que apunta el puntero del array.
                }
            } catch (PDOException $error) {
                echo "<p>Error " . $error->getMessage() . "</p>"; //Si se produce algún error en la conexión se muestra el mensaje de la excepción.
            } finally {
                unset($baseDeDatos); //Se cierra la conexión con la base de datos.
            }
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario que mostrará el resultado en la misma página guardando los campos que estén correctos y los errores producidos.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                    <table>
                        <caption>Búsqueda de Departamento</caption>
                        <tr>
                            <td>Descripción</td>
                            <td><textarea name="descripcionDepartamento" cols="30" rows="6"><?php echo $_POST['descripcionDepartamento']; ?></textarea>*</td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[descripcionDepartamento]</font>"; ?></td>
                        </tr>
                        <tr>
                            <td>Campo requerido *</td>
                            <td><input type="submit" name="Buscar" value="Búsqueda"></td>
                        </tr>
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