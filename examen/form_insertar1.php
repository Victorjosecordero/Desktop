<?php include_once "template/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <a class="btn btn-secondary" href="leerTabla.php">Ver Inscritos</a>
            <hr>
            <h2 class="mt-4">FORMULARIO DE INSCRIPCIÓN</h2>
            <hr>
            <form method="post" action="accForm_insertar1.php">
                <div class="form-group">
                    <label for="nombre">Nombre Y Apellidos</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" name="dni" id="dni" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fech_nac">Fecha Nacimiento</label>
                    <input type="date" name="fech_nac" id="fech_nac" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vehiculo">Vehiculo</label>
                    <select name="vehiculo" id="vehiculo" class="form-control">
                        <option value="">-- Selecione una opción --</option>
                        <option value="Camion">Camion</option>
                        <option value="Moto">Moto</option>
                        <option value="Coche">Coche</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <select name="marca" id="marca" class="form-control">
                        <option value="">-- Selecione una opcion --</option>
                        <option value="Ferrary">Ferrary</option>
                        <option value="Mercedes">Mercedes</option>
                        <option value="Onda">Onda</option>
                        <option value="Zuzuki">Zuzuki</option>
                        <option value="Renault">Renault</option>
                        <option value="BMW">BMW</option>
                    </select>
                </div>


                <div class="form-group justify-content-md-end mt-3">
                    <input id="enviar" type="submit" name="submit" class="btn btn-outline-primary" value="Enviar" >
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once "template/footer.php" ?>
