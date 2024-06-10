<?php

require '../../modelos/Empleado.php';

// consulta
try {
    $_GET['emp_nombre'] = htmlspecialchars($_GET['emp_nombre']);
    $_GET['emp_dpi'] = htmlspecialchars($_GET['emp_dpi']);
    $_GET['emp_puesto'] = filter_var($_GET['emp_puesto'], FILTER_VALIDATE_INT);
    $_GET['emp_edad'] = filter_var($_GET['emp_edad'], FILTER_VALIDATE_INT);
    $_GET['emp_sexo'] = htmlspecialchars($_GET['emp_sexo']);
    
    $objEmpleado = new Empleado($_GET);
    $empleados = $objEmpleado->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $empleados,
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
        <a href="../../vistas/empleado/buscar.php" class="btn btn-success w-100">VOLVER AL FORMULARIO DE BUSQUEDA</a>
    </div>
</div>
<h1 class="text-center">EMPLEADOS</h1>
<div class="row justify-content-center">
    <div class="col-lg-8">
    <table class="table table-bordered table-hover bg-white border">
    <thead class="border">
        <tr>
            <th class="border">No.</th>
            <th class="border">Nombre</th>
            <th class="border">DPI</th>
            <th class="border">Puesto</th>
            <th class="border">Edad</th>
            <th class="border">Sexo</th>
            <th class="border">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($resultado['codigo'] == 1 && count($empleados) > 0) : ?>
            <?php foreach ($empleados as $key => $empleado) : ?>
                <tr>
                    <td class="border"><?= $key + 1 ?></td>
                    <td class="border"><?= $empleado['emp_nombre'] ?></td>
                    <td class="border"><?= $empleado['emp_dpi'] ?></td>
                    <td class="border"><?= $empleado['emp_puesto'] ?></td>
                    <td class="border"><?= $empleado['emp_edad'] ?></td>
                    <td class="border"><?= $empleado['emp_sexo'] ?></td>
                    <td class="border text-center">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../vistas/empleado/modificar.php?emp_id=<?= base64_encode($empleado['emp_id']) ?>"><i class="bi bi-pencil-square me-2"></i>MODIFICAR</a></li>
                                <li><a class="dropdown-item" href="../../controladores/empleados/eliminar.php?emp_id=<?= base64_encode($empleado['emp_id']) ?>"><i class="bi bi-trash me-2"></i>ELIMINAR</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="border">NO SE HAN REGISTRADO EMPLEADOS</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

    </div>
</div>
<?php include_once '../../vistas/templates/foother.php'; ?>