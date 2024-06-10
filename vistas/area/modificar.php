<?php

require '../../modelos/Area.php';

$_GET['are_id'] = filter_var(base64_decode($_GET['are_id']), FILTER_SANITIZE_NUMBER_INT);
$areas = new Area();

$AreaRegistrado = $areas->buscarId($_GET['are_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR AREAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/areas/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="are_id" id="are_id" class="form-control" required value="<?= $AreaRegistrado['are_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="are_nombre">NOMBRE DEL AREA</label>
                <input type="text" name="are_nombre" id="are_nombre" class="form-control" required value="<?= $AreaRegistrado['are_nombre'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/areas/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>