<!DOCTYPE html>
<html>
    <head>
        <title>Christian Muñiz de la Huerga</title>
        <style>
            h1{
                text-align: center;
                color: #7f7f7f;
            }
            div{
                margin-bottom: 80px;
            }
            footer{
                background-color: #7f7f7f;
                position: fixed;
                bottom: 0;
                width: 100%;
            }
            footer p{
                padding: 5px;
                font-family: 'Permanent Marker';
                font-variant: small-caps;
                text-align: center;
                color: #6651BA;
            }
            footer p a{
                text-decoration: none;
                padding: 10px;
                color: #304D6F;
                font: Tahoma, Verdana, Sans-Serif, Arial;
            }
        </style>
    </head>
    <body>
        <h1>Christian Muñiz de la Huerga</h1>
        <?php
        /**
           @author: Christian Muñiz de la Huerga
           @since: 02/10/2018
           Comentarios: en este programa se muestra un hola mundo e info de PHP.
         */
        echo '<p>Hola Mundo</p>'; //Imprime por pantalla el mensaje 'Hola Mundo'.
        phpinfo(); //Muestra la información de PHP.
        ?>
        <div class="atras"><a href="../indexProyectoTema3.php"><img src="../webroot/img/atras.jpg"></a></div>
        <footer>
            <p><a href="../../../index.html">Christian Muñiz de la Huerga</a> Copyright 2018</p>
        </footer>
    </body>
</html>