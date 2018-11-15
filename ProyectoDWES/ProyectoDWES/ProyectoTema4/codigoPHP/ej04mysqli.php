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
            $baseDeDatos = new mysqli(); //Se inicia la variable como un elemento mysqli.
            $baseDeDatos->connect(IP, USUARIO, PASS, DB); //Se conecta a la base de datos pasándole la IP, usuario, contraseña y base de datos.
            if ($baseDeDatos->connect_error == null) { //Si no se produce ningún error se llevan a cabo las siguientes instrucciones.
            echo "<p>La conexión ha sido correcta</p>"; //Imprime por pantalla un mensaje.
            $consulta = $baseDeDatos->query("select * from Departamento where DescDepartamento like '%$aFormulario[descripcionDepartamento]%' or DescDepartamento like '$aFormulario[descripcionDepartamento]%' or DescDepartamento like '%$aFormulario[descripcionDepartamento]'", MYSQLI_USE_RESULT); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
            $objetoResultados = $consulta->fetch_object(); //Vuelca el resultado del query en un array.
            while($objetoResultados!=null){ //Mientras el array siga teniendo registros realiza las siguientes instrucciones.
                echo "<p>".$objetoResultados->CodDepartamento."=".$objetoResultados->DescDepartamento."</p>"; //Imprime por pantalla la clave primaria y la descripción del elemento al que apunta el puntero del array.
                $objetoResultados = $consulta->fetch_object(); //Vuelca el siguiente resultado del query en un array.
            }
            echo "<p>Número de registros: ".$consulta->num_rows."</p>"; //Imprime por pantalla el número de registros en el array.
        } else {
            echo "<p>Se ha producido el error " . $baseDeDatos->connect_error . "</p>"; //Se imprime por pantalla el mensaje de error correspondiente.
            echo "<p>Se ha producido el error con el código " . $baseDeDatos->connect_errno . "</p>"; //Se imprime por pantalla el código de error correspondiente.
        }
        $baseDeDatos->close(); //Se cierra la conexión con la base de datos.
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