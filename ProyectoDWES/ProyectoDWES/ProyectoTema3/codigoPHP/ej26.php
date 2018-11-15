<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/estilos2.css"/>
        <style>
            h1{
                font: normal 3.4em "fb", "Trebuchet MS", Helvetica, Arial;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 26</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 25/10/2018
          Comentarios: el programa crea una encuesta para varias personas.
         */
        require "../core/181025validacionFormularios.php"; //Incluye la librería de validación.
        $entradaOK = true;
        $aHermanos=[];
        $aAltura=[];
        //Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
        $numPersona = 1;
        while ($numPersona <= 4) { //Recorre las filas del array mientras ésta sea menor o igual a 4.
            $aErrores[$numPregunta]['nombre'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $aFormulario[$numPregunta]['nombre'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $aErrores[$numPregunta]['fecha'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $aFormulario[$numPregunta]['fecha'] = null; //Asigna el valor null a la posición donde apunta el puntero del array. 
            $aErrores[$numPregunta]['email'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $aFormulario[$numPregunta]['email'] = null; //Asigna el valor null a la posición donde apunta el puntero del array. 
            $aErrores[$numPregunta]['numero'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $aFormulario[$numPregunta]['numero'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $aErrores[$numPregunta]['medir'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $aFormulario[$numPregunta]['medir'] = null; //Asigna el valor null a la posición donde apunta el puntero del array.
            $numPersona++; //Avanza el puntero de las filas del array en una posición.
        }
        $numero=$numPersona;
        if (isset($_POST['Registrarse'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
            for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){
                $aErrores[$numeroPersona]['nombre'] = validacionFormularios::comprobarAlfabetico($_POST['nombre'.$numeroPersona], 20, 3, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                $aErrores[$numeroPersona]['fecha'] = validacionFormularios::validarFecha($_POST['fecha'.$numeroPersona], 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.    
                $aErrores[$numeroPersona]['email'] = validacionFormularios::validarEmail($_POST['email'.$numeroPersona], 40, 8, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                $aErrores[$numeroPersona]['numero'] = validacionFormularios::comprobarEntero($_POST['numero'.$numeroPersona], 10, 0, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
                $aErrores[$numeroPersona]['medir'] = validacionFormularios::comprobarEntero($_POST['medir'.$numeroPersona], 220, 100, 1); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            }
            foreach ($aErrores as $numPersona => $a_Persona) {
                foreach ($a_Persona as $numPregunta => $nombre) {
                    if ($aErrores[$numPersona][$numPregunta] != null) {
                        $entradaOK = false; //Si la posición del array es distinta de null se cambia el valor de la variable booleana a false.
                        $_POST[$numPregunta.$numPersona]=""; //Si la posición del array es distinta de null se limpia el valor de la variable $_POST correspondiente.
                    }
                }
            }
        } else {
            $entradaOK = false; //Si no se ha pulsado el botón submit la variable booleana tendrá valor false, ya que los campos estarán vacíos.
        }
        if ($entradaOK) { //Si la entrada de datos es correcta se imprimen por pantalla los campos.
            //Se meten los valores de la variable $POST en un array que recoge todos los datos del formulario.
            for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){
                $aFormulario[$numeroPersona]['nombre'] = $_POST['nombre'.$numeroPersona]; //Recoge el valor de cada campo nombre ya validado.
                $aFormulario[$numeroPersona]['fecha'] = $_POST['fecha'.$numeroPersona]; //Recoge el valor de cada campo fecha ya validado.
                $aFormulario[$numeroPersona]['email'] = $_POST['email'.$numeroPersona]; //Recoge el valor de cada campo email ya validado.
                $aFormulario[$numeroPersona]['numero'] = $_POST['numero'.$numeroPersona]; //Recoge el valor de cada campo número ya validado.
                $aFormulario[$numeroPersona]['medir'] = $_POST['medir'.$numeroPersona]; //Recoge el valor de cada campo número ya validado.
                $aHermanos[$numeroPersona]=$_POST['numero'.$numeroPersona]; //Guarda en el array de hermanos cada uno de los valores de este campo.
                $aAltura[$numeroPersona]=$_POST['medir'.$numeroPersona]; //Guarda en el array de hermanos cada uno de los valores de este campo.
            }
            echo "<h2>Resultado</h2>";
            ?>
            <div class="contenedor">
                <!--Se muestran los resultados del formulario ya validado correctamente-->
                <div>
                    <table>
                        <tr>
                            <td>¿Cuál es tu nombre?</td>
                            <!--Recorre todas las personas que han contestado el formulario y muestra la información recogida en el campo nombre con una celda por persona-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){?> 
                            <td><?php echo $aFormulario[$numeroPersona]['nombre']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>¿Cuál es tu fecha de nacimiento?</td>
                            <!--Recorre todas las personas que han contestado el formulario y muestra la información recogida en el campo fecha con una celda por persona-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){?>
                            <td><?php echo $aFormulario[$numeroPersona]['fecha']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>¿Cuál es tu email?</td>
                            <!--Recorre todas las personas que han contestado el formulario y muestra la información recogida en el campo email con una celda por persona-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){?>
                            <td><?php echo $aFormulario[$numeroPersona]['email']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>¿Cuántos hermanos tienes?</td>
                            <!--Recorre todas las personas que han contestado el formulario y muestra la información recogida en el campo hermanos con una celda por persona-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){?>
                            <td><?php echo $aFormulario[$numeroPersona]['numero']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>¿Cuántos cm mides?</td>
                            <!--Recorre todas las personas que han contestado el formulario y muestra la información recogida en el campo medir con una celda por persona-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){?>
                            <td><?php echo $aFormulario[$numeroPersona]['medir']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>Media de hermanos: <?php echo array_sum($aHermanos)/count($aHermanos) ?></td>
                            <td>La suma de hermanos es: <?php echo array_sum($aHermanos) ?></td>
                            <td>El número de campos del aHermanos es: <?php echo count($aHermanos) ?></td>
                            <td>Número máximo de hermanos: <?php echo max($aHermanos) ?></td>
                            <td>Número mínimo de hermanos: <?php echo min($aHermanos) ?></td>
                        </tr>
                        <tr>
                            <td>Media de altura: <?php echo array_sum($aAltura)/count($aAltura) ?> cm</td>
                            <td>La suma de alturas es: <?php echo array_sum($aAltura) ?> cm</td>
                            <td>El número de campos del aAltura es: <?php echo count($aAltura) ?></td>
                            <td>Altura máxima recogida: <?php echo max($aAltura) ?> cm</td>
                            <td>Altura mínima recogida: <?php echo min($aAltura) ?> cm</td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario, que mostrará el resultado en la misma página.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="contenedor">
                    <table>
                        <tr>
                            <td>¿Cuál es tu nombre?*</td>
                            <!--Recorre todas las personas que han contestado el formulario y recoge la información en el campo nombre con una celda por persona y guardando la información introducida anteriormente-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){ ?>
                            <td><input type="text" name="nombre<?php echo $numeroPersona ?>" value="<?php echo $_POST['nombre'.$numeroPersona]?>"></td>
                            <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numeroPersona]['nombre'] . "</font>";?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>¿Cuál es tu fecha de nacimiento?*</td>
                            <!--Recorre todas las personas que han contestado el formulario y recoge la información en el campo fecha con una celda por persona y guardando la información introducida anteriormente-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){ ?>
                            <td><input type="text" name="fecha<?php echo $numeroPersona ?>" placeholder="yyyy-mm-dd" value="<?php echo $_POST['fecha'.$numeroPersona]?>"></td>
                            <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numeroPersona]['fecha'] . "</font>";?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>¿Cuál es tu email?*</td>
                            <!--Recorre todas las personas que han contestado el formulario y recoge la información en el campo email con una celda por persona y guardando la información introducida anteriormente-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){ ?>
                            <td><input type="text" name="email<?php echo $numeroPersona ?>" placeholder="Ej:nombre@gmail.com" value="<?php echo $_POST['email'.$numeroPersona]?>"></td>
                            <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numeroPersona]['email'] . "</font>";?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>¿Cuántos hermanos tienes?*</td>
                            <!--Recorre todas las personas que han contestado el formulario y recoge la información en el campo hermanos con una celda por persona y guardando la información introducida anteriormente-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){ ?>
                            <td><input type="text" name="numero<?php echo $numeroPersona ?>" value="<?php echo $_POST['numero'.$numeroPersona]?>"></td>
                            <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numeroPersona]['numero'] . "</font>";?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>¿Cuántos cm mides?*</td>
                            <!--Recorre todas las personas que han contestado el formulario y recoge la información en el campo medir con una celda por persona y guardando la información introducida anteriormente-->
                            <?php for($numeroPersona=1;$numeroPersona<$numero;$numeroPersona++){ ?>
                            <td><input type="text" name="medir<?php echo $numeroPersona ?>" value="<?php echo $_POST['medir'.$numeroPersona]?>"></td>
                            <td><?php echo "<font color='#FF0000' size='1px'>" . $aErrores[$numeroPersona]['medir'] . "</font>";?></td>
                            <?php } ?>
                        </tr>
                        <tr><td><input type="submit" name="Registrarse" value="Enviar los datos del formulario" class="boton"></td></tr>
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