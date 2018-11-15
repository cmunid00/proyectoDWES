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
        <h1>Ejercicio 25</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 19/10/2018
          Comentarios: el programa crea una plantilla para la creación de formularios de forma rápida.
         */
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        include "../config/configuracion.php";
        $entradaOK = true;
        //Inicializa un array de valores con tantas posiciones como campos de datos tenga el formulario.
        $aFormulario = [alfabetico => null, //Almacena el valor del campo nombre cuando éste sea correcto.
            alfanumerico => null, //Almacena el valor del campo alfabético cuando éste sea correcto.
            pass => null, //Almacena el valor del campo contraseña cuando éste sea correcto.
            entero => null, //Almacena el valor del campo alfanumérico cuando éste sea correcto.
            decimal => null, //Almacena el valor del campo decimal cuando éste sea correcto.
            email => null, //Almacena el valor del campo email cuando éste sea correcto.
            url => null, //Almacena el valor del campo url cuando éste sea correcto.
            fecha => null, //Almacena el valor del campo fecha cuando éste sea correcto.
            dni => null, //Almacena el valor del campo dni cuando éste sea correcto.
            codigoPostal => null, //Almacena el valor del campo código postal cuando éste sea correcto.
            telefono => null, //Almacena el valor del teléfono cuando éste sea correcto.
            textoLibre => null, //Almacena el valor del texto libre cuando éste sea correcto.
            campoRadio => null, //Almacena el valor del campo radio cuando éste sea correcto.
            seleccionMultiple => null, //Almacena el valor del campo checkbox cuando éste sea correcto.
            elementoLista => null]; //Almacena el valor del elemento dentro de una lista cuando éste sea correcto.
        $aOpcionesLista=[elemento1, elemento2]; //Se inicializan las posibles opciones de la lista.
        //Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
        $aErrores = [alfabetico => null, //Guarda posibles errores en el campo alfabético.
            alfanumerico => null, //Guarda posibles errores en el campo alfanumérico.
            pass => null, //Guarda posibles errores en el campo pass.
            entero => null, //Guarda posibles errores en el campo entero.
            decimal => null, //Guarda posibles errores en el campo decimal.
            email => null, //Guarda posibles errores en el campo email.
            url => null, //Guarda posibles errores en el campo url.
            fecha => null, //Guarda posibles errores en el campo fecha.
            dni => null, //Guarda posibles errores en el campo dni.
            codigoPostal => null, //Guarda posibles errores en el campo código postal.
            telefono => null, //Guarda posibles errores en el campo teléfono.
            textoLibre => null, //Guarda posibles errores en el campo texto libre.
            campoRadio => null, //Guarda posibles errores en el campo radio.
            elementoLista => null]; //Guarda posibles errores en el campo que puede tener ciertos valores.
        if (isset($_POST['Registrarse'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
            $aErrores[alfabetico] = validacionFormularios::comprobarAlfabetico($_POST['alfabetico'], LONGMAXALFABETICO, LONGMINALFABETICO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[alfanumerico] = validacionFormularios::comprobarAlfanumerico($_POST['alfanumerico'], LONGMAXALFANUMERICO, LONGMINALFANUMERICO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[pass] = validacionFormularios::comprobarAlfanumerico($_POST['pass'], LONGMAXPASS, LONGMINPASS, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[entero] = validacionFormularios::comprobarEntero($_POST['entero'], MAXIMONUMERO, MINIMONUMERO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[decimal] = validacionFormularios::comprobarFloat($_POST['decimal'], MAXIMONUMERO, MINIMONUMERO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[email] = validacionFormularios::validarEmail($_POST['email'], LONGMAXEMAIL, LONGMINEMAIL, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[url] = validacionFormularios::validarUrl($_POST['url'], OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[fecha] = validacionFormularios::validarFecha($_POST['fecha'], OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[dni] = validacionFormularios::validarDni($_POST['dni'], OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[codigoPostal] = validacionFormularios::validarCp($_POST['codigoPostal'], OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[telefono] = validacionFormularios::validaTelefono($_POST['telefono'], OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[textoLibre] = validacionFormularios::comprobarAlfanumerico($_POST['textoLibre'], LONGMAXTEXTOLIBRE, LONGMINTEXTOLIBRE, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[campoRadio] = validacionFormularios::validarElementoEnLista($_POST['campoRadio'], $aOpcionesLista, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[elementoLista] = validacionFormularios::validarElementoEnLista($_POST['elementoLista'], $aOpcionesLista, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
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
            $aFormulario[alfabetico]=$_POST['alfabetico']; //Recoge el valor del campo ya validado.
            $aFormulario[alfanumerico]=$_POST['alfanumerico']; //Recoge el valor del campo ya validado.
            $aFormulario[pass] = $_POST['pass']; //Recoge el valor del campo ya validado.
            $aFormulario[entero] = $_POST['entero']; //Recoge el valor del campo ya validado.
            $aFormulario[decimal] = $_POST['decimal']; //Recoge el valor del campo ya validado.
            $aFormulario[email] = $_POST['email']; //Recoge el valor del campo ya validado.
            $aFormulario[url] = $_POST['url']; //Recoge el valor del campo ya validado.
            $aFormulario[fecha] = $_POST['fecha']; //Recoge el valor del campo ya validado.
            $aFormulario[dni] = $_POST['dni']; //Recoge el valor del campo ya validado.
            $aFormulario[codigoPostal] = $_POST['codigoPostal']; //Recoge el valor del campo ya validado.
            $aFormulario[telefono] = $_POST['telefono']; //Recoge el valor del campo ya validado.
            $aFormulario[textoLibre] =  $_POST['textoLibre']; //Recoge el valor del campo ya validado.
            $aFormulario[campoRadio] =  $_POST['campoRadio']; //Recoge el valor del campo ya validado.
            $aFormulario[seleccionMultiple] =  $_POST['seleccionMultiple1']." ".$_POST['seleccionMultiple2']; //Recoge el valor del campo ya validado.
            $aFormulario[elementoLista] = $_POST['elementoLista']; //Recoge el valor del campo ya validado.
            echo "<h2>Resultado</h2>";
            echo "<p>Alfabético: " . $aFormulario[alfabetico] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Alfanumérico: " . $aFormulario[alfanumerico] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Contraseña: " . $aFormulario[pass] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Entero: " . $aFormulario[entero] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Decimal: " . $aFormulario[decimal] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Email: " . $aFormulario[email] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Url: " . $aFormulario[url] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Fecha: " . $aFormulario[fecha] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>DNI: " . $aFormulario[dni] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Código Postal: " . $aFormulario[codigoPostal] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Teléfono: " . $aFormulario[telefono] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Texto Libre: " . $aFormulario[textoLibre] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>Radio Button: " . $aFormulario[campoRadio] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>CheckBox: " . $aFormulario[seleccionMultiple] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.          
            echo "<p>Elemento en lista: " . $aFormulario[elementoLista] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario que mostrará el resultado en la misma página.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                    <table>
                        <caption>Datos</caption>
                        <tr>
                            <td>Alfabético</td>
                            <!--Se guardará el valor de los campos cuando éstos se hayan introducido de manera correcta.-->
                            <td><input type="text" name="alfabetico" value="<?php echo $_POST['alfabetico'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[alfabetico]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Alfanumérico</td>
                            <td><input type="text" name="alfanumerico" value="<?php echo $_POST['alfanumerico'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[alfanumerico]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
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
                            <td>Entero</td>
                            <td><input type="text" name="entero" placeholder="Introduce un entero" value="<?php echo $_POST['entero'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[entero]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Decimal</td>
                            <td><input type="text" name="decimal" placeholder="Introduce un decimal" value="<?php echo $_POST['decimal'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[decimal]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" placeholder="Ej: nombre@gmail.com" value="<?php echo $_POST['email'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[email]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Url</td>
                            <td><input type="text" name="url" placeholder="Ej: http://www.google.es" value="<?php echo $_POST['url'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[url]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td><input type="text" name="fecha" placeholder="yyyy-mm-dd" value="<?php echo $_POST['fecha'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[fecha]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>DNI</td>
                            <td><input type="text" name="dni" placeholder="8-9 dígitos y una letra" value="<?php echo $_POST['dni'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[dni]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Código postal</td>
                            <td><input type="text" name="codigoPostal" placeholder="5 dígitos" value="<?php echo $_POST['codigoPostal'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[codigoPostal]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td><input type="text" name="telefono" placeholder="9 dígitos" value="<?php echo $_POST['telefono'];?>">*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[telefono]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto Libre</td>
                            <td><textarea name="textoLibre" cols="30" rows="6"><?php echo $_POST['textoLibre'];?></textarea>*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[textoLibre]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Selección radio button</td>
                            <td><input type="radio" name="campoRadio" <?php if($_POST['campoRadio']=="elemento1"){echo "checked";}?> value="elemento1">elemento1
                                <input type="radio" name="campoRadio" <?php if($_POST['campoRadio']=="elemento2"){echo "checked";}?> value="elemento2">elemento2*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[campoRadio]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Selección checkbox</td>
                            <td><input type="checkbox" name="seleccionMultiple1" <?php if($_POST['seleccionMultiple1']=="elemento1"){echo "checked";}?> value="elemento1">elemento1
                                <input type="checkbox" name="seleccionMultiple2" <?php if($_POST['seleccionMultiple2']=="elemento2"){echo "checked";}?> value="elemento2">elemento2
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[seleccionMultiple]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Elemento en Lista</td>
                            <td><select name="elementoLista">
                                    <option value="elemento1" <?php if($_POST['elementoLista']==elemento1){echo "selected";}?>>elemento1</option>
                                    <option value="elemento2" <?php if($_POST['elementoLista']==elemento2){echo "selected";}?>>elemento2</option>
                                </select>*
                                <?php
                                echo "<font color='#FF0000' size='1px'>$aErrores[elementoLista]</font>"; //Mostrará el mensaje de la variable en caso de que éste exista.
                                ?>
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