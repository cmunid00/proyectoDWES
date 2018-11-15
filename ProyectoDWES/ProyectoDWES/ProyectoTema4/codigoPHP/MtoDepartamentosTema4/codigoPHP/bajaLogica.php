<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
    </head>
    <body>
        <h1>Dar de Baja un Departamento</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 12/11/2018
          Comentarios: permite dar de baja departamentos.
         */
        include '../../../config/configuracionDB.php';
        include '../../../config/configuracion.php';
        $codigo = $_GET['CodDepartamento'];
        $entradaOK = true;
        require "../../../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        $aFormulario = [bajaLogica => null]; //Almacena el valor del campo baja cuando éste sea correcto.
        $aErrores = [bajaLogica => null]; //Guarda posibles errores en el campo baja.
        try {
            $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO.
            $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $baseDeDatos->query("select * from Departamento where CodDepartamento='$codigo'"); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
            $registro = $consulta->fetchObject();
            $descripcion = $registro->DescDepartamento;
            setlocale(LC_TIME, 'es_ES.UTF-8');
            date_default_timezone_set('Europe/Madrid');
            $fecha=date('Y-m-d');
            if (isset($_POST['Aceptar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
                $fecha=$_POST['bajaLogica'];
                $aErrores[bajaLogica] = validacionFormularios::validarFecha($_POST['bajaLogica'], OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                foreach ($aErrores as $campo => $error) { //Recorre el array de errores en busca de algún mensaje de error.
                    if ($error != null) {
                        $entradaOK = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
                        $_POST[$campo] = "";
                    }
                }
            } else {
                $entradaOK = false; //Si no se ha pulsado el botón submit la variable booleana tendrá valor false, ya que los campos estarán vacíos.
            }
            if ($entradaOK) {
                $aFormulario[bajaLogica] = $_POST['bajaLogica'];
                $consulta = $baseDeDatos->prepare("update Departamento set bajaLogica=:bajaLogica where CodDepartamento=:codigo"); //Prepara la consulta con dos incógnitas.
                $consulta->bindParam(':bajaLogica', $aFormulario[bajaLogica]); //Sustituye la primera incógnita por el código, que irá variando cada vuelta del for.
                $consulta->bindParam(':codigo', $codigo); //Sustituye la primera incógnita por el código, que irá variando cada vuelta del for.
                $consulta->execute();
                Header("Location: ../index.php");
            } else {
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?CodDepartamento=' . $_GET['CodDepartamento']; ?>" method="post">
                    <div>
                        <table>
                            <tr>
                                <td>Código</td>
                                <td><input type="text" name="codigoDepartamento" value="<?php echo $codigo; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Descripción</td>
                                <td><input type="text" name="codigoDepartamento" value="<?php echo $descripcion; ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Fecha de Baja</td>
                                <td><input type="text" name="bajaLogica" placeholder="yyyy-mm-dd" value="<?php echo $fecha; ?>">*</td>
                                <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[bajaLogica]</font>"; ?></td>
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