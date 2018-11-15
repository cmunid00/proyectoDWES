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
        <h1>Ejercicio 22</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 09/10/2018
          Comentarios: el programa crea un formulario y muestra los datos introducidos.
         */
        if (isset($_POST['Registrarse'])) { //Si se ha pulsado el botón Submit se lleva a cabo las siguientes instrucciones.
            echo "<h2>Datos personales</h2>";
            echo "<p>El nombre introducido es: " . $_POST['nombre'] . "</p>"; //Se muestra la variable del campo input nombre.
            echo "<p>Los apellidos son: " . $_POST['apellidos'] . "</p>"; //Se muestra la variable del campo input apellidos.
            echo "<p>El correo electrónico es: " . $_POST['correo'] . "</p>"; //Se muestra la variable del campo input correo.
            echo "<p>La contraseña elegida es: " . $_POST['pass'] . "</p>"; //Se muestra la variable del campo input pass.
            echo "<p>La fecha de nacimiento es: " . $_POST['dia'] . "/" . $_POST['mes'] . "/" . $_POST['anyo'] . "</p>"; //Se muestra las variables del campo fecha de nacimiento.
        } else { //Si no se ha pulsado el botón submit se muestra el formulario.
            //Esta instrucción indica que el formulario se mostrará en la misma página y con el método post.
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
                <div>
                    <table>
                        <caption>Datos personales</caption>
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="nombre">*</td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td><input type="text" name="apellidos">*</td>
                        </tr>
                        <tr>
                            <td>Correo electrónico</td>
                            <td><input type="text" name="correo" placeholder="atencionalcliente@impri.eu">*</td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td><input type="text" name="pass" placeholder="(5 caracteres min.)">*</td>
                        </tr>
                        <tr>
                            <td>Cumpleaños</td>
                            <td>
                                <select name="dia">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
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