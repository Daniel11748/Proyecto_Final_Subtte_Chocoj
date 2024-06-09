<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE EMPLEADOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/empleados/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="emp_nombre">NOMBRE</label>
                <input type="text" name="emp_nombre" id="emp_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_dpi">DPI</label>
                <input type="text" name="emp_dpi" id="emp_dpi" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_puesto">PUESTO</label>
                <input type="number" name="emp_puesto" id="emp_puesto" class="form-control" required>
            </div>
            <div class="col">
                <label for="emp_edad">EDAD</label>
                <input type="number" name="emp_edad" id="emp_edad" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_edad">TELEFONO</label>
                <input type="number" name="emp_edad" id="emp_edad" class="form-control" required>
            </div>
            <div class="col">
            <label for="emp_sexo">SEXO</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>SELECCIONAR UN SEXO</option>
                    <option value="1">MASCULINO</option>
                    <option value="2">FEMENINO</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/empleados/buscar.php" class="btn btn-success w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>