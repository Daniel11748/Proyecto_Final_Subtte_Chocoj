<?php

require '../../modelos/Puesto.php';

$_GET['pue_id'] = filter_var(base64_decode($_GET['pue_id']), FILTER_SANITIZE_NUMBER_INT);
$puestos = new Puesto();

$PuestoRegistrado = $puestos->buscarId($_GET['pue_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR PUESTOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/puestos/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="pue_id" id="pue_id" class="form-control" required value="<?= $PuestoRegistrado['pue_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pue_nombre">NOMBRE DEL PUESTO</label>
                <input type="text" name="pue_nombre" id="pue_nombre" class="form-control" required value="<?= $PuestoRegistrado['pue_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pue_sueldo">SUELDO DEVENGADO</label>
                <input type="number" name="pue_sueldo" id="pue_sueldo" class="form-control" required value="<?= $PuestoRegistrado['pue_sueldo'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/puestos/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>