<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">BUSCAR PUESTOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/puestos/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="pue_nombre">NOMBRE</label>
                <input type="text" name="pue_nombre" id="pue_nombre" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pue_sueldo">SUELDO</label>
                <input type="number" name="pue_sueldo" id="pue_sueldo" class="form-control" >
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
