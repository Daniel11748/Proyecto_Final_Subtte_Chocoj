<?php

require '../../modelos/Empleado.php';

$_GET['emp_id'] = filter_var(base64_decode($_GET['emp_id']), FILTER_SANITIZE_NUMBER_INT);
$empleados = new Empleado();

$EmpleadoRegistrado = $empleados->buscarId($_GET['emp_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR EMPLEADOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/empleados/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="emp_id" id="emp_id" class="form-control" required value="<?= $EmpleadoRegistrado['emp_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_nombre">NOMBRE DEL EMPLEADO</label>
                <input type="text" name="emp_nombre" id="emp_nombre" class="form-control" required value="<?= $EmpleadoRegistrado['emp_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_dpi">DPI DEL EMPLEADO</label>
                <input type="text" name="emp_dpi" id="emp_dpi" class="form-control" required value="<?= $EmpleadoRegistrado['emp_dpi'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_puesto">PUESTO</label>
                <input type="number" name="emp_puesto" id="emp_puesto" class="form-control" required value="<?= $EmpleadoRegistrado['emp_puesto'] ?>">
            </div>
            <div class="col">
                <label for="emp_edad">EDAD</label>
                <input type="number" name="emp_edad" id="emp_edad" class="form-control" required value="<?= $EmpleadoRegistrado['emp_edad'] ?>">
            </div>
            <div class="col">
            <label for="emp_sexo">SEXO</label>
                <select name="emp_sexo" class="form-select" aria-label="Default select example" required value="<?= $EmpleadoRegistrado['emp_sexo'] ?>">
                    <option selected>SELECCIONAR UN SEXO</option>
                    <option value="1">MASCULINO</option>
                    <option value="2">FEMENINO</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/empleados/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>