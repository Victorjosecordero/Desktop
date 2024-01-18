<?php include_once "template/header.php" ;?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <a class="btn btn-secondary" href="form_insertar1.php">Formulario de Inscripción</a>
            <a class="btn btn-secondary" href="form_insertar1.php">Modificar Inscritos</a>
            <a class="btn btn-secondary" href="form_insertar1.php">Eliminar Inscritos</a>
            <hr>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h2>Listado de Inscritos</h2>
            <hr>


<?php 

header("Content-Type: text/html;charset=utf-8");
include_once "FuncionesConex/funcionesConexion.php" ;


$conexion=conectar();
if($conexion){
    //mysqli_set_charset($conexion,'utf8');
    $conexion->set_charset("utf8mb4");
    try {
        $query= "SELECT Codigo, NombreApel as 'Nombre y Apellidos', DNI, fech_nac as 'Fecha Nacimiento', Correo, TipoV as 'Tipo Vehiculo', Marca FROM inscripciones";
        $resul=$conexion->query($query);
        consultaConTabla($resul);


        $resul->free();
        
    } catch (mysqli_sql_exception $e) {
        $resultado =true;
        $mensaje="hay algun problema al ejecutar la sentencia de lectura a la tabla de BD <br>" . $e->getMessage() . $conexion->connect_error . $conexion->connect_errno;
        $conexion->connect_error;
    }

    desconectar($conexion);

}else{
    $resultado =true;
    $mensaje="hay algun problema al conectar al BD <br>";
    $conexion->connect_error;
}

?>


<?php 
    if(isset($resultado)){

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <?= $mensaje ?>
            </div>
        </div>
    </div>
</div>
<?php 
    }
?>

    </div>
    </div>
</div>





<?php include_once "template/footer.php" ?>