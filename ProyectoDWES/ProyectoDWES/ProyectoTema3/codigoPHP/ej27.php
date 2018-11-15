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
        <h1>Ejercicio 27</h1>
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
        $aFormulario = [tempHoy => null,
            tempAyer => null,
            presionAtm => null,
            estadoCielo => null,
            estadoAnimo => null,
            planHoy => null];
        $aOpcionesLista=["Nublado", "Soleado", "Despejado"]; //Se inicializan las posibles opciones de la lista 2.
        //Se inicializa un array de errores con tantas posiciones como campos de entrada de datos tenga el formulario.
        $aErrores = [tempHoy => null,
            tempAyer => null,
            presionAtm => null,
            estadoCielo => null,
            estadoAnimo => null,
            planHoy => null];
        if (isset($_POST['Registrarse'])) { //Si se pulsa el botón submit se realizan las siguientes intrucciones.
            $aErrores[tempHoy] = validacionFormularios::comprobarEntero($_POST['tempHoy'], MAXIMONUMERO, MINIMONUMERO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[tempAyer] = validacionFormularios::comprobarEntero($_POST['tempAyer'], MAXIMONUMERO, MINIMONUMERO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[presionAtm] = validacionFormularios::comprobarEntero($_POST['presionAtm'], MAXIMONUMERO, MINIMONUMERO, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[estadoCielo] = validacionFormularios::validarElementoEnLista($_POST['estadoCielo'], $aOpcionesLista, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[estadoAnimo] = validacionFormularios::validarRadioB($_POST['estadoAnimo'], OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
            $aErrores[planHoy] = validacionFormularios::comprobarAlfanumerico($_POST['planHoy'], LONGMAXTEXTOLIBRE, LONGMINTEXTOLIBRE, OBLIGATORIO); //La posición del array de errores recibe el mensaje de error de la librería de validación si éste se produjera.
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
            $aFormulario[tempHoy] = $_POST['tempHoy']; //Recoge el valor del campo ya validado.
            $aFormulario[tempAyer] = $_POST['tempAyer']; //Recoge el valor del campo ya validado.
            $aFormulario[presionAtm] = $_POST['presionAtm']; //Recoge el valor del campo ya validado.
            $aFormulario[estadoCielo] = $_POST['estadoCielo']; //Recoge el valor del campo ya validado.
            $aFormulario[estadoAnimo] = $_POST['estadoAnimo']; //Recoge el valor del campo ya validado.
            $aFormulario[planHoy] = $_POST['planHoy']; //Recoge el valor del campo ya validado.
            echo "<h2>Resultado</h2>";
            echo "<p>La temperatura actual de hoy es: " . $aFormulario[tempHoy] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>La temperatura actual de ayer es: " . $aFormulario[tempAyer] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>La presión atmosférica es: " . $aFormulario[presionAtm] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>El estado del cielo es: " . $aFormulario[estadoCielo] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>El estado de ánimo es: " . $aFormulario[estadoAnimo] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            echo "<p>El plan de hoy es: " . $aFormulario[planHoy] . "</p>"; //Imprime por pantalla el valor del campo dentro del array.
            if($aFormulario[tempHoy]>$aFormulario[tempAyer]){
                echo "<p>El tiempo está mejorando</p>";
            }else{
                if($aFormulario[tempHoy]<$aFormulario[tempAyer]){
                    echo "<p>El tiempo está empeorando</p>";
                }else{
                    echo "<p>El tiempo se mantiene</p>";
                }
            }
        } else {
            //Si la entrada de datos no es correcta se muestra el formulario que mostrará el resultado en la misma página.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                    <table>
                        <caption>Datos</caption>
                        <tr>
                            <td>Temperatura de Hoy</td>
                            <td><input type="text" name="tempHoy" placeholder="Entero ºC" value="<?php echo $_POST['tempHoy'];?>">*</td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[tempHoy]</font>";?></td> 
                        </tr>
                        <tr>
                            <td>Temperatura de Ayer</td>
                            <td><input type="text" name="tempAyer" placeholder="Entero ºC" value="<?php echo $_POST['tempAyer'];?>">*</td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[tempAyer]</font>";?></td> 
                        </tr>
                        <tr>
                            <td>Presión Atmosférica</td>
                            <td><input type="text" name="presionAtm" placeholder="Entero mB" value="<?php echo $_POST['presionAtm'];?>">*</td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[presionAtm]</font>";?></td> 
                        </tr>
                        <tr>
                            <td>Estado del Cielo</td>
                            <td>
                                <select name="estadoCielo">
                                    <option value="Soleado" <?php if($_POST['estadoCielo']=="Soleado"){echo selected;}?>>Soleado</option>
                                    <option value="Despejado" <?php if($_POST['estadoCielo']=="Despejado"){echo selected;}?>>Despejado</option>
                                    <option value="Nublado" <?php if($_POST['estadoCielo']=="Nublado"){echo selected;}?>>Nublado</option>
                                </select>
                            </td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[estadoCielo]</font>";?></td>
                        </tr>
                        <tr>
                            <td>Estado de ánimo</td>
                            <td>
                                <input type="radio" name="estadoAnimo" <?php if($_POST['estadoAnimo']=="Bueno"){echo "checked";}?> value="Bueno">Bueno
                                <input type="radio" name="estadoAnimo" <?php if($_POST['estadoAnimo']=="Malo"){echo "checked";}?> value="Malo">Malo
                                <input type="radio" name="estadoAnimo" <?php if($_POST['estadoAnimo']=="Como el tiempo"){echo "checked";}?> value="Como el tiempo">Como el tiempo*
                            </td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[estadoAnimo]</font>";?></td>
                        </tr>
                        <tr>
                            <td>Plan para Hoy</td>
                            <td><textarea name="planHoy" cols="30" rows="6"><?php echo $_POST['planHoy'];?></textarea>*</td>
                            <td><?php echo "<font color='#FF0000' size='1px'>$aErrores[planHoy]</font>";?></td>
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