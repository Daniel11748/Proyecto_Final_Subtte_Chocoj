<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">REGISTRO Y GESTION DE AREAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/areas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="are_nombre">NOMBRE DEL AREA</label>
                <input type="text" name="are_nombre" id="are_nombre" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
            <div class="col">
                <a href="../../controladores/areas/buscar.php" class="btn btn-success w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>