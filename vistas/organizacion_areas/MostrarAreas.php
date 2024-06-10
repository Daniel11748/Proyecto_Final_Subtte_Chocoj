<?php
require '../../modelos/Empleado.php';




$id = htmlspecialchars($_POST['are_id']);


// $are_id-> $id;

// $id = $_POST[$are_id];

// var_dump($id);
// exit;


$Area = new Empleado();
$DatosArea = $Area->MostrarPorAreas($id);


include_once '../../vistas/templates/header.php'; ?>


<h1 class="text-center">PERSONAL ASIGNADO AL AREA <?= $id ?></h1>
<div class="row justify-content-center">
    <div class="col-lg-8">
    <table class="table table-bordered table-hover bg-white border">
    <thead class="border">
        <tr>
            <th class="border">No.</th>
            <th class="border">Nombres</th>
            <th class="border">DPI</th>
            <th class="border">PUESTO</th>
            <th class="border">EDAD</th>
            <th class="border">SEXO</th>
            <th class="border">SUELDO</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($DatosArea) > 0) : ?>
            <?php foreach ($DatosArea as $key => $value) : ?>
                <tr>
                    <td class="border"><?= $key + 1 ?></td>
                    <td class="border"><?= $value['emp_nombre'] ?></td>
                    <td class="border"><?= $value['are_dpi'] ?></td>
                    <td class="border"><?= $value['pue_nombre'] ?></td>
                    <td class="border"><?= $value['emp_edad'] ?></td>
                    <td class="border"><?= $value['emp_sexo'] ?></td>
                    <td class="border"><?= $value['pue_sueldo'] ?></td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="7" class="border">NO SE HAN INGRESADO REGISTROS</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

        <div class="row mb-4 justify-content-center">
            <div class="col-lg-6">
                <a href="../../vistas/organizacion_areas/index.php" class="btn btn-success w-100">VOLVER AL FORMULARIO DE BUSQUEDA</a>
            </div>
        </div>
    </div>
</div>
<?php

include_once '../../vistas/templates/foother.php'; ?>