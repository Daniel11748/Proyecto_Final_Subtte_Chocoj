<?php

require '../../modelos/Asignacion.php';

// consulta
try {
    $_GET['asi_emp_id'] = filter_var($_GET['asi_emp_id'], FILTER_VALIDATE_INT);
    $_GET['asi_are_id'] = filter_var($_GET['asi_are_id'], FILTER_VALIDATE_INT);

    // $_GET['pue_sueldo'] = filter_var($_GET['pue_sueldo'], FILTER_VALIDATE_INT);


    $objAsignacion = new Asignacion();
    $asignaciones = $objAsignacion->MostrarNombre();


    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $asignaciones,
        'codigo' => 1
    ];

} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row mb-4 justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/asignacion/buscar.php" class="btn btn-success w-100">VOLVER AL FORMULARIO DE BUSQUEDA</a>
    </div>
</div>
<h1 class="text-center">NUETRA EMPRESA</h1>
<div class="row justify-content-center">
    <div class="col-lg-8">
    <table class="table table-bordered table-hover bg-white border">
    <thead class="border">
        <tr>
            <th class="border">No.</th>
            <th class="border">Empleado</th>
            <th class="border">Área</th>
            <th class="border">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($resultado['codigo'] == 1 && count($asignaciones) > 0) : ?>
            <?php foreach ($asignaciones as $key => $asignacion) : ?>
                <tr>
                    <td class="border"><?= $key + 1 ?></td>
                    <td class="border"><?= $asignacion['emp_nombre'] ?></td>
                    <td class="border"><?= $asignacion['are_nombre'] ?></td>
                    <td class="border text-center">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../vistas/asignacion/modificar.php?asi_id=<?= base64_encode($asignacion['asi_id']) ?>"><i class="bi bi-pencil-square me-2"></i>MODIFICAR</a></li>
                                <li><a class="dropdown-item" href="../../controladores/asignaciones/eliminar.php?asi_id=<?= base64_encode($asignacion['asi_id']) ?>"><i class="bi bi-trash me-2"></i>ELIMINAR</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="border">NO SE HAN REGISTRADO ASIGNACIONES</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

    </div>
</div>
<?php 

include_once '../../vistas/templates/foother.php'; ?>