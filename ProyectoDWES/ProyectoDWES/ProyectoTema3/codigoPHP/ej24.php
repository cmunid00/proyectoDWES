<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos.css"/>
        <style>
            h1{
                font: normal 3.4em "fb", "Trebuchet MS", Helvetica, Arial;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 24</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 10/10/2018
          Comentarios: el programa crea un formulario y muestra los datos introducidos en la misma página verificando las entradas de datos.
         */
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        $entradaOK = true;
        //Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
        $aErrores = [nombre => null, //Guarda posibles errores en el campo del nombre, qué será alfabético.
                    sexo => null, //Guarda posibles errores en el campo del nombre, qué será validado.
                    apellidos => null, //Guarda posibles errores en el campo de los apellidos, qué será alfabético.
                    correo => null, //Guarda posibles errores en el campo del correo, qué será tipo Email.
                    pass => null]; //Guarda posibles errores en el campo de la contraseña, qué será alfanumérico.
        //La fecha no será necesario validarla ya que se introduce mediante un campo select que evita el poder introducir datos erróneos.
        //Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
        $aFormulario = [nombre => null, //Almacena el valor del campo nombre cuando éste sea correcto.
                       sexo => null,  //Almacena el valor del campo sexo cuando éste sea correcto.
                       apellidos => null, //Almacena el valor del campo apellidos cuando éstos sean correcto.
                       correo => null, //Almacena el valor del campo correo cuando éste sea correcto.
                       pass => null, //Almacena el valor de la contraseña nombre cuando ésta sea correcto.
                       fecha => null]; //Almacena el valor del campo fecha cuando ésta sea correcto.
        if (isset($_POST['Registrarse'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
            $aErrores[nombre] = validacionFormularios::comprobarAlfabetico($_POST['nombre'], 20, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[sexo] = validacionFormularios::validarElementoEnLista($_POST['sexo'], ["HombrE","MujeR"], 0); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[apellidos] = validacionFormularios::comprobarAlfabetico($_POST['apellidos'], 30, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[correo] = validacionFormularios::validarEmail($_POST['correo'], 30, 3, 0); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[pass] = validacionFormularios::comprobarAlfanumerico($_POST['pass'], 20, 5, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            foreach ($aErrores as $campo=>$error) { //Recorre el array de errores en busca de algún mensaje de error.
                if ($error != null) {
                    $entradaOK = false; //Si encuentra algún mensaje de error cambia el valor de la variable $entradaOK a false.
                    $_POST[$campo]="";
                }
            }
        } else {
            $entradaOK = false; //Si no se ha pulsado el botón submit la variable booleana tendrá valor false, ya que los campos estarán vacíos.
        }
        if ($entradaOK) { //Si la entrada de datos es correcta se imprimen por pantalla los campos.
            //Se meten los valores de la variable $POST en un array que recoge todos los datos del formulario.
            $aFormulario = [nombre => $_POST['nombre'], //Recoge el valor del campo nombre ya validado.
                           sexo => $_POST['sexo'], //Recoge el valor del campo sexo ya validado.
                           apellidos => $_POST['apellidos'], //Recoge el valor del campo apellidos ya validado.
                           correo => $_POST['correo'], //Recoge el valor del campo correo ya validado.
                           pass => $_POST['pass'], //Recoge el valor del campo contraseña ya validado.
                           fecha => $_POST['dia'] . "/" . $_POST['mes'] . "/" . $_POST['anyo']]; //Recoge el valor de los campos dia, mes y anyo separados por /.
            echo "<h2>Datos personales</h2>";
            echo "<p>El nombre introducido es: " . $aFormulario[nombre] . "</p>"; //Imprime por pantalla el valor del campo nombre dentro del array.
            echo "<p>El sexo es: " . $aFormulario[sexo] . "</p>"; //Imprime por pantalla el valor del campo sexo dentro del array.
            echo "<p>Los apellidos son: " . $aFormulario[apellidos] . "</p>"; //Imprime por pantalla el valor del campo apellidos dentro del array.
            echo "<p>El correo electrónico es: " . $aFormulario[correo] . "</p>"; //Imprime por pantalla el valor del campo correo dentro del array.
            echo "<p>La contraseña elegida es: " . $aFormulario[pass] . "</p>"; //Imprime por pantalla el valor del campo contraseña dentro del array.
            echo "<p>La fecha de nacimiento es: " . $aFormulario[fecha] . "</p>"; //Imprime por pantalla el valor del campo fecha dentro del array.
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario que mostrará el resultado en la misma página.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                    <table>
                        <caption>Datos personales</caption>
                        <tr>
                            <td>Nombre</td>
                            <!--Se guardará el valor de los campos cuando éstos se hayan introducido de manera correcta.-->
                            <td><input type="text" name="nombre" value="<?php echo $_POST['nombre'];?>">* 
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[nombre]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td><input type="text" name="sexo" placeholder="Hombre o Mujer" value="<?php echo $_POST['sexo'];?>"> 
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[sexo]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td><input type="text" name="apellidos" value="<?php echo $_POST['apellidos'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[apellidos]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Correo electrónico</td>
                            <td><input type="text" name="correo" placeholder="atencionalcliente@impri.eu" value="<?php echo $_POST['correo'];?>">
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[correo]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td><input type="password" name="pass" placeholder="(5 caracteres min.)" value="<?php echo $_POST['pass'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[pass]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Cumpleaños</td>
                            <td>
                                <select name="dia">
                                    <option value="1">1</option>
                                    <option value="2" <?php if($_POST['dia']==2){echo selected;}?>>2</option>
                                </select>
                                <select name="mes">
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                                <select name="anyo">
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Campo requerido *</td>
                            <td><input type="submit" name="Registrarse"></td>
                        </tr>
                    </table>
                </div>
            </form>
        <?php } ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>