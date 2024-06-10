<?php

require '../../modelos/Area.php';

// consulta
try {
    $_GET['are_nombre'] = htmlspecialchars($_GET['are_nombre']);


    $objArea = new Area($_GET);
    $areas = $objArea->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $areas,
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
        <a href="../../vistas/area/buscar.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE BUSQUEDA</a>
    </div>
</div>
<h1 class="text-center">AREAS DE INGESOFT S.A.</h1>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($areas) > 0) : ?>
                    <?php foreach ($areas as $key => $area) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $area['are_nombre'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/area/modificar.php?pue_id=<?= base64_encode($area['pue_id']) ?>"><i class="bi bi-pencil-square me-2"></i>MODIFICAR</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/areas/eliminar.php?pue_id=<?= base64_encode($area['pue_id']) ?>"><i class="bi bi-trash me-2"></i>ELIMINAR</a></li>
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