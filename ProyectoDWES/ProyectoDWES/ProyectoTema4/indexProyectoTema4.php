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
        <h1>Ejercicios del Tema 4</h1>
        <div>
            <table>
                <tr>
                    <td></td>
                    <!--<td></td>-->
                    <td class="titulo" colspan="3">MySQLi</td>
                    <!--<td></td>-->
                    <!--<td></td>-->
                    <td class="titulo" colspan="3">PDO</td>
                    <!--<td></td>-->
                </tr>
                <tr>
                    <td>0.-Scripts de la base de datos DAW203_DBDepartamentos</td>
                    <td>Script de creación:</td>
                    <td><a href="mostrarCodigo/mostrarCodigoCreacion.php"><img src="webroot/img/sql.jpg"></a></td>
                    <td>Script de carga inicial</td>
                    <td><a href="mostrarCodigo/mostrarCodigoInsercion.php"><img src="webroot/img/sql.jpg"></a></td>
                    <td>Script de borrado</td>
                    <td><a href="mostrarCodigo/mostrarCodigoBorrado.php"><img src="webroot/img/sql.jpg"></a></td>
                </tr>
                <tr>
                    <td>1.-Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                    <td><a href="codigoPHP/ej01mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio01mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej01pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio01pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>2.-Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                    <td><a href="codigoPHP/ej02mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio02mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej02pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio02pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>3.-Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
                    <td><a href="codigoPHP/ej03mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio03mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej03pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio03pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>4.-Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento).</td>
                    <td><a href="codigoPHP/ej04mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio04mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej04pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio04pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>5.-Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</td>
                    <td><a href="codigoPHP/ej05mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio05mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej05pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio05pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>6.-Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada.</td>
                    <td><a href="codigoPHP/ej06mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio06mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej06pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio06pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>7.-Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla Departamento de nuestra base de datos (IMPORTAR).</td>
                    <td><a href="codigoPHP/ej07mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio07mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej07pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio07pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>8.-Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un fichero departamento.xml (COPIA DE SEGURIDAD / EXPORTAR).</td>
                    <td><a href="codigoPHP/ej08mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio08mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej08pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio08pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>9.-Aplicación resumen MtoDeDepartamentos. (Incluir PHPDoc y versionado en el repositorio GIT).</td>
                    <td><a href="codigoPHP/MtoDepartamentosTema4/index.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="codigoPHP/MtoDepartamentosTema4/mostrarCodigo/mostrarCodigoMtoDepartamentos.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/MtoDepartamentosTema4/index.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="codigoPHP/MtoDepartamentosTema4/mostrarCodigo/mostrarCodigoMtoDepartamentos.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
                <tr>
                    <td>10.-Aplicación resumen MtoDeDepartamentos POO y multicapa.</td>
                    <td><a href="codigoPHP/ej10mysqli.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio10mysqli.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                    <td><a href="codigoPHP/ej10pdo.php"><img src="webroot/img/ejecutar.jpg"></a></td>
                    <td><a href="mostrarCodigo/mostrarEjercicio10pdo.php"><img src="webroot/img/php.jpg"></a></td>
                    <td>PHPDoc</td>
                </tr>
            </table>
        <div class="atras"><a href="../indexProyectoDWES.php"><img src="webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>