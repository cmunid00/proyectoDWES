﻿﻿<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <link rel="stylesheet" type="text/css" href="webroot/css/estilos.css"/>
        <style>
            h1{
                font: normal 3.4em "fb", "Trebuchet MS", Helvetica, Arial;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicios del Tema 3</h1>
        <div>
            <table>
                <tr>
                    <td>0.-Hola mundo y phpinfo().</td>
                    <td><a href="codigoPHP/ej00.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio00.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>1.-Inicializar variables de los distintos tipos de datos básicos y mostrarlos por pantalla.</td>
                    <td><a href="codigoPHP/ej01.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio01.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>2.-Inicializar y mostrar una variable heredoc.</td>
                    <td><a href="codigoPHP/ej02.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio02.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>3.-Mostrar la fecha y hora actual en España. <?php setlocale(LC_TIME, 'es_ES.UTF-8');date_default_timezone_set('Europe/Madrid'); echo "Hora en España: ".date('H:i:sa')."<br>";?></td>
                    <td><a href="codigoPHP/ej03.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio03.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>4.-Mostrar la fecha y hora actual en Portugal. <?php setlocale(LC_TIME, 'pt_PT.UTF-8');date_default_timezone_set('Europe/Lisbon');echo "Hora en Oporto: ".date('H:i:sa')?></td>
                    <td><a href="codigoPHP/ej04.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio04.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>5.-Inicializar y mostrar una variable timestamp.</td>
                    <td><a href="codigoPHP/ej05.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio05.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>6.-Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.</td>
                    <td><a href="codigoPHP/ej06.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio06.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>7.-Mostrar el nombre del fichero que se está ejecutando.</td>
                    <td><a href="codigoPHP/ej07.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio07.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>8.-Mostrar la dirección IP del equipo desde el que estás accediendo.</td>
                    <td><a href="codigoPHP/ej08.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio08.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>9.-Mostrar el path donde se encuentra el fichero que se está ejecutando.</td>
                    <td><a href="codigoPHP/ej09.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio09.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>10.-Mostrar el contenido del fichero que se está ejecutando</td>
                    <td><a href="codigoPHP/ej10.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio10.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>11.-Mostrar el documento PHPDoc del proyecto que se está ejecutando generado con PHP Documentor o ApiGen.</td>
                    <td></td>
                    <td></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>12.-Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).</td>
                    <td><a href="codigoPHP/ej12.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio12.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>13.-Crear una función que cuente el número de visitas a la página actual desde una fecha concreta.</td>
                    <td><a href="codigoPHP/ej13.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio13.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>14.-Comprobar las librerías que estás utilizando en tu entorno de desarrollo y explotación. Crear tu propia librería de funciones y estudiar la forma de usarla en el entorno de desarrollo y en el de explotación.</td>
                    <td><a href="codigoPHP/ej14.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio14.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>15.-Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la semana. (Array asociativo con los nombres de los días de la semana).</td>
                    <td><a href="codigoPHP/ej15.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio15.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>16.-Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</td>
                    <td><a href="codigoPHP/ej16.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio16.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>17.-Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan.</td>
                    <td><a href="codigoPHP/ej17.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio17.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>18.-Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</td>
                    <td><a href="codigoPHP/ej18.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio18.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>19.-Construir una librería de funciones de validación de campos de formularios (LibreríaValidacionFormularios.php) para utilizarla en los siguientes ejercicios.</td>
                    <td><a href="mostrarCodigo/mostrarEjercicio19.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio19.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>20.-Convertir la LibreriaValidacionFormularios.php en una clase ValidacionFormularios.php.</td>
                    <td><a href="mostrarCodigo/mostrarEjercicio20.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio20.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>21.-Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre las preguntas y las respuestas recogidas.</td>
                    <td><a href="codigoPHP/ej21/ej21.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio21.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>22.-Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas.</td>
                    <td><a href="codigoPHP/ej22.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio22.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>23.-Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente.</td>
                    <td><a href="codigoPHP/ej23.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio23.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>24.-Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.</td>
                    <td><a href="codigoPHP/ej24.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio24.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>25.-Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.</td>
                    <td><a href="codigoPHP/ej25.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio25.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>26.-Recoger las respuestas a una encuesta de varias preguntas realizada a 5 personas, el usuario de la página web tecleará las respuestas y recibirá como respuesta un resumen con algún tipo de calculo, resumen o tratamiento sobre las respuestas a la encuesta.</td>
                    <td><a href="codigoPHP/ej26.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio26.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>27.-Probar la plantilla anterior desarrollando un formulario que recoja la temperatura y la presión atmosférica en una serie de fechas y (cuando el usuario lo decida) genere un informe con los datos recibidos y un promedios, mínimos y máximos de temperatura y presión atmosférica.</td>
                    <td><a href="codigoPHP/ej27.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio27.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
            </table>
        <div class="atras"><a href="../indexProyectoDWES.php"><img src="webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>