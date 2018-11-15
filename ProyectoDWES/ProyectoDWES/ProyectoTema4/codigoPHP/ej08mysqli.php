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
        <h1>Ejercicio 8</h1>
        <?php
        /**
          @author: Christian Muñiz de la Huerga
          @since: 06/11/2018
          Comentarios: en este programa se exportan departamentos a un fichero xml desde la base de datos.
         */
        include '../config/configuracionDB.php';
        $baseDeDatos = new mysqli(); //Se inicia la variable como un elemento mysqli.
        $baseDeDatos->connect(IP, USUARIO, PASS, DB); //Se conecta a la base de datos pasándole la IP, usuario, contraseña y base de datos.
        if ($baseDeDatos->connect_error == null) { //Si no se produce ningún error se llevan a cabo las siguientes instrucciones.
            echo "<p>La conexión ha sido correcta</p>"; //Imprime por pantalla un mensaje.
            $archivo = new DOMDocument(); //Crea un nuevo objeto DOM.
            $archivo->formatOutput = true; //Da formato al XML.
            $departamentos = $archivo->createElement('departamentos'); //Crea el elemento raiz departamentos.
            $departamentos = $archivo->appendChild($departamentos); //Añade el elemento departamentos como hijo del objeto DOM, elemento raiz.
            $consulta = $baseDeDatos->query('select * from Departamento', MYSQLI_USE_RESULT); //Se guarda en la variable consulta el resultado obtenido de la ejecución del query.
            $objetoResultados = $consulta->fetch_object(); //Vuelca el resultado del query en un array.
            while ($objetoResultados != null) { //Mientras el array siga teniendo registros realiza las siguientes instrucciones.
                $departamento = $archivo->createElement('departamento'); //Crea un elemento departamento por cada registro.
                $departamento = $departamentos->appendChild($departamento); //Añade el elemento departamento como hijo del elemento raiz.
                $CodDepartamento = $archivo->createElement('CodDepartamento', $objetoResultados->CodDepartamento); //Crea un elemento código por cada registro.
                $CodDepartamento = $departamento->appendChild($CodDepartamento); //Añade el elemento código como hijo del elemento departamento creado anteriormente.
                $DescDepartamento = $archivo->createElement('DescDepartamento', $objetoResultados->DescDepartamento); //Crea un elemento descripción por cada registro.
                $DescDepartamento = $departamento->appendChild($DescDepartamento); //Añade el elemento descripción como hijo del elemento departamento creado anteriormente.
                $objetoResultados = $consulta->fetch_object(); //Vuelca el siguiente resultado del query en un array.
            }
            echo "<p>Número de registros: " . $consulta->num_rows . "</p>"; //Imprime por pantalla el número de registros en el array.
            $archivo->saveXML(); //Guarda el objeto DOM como elemento XML.
            if ($archivo->save('../tmp/copiaDB.xml') != false) { //Guarda el elemento XML anterior en la ruta especificada.
                echo "La base de datos se ha guardado correctamente";
            } else {
                echo "No pudo guardarse la base de datos";
            }
        } else {
            echo "<p>Se ha producido el error " . $baseDeDatos->connect_error . "</p>"; //Se imprime por pantalla el mensaje de error correspondiente.
            echo "<p>Se ha producido el error con el código " . $baseDeDatos->connect_errno . "</p>"; //Se imprime por pantalla el código de error correspondiente.
        }
        $baseDeDatos->close(); //Se cierra la conexión con la base de datos.
        ?>
        <div class="atras"><a href="../indexProyectoTema4.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>