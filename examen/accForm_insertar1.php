<?php

header("Content-Type: text/html;charset=utf-8");
include_once "FuncionesConex/funciones.php" ;
include_once "FuncionesConex/funcionesConexion.php" ;
include_once "template/header.php" ;



if($_SERVER["REQUEST_METHOD"]=="POST"){
    //VARIABLES
    $errores=array();
    $nombre= filtrado($_POST["nombre"]);
    $dni= filtrado($_POST["dni"]);
    $fech_nac = filtrado($_POST["fech_nac"]);
    $email = filtrado($_POST["email"]);
    $vehiculo = filtrado($_POST["vehiculo"]);
    $marca = filtrado($_POST["marca"]);


    if(empty($nombre) || (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/",$nombre)) || (strlen($nombre) < 3) ||(strlen($nombre)>75)){
        $errores[]="El nombre es requerido y su formato debe ser válido"; 
    }

    if(empty($dni) || validarDNI($dni)==false){
        $errores[]="El DNI no es valido"; 
    }

    if(empty($fech_nac)){
        $errores[]="La Fecha de nacimiento no puede estar vacia";
    }else{
        if(validarEdad($fech_nac)){

        }else{
            $errores[]="Lo siento, no eres mayor de edad,no puedes inscribirte";
            }
    }
    
    if(empty($email) || (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$email))  || (strlen($email) < 8) || (strlen($email) > 45)){
        $errores[]="El correo no es valido";
    }
    

    if(empty($vehiculo) || $vehiculo=="-- Selecione una opción--"){
        $errores[]="Tipo de vehiculo no puede estar vacio ni selecionada la de seleccione una opcion";
    }

    if(empty($marca) || $marca=="-- Selecione una opción--"){
        $errores[]="La marca no puede estar vacio ni selecionada la de seleccione una opcion";
    }
        

 
 

    if(empty($errores)){
        $conexion = conectar();
        if($conexion){
            $conexion->set_charset("utf8mb4");
            try{
                $stmt = $conexion->prepare("INSERT INTO inscripciones(NombreApel,DNI,fech_nac,Correo,TipoV,Marca) VALUES (?, ?, ?, ?, ?, ?)");

                $stmt->bind_param("ssssss", $varNombre, $varDni, $varFech_nac, $varEmail, $varVehiculo, $varMarca);

                $varNombre = $nombre;
                $varDni = $dni;
                $varFech_nac = $fech_nac;
                $varEmail = $email;
                $varVehiculo = $vehiculo;
                $varMarca = $marca;

                $stmt->execute();

                $stmt->close();
            }
            catch(mysqli_sql_exception $e){
                $resultado = false;
                $mensaje="Ha habido una excepción: ".$conexion->connect_error .$conexion->connect_errno;
                echo $mensaje;
            }
            desconectar($conexion);

            ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            <p>Inscripción Correcta</p>
                        </div>
                    </div>
                </div>
            </div>
                <?php
        }
        
    }else{
        ?>
        <div class="container mt-5">
        <div class="row">
        <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
        <?php
        foreach($errores as $e){
                 echo "$e <br>";
        }?>
        </div>
        </div>
    </div>
</div>
            <?php
    }
}

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <a class="btn btn-secondary" href="form_insertar1.php">Formulario de Inscripción</a>
            <a class="btn btn-secondary" href="form_insertar1.php">Visualizar Inscritos</a>
            <hr>
        </div>
    </div>
</div>