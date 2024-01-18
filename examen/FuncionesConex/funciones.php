<?php
//FUNCIONES
function filtrado($datos){
    $datos=trim($datos);
    $datos=stripslashes($datos);
    $datos=htmlspecialchars($datos);
    return $datos;
}//Cierra funcion 

function validarDNI($dni) {

    if (preg_match('/^[0-9]{8}[A-HJ-NP-TV-Z]$/i', $dni)) {
       
        $digitos = substr($dni, 0, 8);
        $letra = strtoupper(substr($dni, -1));
        $letrasDni = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letraCalculo = $letrasDni[$digitos % 23];

        if ($letra === $letraCalculo) {
            return true;
        }
    }

    return false; 
}

function validarEdad($fech_nac) {
      
    $refNacimiento = strtotime($fech_nac);
    $refActual = time();
    $calculo = $refActual - $refNacimiento;
    $edad = floor($calculo / (365 * 24 * 60 * 60));

    return $edad >= 18;
}


?>