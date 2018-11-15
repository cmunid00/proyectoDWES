<?php

function contador() { // La función cuenta las visitas de la página desde una fecha.
    $archivo = "../tmp/visitas.txt"; // Selecciona el fichero.
    $f = fopen($archivo, "r"); // Abre el fichero que contará las visitas para lectura.
    if ($f) {
        $contador = fread($f, filesize($archivo)); // Lee el fichero.
        $contador = $contador + 1; // IncrementA el contador.
        fclose($f); // Cierra el fichero.
    }
    $f = fopen($archivo, "w+"); // Abre el fichero que contará las visitas como escritura.
    if ($f) {
        fwrite($f, $contador); // Sobreescribe el contador actualizado sumándole 1.
        fclose($f); // Cierra el fichero.
    }
    return $contador;
}

?>