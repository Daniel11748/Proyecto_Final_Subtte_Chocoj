<?php

include_once '../../vistas/templates/header.php';
require_once '../../modelos/Empleado.php';
require_once '../../modelos/Area.php';

$empleado = new Empleado();
// Obtener todos los empleados
$empleados = $empleado->buscar();
$area = new Area();
// Obtener todas las areas
$areas = $area->buscar();
?>

<h1 class="text-center">FORMULARIO DE ASIGNACIONES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/asignaciones/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="asi_emp_id">EMPLEADO</label>
                <select name="asi_emp_id" id="asi_emp_id" class="form-select" required>
                    <option value="" selected>SELECCIONAR UN EMPLEADO</option>
                    <?php foreach ($empleados as $empleado) : ?>
                        <option value="<?php echo $empleado['emp_id']; ?>"><?php echo $empleado['emp_nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="asi_are_id">AREA</label>
                <select name="asi_are_id" id="asi_are_id" class="form-select" required>
                    <option value="" selected>SELECCIONAR UN AREA</option>
                    <?php foreach ($areas as $area) : ?>
                        <option value="<?php echo $area['are_id']; ?>"><?php echo $area['are_nombre']; ?></option>
                    <?php endforeach; ?>
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
                <a href="../../controladores/asignaciones/buscar.php" class="btn btn-success w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>