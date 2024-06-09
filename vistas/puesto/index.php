<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">REGISTRO Y GESTION DE PUESTOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/puestos/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="pue_nombre">NOMBRE DEL PUESTO</label>
                <input type="text" name="pue_nombre" id="pue_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pue_sueldo">SUELDO A DEVENGAR POR EL EMPLEADO</label>
                <input type="text" name="pue_sueldo" id="pue_sueldo" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/puestos/buscar.php" class="btn btn-success w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>