<?php

require '../../modelos/Asignacion.php';

// consulta
try {
    $_GET['asi_emp_id'] = htmlspecialchars($_GET['asi_emp_id']);
    $_GET['asi_are_id'] = htmlspecialchars($_GET['asi_are_id']);

    // $_GET['pue_sueldo'] = filter_var($_GET['pue_sueldo'], FILTER_VALIDATE_INT);


    $objAsignacion = new Asignacion($_GET);
    $asignaciones = $objAsignacion->buscar();
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
        <a href="../../vistas/asignacion/buscar.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE BUSQUEDA</a>
    </div>
</div>
<h1 class="text-center">PUESTOS EN NUETRA EMPRESA</h1>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Empleado</th>
                    <th>Area</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($asignaciones) > 0) : ?>
                    <?php foreach ($asignaciones as $key => $asignacion) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $asignacion['asi_emp_id'] ?></td>
                            <td><?= $asignacion['asi_are_id'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/asignacion/modificar?asi_id=<?= base64_encode($asignacion['asi_id']) ?>"><i class="bi bi-pencil-square me-2"></i>MODIFICAR</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/asignaciones/eliminar.php?asi_id=<?= base64_encode($asignacion['asi_id']) ?>"><i class="bi bi-trash me-2"></i>ELIMINAR</a></li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">NO SE HAN REGISTRADO PUESTOS</td>
                    </tr>
                <?php endif ?>
            </tbody>

        </table>
    </div>
</div>
<?php include_once '../../vistas/templates/foother.php'; ?>