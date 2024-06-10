<?php

require '../../modelos/Asignacion.php';

$_GET['asi_id'] = filter_var(base64_decode($_GET['asi_id']), FILTER_SANITIZE_NUMBER_INT);
$asignaciones = new Asignacion();

$AsignacionRegistrado = $asignaciones->buscarId($_GET['asi_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR ASIGNACIONES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/asignaciones/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="asi_id" id="asi_id" class="form-control" required value="<?= $AsignacionRegistrado['asi_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="asi_emp_id">NOMBRE DEL EMPLEADO</label>
                <input type="text" name="asi_emp_id" id="asi_emp_id" class="form-control" required value="<?= $AsignacionRegistrado['asi_emp_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="asi_are_id">NUEVA AREA</label>
                <input type="number" name="asi_are_id" id="asi_are_id" class="form-control" required value="<?= $AsignacionRegistrado['asi_are_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/asignaciones/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>