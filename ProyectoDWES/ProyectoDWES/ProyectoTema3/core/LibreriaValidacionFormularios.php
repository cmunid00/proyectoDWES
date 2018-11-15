<?php

function validaAlfabetico($cadena, $obligatorio, $tamanioMax, $tamanioMin) { //Valida si el campo introducido es de tipo alfabético.
    $mensaje = campoVacio($cadena, $obligatorio); //La cadena recibe un mensaje de la función campo vacío si éste está vacío.
    $mensaje = $mensaje . tamanioMax($cadena, $tamanioMax); //Concatena el mensaje con el de la función tamaño máximo si éste da error.
    $mensaje = $mensaje . " " . tamanioMin($cadena, $tamanioMin); //Concatena el mensaje con el de la función tamaño mínimo si éste da error.
    if(!ctype_alpha($cadena) && $cadena!=null){ //Verifica si la cadena es alfabética y no es nula.
        $mensaje = $mensaje . " <span style='color:red'>El campo debe ser alfabético</span>"; //Concatena el mensaje con otro de error.
    } 
    return $mensaje; //Devuelve el mensaje.
}

function validaAlfanumerico($cadena, $obligatorio, $tamanioMax, $tamanioMin) { //Valida si el campo introducido es de tipo alfanumérico.
    $mensaje = campoVacio($cadena, $obligatorio); //La cadena recibe un mensaje de la función campo vacío si éste está vacío.
    $mensaje = $mensaje . tamanioMax($cadena, $tamanioMax); //Concatena el mensaje con el de la función tamaño máximo si éste da error.
    $mensaje = $mensaje . " " . tamanioMin($cadena, $tamanioMin); //Concatena el mensaje con el de la función tamaño mínimo si éste da error.
    if(!ctype_alnum($cadena) && $cadena!=null){ //Verifica si la cadena es alfanumérica y no es nula.
        $mensaje = $mensaje . " <span style='color:red'>El campo debe ser alfanumérico</span>"; //Concatena el mensaje con otro de error.
    }   
    return $mensaje; //Devuelve el mensaje.
}

function esObligatorio($obligatorio) { //Valida si el campo es obligatorio.
    if ($obligatorio == 1) {
        $obligado = true; //Si el campo es obligatorio devuelve true.
    } else {
        $obligado = false; //Si el campo no es obligatorio devuelve false.
    }
    return $obligado;
}

function campoVacio($cadena, $obligatorio) { //Valida si el campo está vacío.
    $mensaje = null; //Inicializa el mensaje a null.
    if (empty(trim($cadena))) { //Verifica si el campo esta vacío quitando los espacios.
        if (esObligatorio($obligatorio)) { //Verifica si el campo es obligatorio.
            $mensaje = "<span style='color:red'>Campo vacío</span>"; //Concatena el mensaje con otro de error.
        }
    }
    return $mensaje; //Devuelve el mensaje.
}

function tamanioMin($cadena, $min) { //Valida el tamaño mínimo del campo.
    $mensaje = null; //Inicializa el mensaje a null.
    if (strlen($cadena) < $min && $cadena!=null) { //Comprueba que la longitud de la cadena sea mayor que el mínimo y no sea nulo.
        $mensaje = "<span style='color:red'>La longitud mínima es " . $min . "</span>"; //Concatena el mensaje con otro de error.
    }
    return $mensaje; //Devuelve el mensaje.
}

function tamanioMax($cadena, $max) { //Valida el tamaño máximo del campo.
    $mensaje = null; //Inicializa el mensaje a null.
    if (strlen($cadena) > $max) { //Comprueba que la longitud de la cadena sea menor que el máximo.
        $mensaje = "<span style='color:red'>La longitud máxima es " . $max . "</span>"; //Concatena el mensaje con otro de error.
    }
    return $mensaje; //Devuelve el mensaje.
}

?>