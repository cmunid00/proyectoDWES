<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
    </head>
    <body>
        <h1>Añadir Departamento</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 12/11/2018
          Comentarios: permite añadir departamentos.
         */
        include '../../../config/configuracionDB.php';
        include '../../../config/configuracion.php';
        require "../../../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        $entradaOK = true;
        $aFormulario = [codigoDepartamento => null, //Almacena el valor del campo codigo cuando éste sea correcto.
            descripcionDepartamento => null]; //Almacena el valor del campo descripcion cuando éste sea correcto.
        $aErrores = [codigoDepartamento => null, //Guarda posibles errores en el campo codigo.
            descripcionDepartamento => null]; //Guarda posibles errores en el campo descripcion.
        try {
            $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO.
            $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (isset($_POST['Aceptar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
                $aErrores[codigoDepartamento] = validacionFormularios::comprobarAlfabetico($_POST['codigoDepartamento'], LONGMAX, LONGMIN, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                $aErrores[descripcionDepartamento] = validacionFormularios::comprobarAlfanumerico($_POST['descripcionDepartamento'], LONGMINDESC, LONGMAXDESC, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                $codigoBusqueda = $_POST['codigoDepartamento'];
                $consulta = $baseDeDatos->query("select * from Departamento where CodDepartamento='$codigoBusqueda'");
                if ($consulta->rowCount() != 0) {
                    $aErrores[codigoDepartamento] = "Código de departamento ya existente";
                }
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
                $aFormulario[codigoDepartamento] = strtoupper($_POST['codigoDepartamento']); //Recoge el valor del campo ya validado.
                $aFormulario[descripcionDepartamento] = $_POST['descripcionDepartamento']; //Recoge el valor del campo ya validado.
                $consulta = $baseDeDatos->prepare("insert into Departamento (CodDepartamento, DescDepartamento) values (:codigo, :descripcion)"); //Prepara la consulta con dos incógnitas.
                $consulta->bindParam(":codigo", $aFormulario[codigoDepartamento]); //Sustituye la primera incógnita por el código, que irá variando cada vuelta del for.
                $consulta->bindParam(":descripcion", $aFormulario[descripcionDepartamento]); //Sustituye la primera incógnita por la descripción, que irá variando cada vuelta del for.
                $consulta->execute();
                Header("Location: ../index.php");
            } else {
                //Si la entrada de datos no es correcta se muestra el formulario que mostrará el resultado en la misma página guardando los campos que estén correctos y los errores producidos.
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div>
                        <table>
                            <tr>
                                <td>Código</td>
                                <td><input type="text" name="codigoDepartamento" placeholder="Ej:'AAA'" value="<?php echo $_POST['codigoDepartamento']; ?>">*</td>
                                <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[codigoDepartamento]</font>"; ?></td>
                            </tr>
                            <tr>
                                <td>Descripción</td>
                                <td><input type="text" name="descripcionDepartamento" value="<?php echo $_POST['descripcionDepartamento']; ?>">*</td>
                                <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[descripcionDepartamento]</font>"; ?></td>
                            </tr>
                            <tr>
                                <td><input type="button" value="Cancelar" onclick="location = '../index.php'"></td>
                                <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            </tr>
                        </table>
                    </div>
                </form>
                <?php
            }
        } catch (PDOException $error) {
            echo "<p>Error " . $error->getMessage() . "</p>"; //Si se produce algún error en la conexión se muestra el mensaje de la excepción.
        } finally {
            unset($baseDeDatos); //Se cierra la conexión con la base de datos.
        }
        ?>
        <div class="atras"></div>
        <footer>
            <p><a href="../../../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>