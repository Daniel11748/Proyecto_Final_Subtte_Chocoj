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
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombres</th>
                    <th>DPI</th>
                    <th>PUESTO</th>
                    <th>EDAD</th>
                    <th>SEXO</th>
                    <th>SUELDO</th>
                </tr>
            </thead>
            <tbody>
                <?php if ( count($DatosArea) > 0) : ?>
                    <?php foreach ($DatosArea as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['emp_nombre'] ?></td>
                            <td><?= $value['are_dpi'] ?></td>
                            <td><?= $value['pue_nombre'] ?></td>
                            <td><?= $value['emp_edad'] ?></td>
                            <td><?= $value['emp_sexo'] ?></td>
                            <td><?= $value['pue_sueldo'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">NO SE HAN INGRESADO REGISTROS</td>
                    </tr>
                <?php endif ?>
            </tbody>

        </table>
        <div class="row mb-4 justify-content-center">
            <div class="col-lg-6">
                <a href="../../vistas/organizacion_areas/index.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE BUSQUEDA</a>
            </div>
        </div>
    </div>
</div>
<?php

include_once '../../vistas/templates/foother.php'; ?>