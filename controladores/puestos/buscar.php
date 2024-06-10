<?php

require '../../modelos/Puesto.php';

// consulta
try {
    $_GET['pue_nombre'] = htmlspecialchars($_GET['pue_nombre']);
    $_GET['pue_sueldo'] = filter_var($_GET['pue_sueldo'], FILTER_VALIDATE_INT);


    $objPuesto = new Puesto($_GET);
    $puestos = $objPuesto->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $puestos,
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
        <a href="../../vistas/puesto/buscar.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE BUSQUEDA</a>
    </div>
</div>
<h1 class="text-center">PUESTOS EN NUETRA EMPRESA</h1>
<div class="row justify-content-center">
    <div class="col-lg-8">
    <table class="table table-bordered table-hover bg-white border">
    <thead class="border">
        <tr>
            <th class="border">No.</th>
            <th class="border">Nombre</th>
            <th class="border">Sueldo</th>
            <th class="border">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($resultado['codigo'] == 1 && count($puestos) > 0) : ?>
            <?php foreach ($puestos as $key => $puesto) : ?>
                <tr>
                    <td class="border"><?= $key + 1 ?></td>
                    <td class="border"><?= $puesto['pue_nombre'] ?></td>
                    <td class="border"><?= $puesto['pue_sueldo'] ?></td>
                    <td class="border text-center">
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../vistas/puesto/modificar.php?pue_id=<?= base64_encode($puesto['pue_id']) ?>"><i class="bi bi-pencil-square me-2"></i>MODIFICAR</a></li>
                                <li><a class="dropdown-item" href="../../controladores/puestos/eliminar.php?pue_id=<?= base64_encode($puesto['pue_id']) ?>"><i class="bi bi-trash me-2"></i>ELIMINAR</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="border">NO SE HAN REGISTRADO PUESTOS</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

    </div>
</div>
<?php include_once '../../vistas/templates/foother.php'; ?>