﻿<!DOCTYPE html>
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
        <h1>Ejercicio 3</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 06/11/2018
          Comentarios: en este programa se da de alta nuevos departamentos en la base de datos.
         */
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        include '../config/configuracionDB.php';
        include '../config/configuracion.php';
        $entradaOK = true;
        //Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
        $aFormulario = [codigoDepartamento => null,
            descripcionDepartamento => null];
        //Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
        $aErrores = [codigoDepartamento => null,
            descripcionDepartamento => null];
        if (isset($_POST['Alta'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
            $aErrores[codigoDepartamento] = validacionFormularios::comprobarAlfabetico($_POST['codigoDepartamento'], LONGMAX, LONGMIN, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[descripcionDepartamento] = validacionFormularios::comprobarAlfanumerico($_POST['descripcionDepartamento'], LONGMINDESC, LONGMAXDESC, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
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
            $baseDeDatos = new mysqli(); //Se inicia la variable como un elemento mysqli.
            $baseDeDatos->connect(IP, USUARIO, PASS, DB); //Se conecta a la base de datos pasándole la IP, usuario, contraseña y base de datos.
            if ($baseDeDatos->connect_error == null) { //Si no se produce ningún error se llevan a cabo las siguientes instrucciones.
                echo "<p>La conexión ha sido correcta</p>"; //Imprime por pantalla un mensaje.
                $consulta = $baseDeDatos->stmt_init();
                $consulta->prepare("insert into Departamento values (?,?)");
                $consulta->bind_param('ss', $aFormulario[codigoDepartamento], $aFormulario[descripcionDepartamento]); //Declara dos parámetros tipo string 'ss' y le pasa los dos valores.
                if($consulta->execute()){
                    echo "Se ha insertado el departamento con el código ".$aFormulario[codigoDepartamento]; //Si el registro fue correcto muestra el mensaje.
                }else{
                    echo "No se pudo insertar el Departamento"; //Muestra el mensaje si no se ha podido realizar la inserción.
                }
            } else {
                echo "<p>Se ha producido el error " . $baseDeDatos->connect_error . "</p>"; //Se imprime por pantalla el mensaje de error correspondiente.
                echo "<p>Se ha producido el error con el código " . $baseDeDatos->connect_errno . "</p>"; //Se imprime por pantalla el código de error correspondiente.
            }
            $baseDeDatos->close(); //Se cierra la conexión con la base de datos.
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario que mostrará el resultado en la misma página.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                    <table>
                        <caption>Alta de Departamento</caption>
                        <tr>
                            <td>Código</td>
                            <td><input type="text" name="codigoDepartamento" placeholder="Ej:'AAA'" value="<?php echo $_POST['codigoDepartamento']; ?>">*</td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[codigoDepartamento]</font>"; ?></td>
                        </tr>
                        <tr>
                            <td>Descripción</td>
                            <td><textarea name="descripcionDepartamento" cols="30" rows="6"><?php echo $_POST['descripcionDepartamento']; ?></textarea>*</td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[descripcionDepartamento]</font>"; ?></td>
                        </tr>
                        <tr>
                            <td>Campo requerido *</td>
                            <td><input type="submit" name="Alta" value="Dar de Alta"></td>
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