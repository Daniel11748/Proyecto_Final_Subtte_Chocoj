<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">BUSCAR EMPLEADOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/empleados/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="emp_nombre">NOMBRE</label>
                <input type="text" name="emp_nombre" id="emp_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_dpi">DPI</label>
                <input type="number" name="emp_dpi" id="emp_dpi" class="form-control">
            </div>
            <div class="col">
                <label for="emp_puesto">PUESTO</label>
                <input type="number" name="emp_puesto" id="emp_puesto" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="emp_edad">EDAD</label>
                <input type="number" name="emp_edad" id="emp_edad" class="form-control">
            </div>

            <div class="col">
                <label for="emp_sexo">SEXO</label>
                <input type="number" name="emp_sexo" id="emp_sexo" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-dark text-white"> BUSCAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/foother.php'; ?>