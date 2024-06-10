<?php
include_once '../../vistas/templates/header.php';
require_once '../../modelos/Area.php';


$area = new Area();
// Obtener todas las areas
$areas = $area->buscar();

?>

<h1 class="text-center">ORGANIZACION DE INGESOFT S.A.</h1>
<div class="row justify-content-center">
    <form action="MostrarAreas.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="are_id">AREA</label>
                <select name="are_id" id="are_id" class="form-select" required>
                    <option value="" selected>SELECCIONAR UN AREA</option>
                    <?php foreach ($areas as $area) : ?>
                        <option value="<?php echo $area['are_id']; ?>"><?php echo $area['are_nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">CARGAR</button>
            </div>
        </div>
    </form>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>