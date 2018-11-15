<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
    </head>
    <body>
        <h1>Eliminar Departamento</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 12/11/2018
          Comentarios: permite eliminar departamentos.
         */
        include '../../../config/configuracionDB.php';
        $codigo = $_GET['CodDepartamento'];
        try {
            $baseDeDatos = new PDO(IPDB, USUARIO, PASS); //Se inicia la variable como un elemento PDO.
            $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $baseDeDatos->query("select * from Departamento where CodDepartamento='$codigo'"); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
            $registro = $consulta->fetchObject();
            $descripcion = $registro->DescDepartamento;
            if (isset($_POST['Aceptar'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
                $consulta = $baseDeDatos->prepare("delete from Departamento where CodDepartamento = :codigo"); //Prepara la consulta con dos incógnitas.
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