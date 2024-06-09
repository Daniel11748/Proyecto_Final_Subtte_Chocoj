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
        <a href="../../vistas/empleado/buscar.php" class="btn btn-primary w-100">VOLVER AL FORMULARIO DE BUSQUEDA</a>
    </div>
</div>
<h1 class="text-center">EMPLEADOS</h1>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>DPI</th>
                    <th>Puesto</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado['codigo'] == 1 && count($empleados) > 0) : ?>
                    <?php foreach ($empleados as $key => $empleado) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $empleado['emp_nombre'] ?></td>
                            <td><?= $empleado['emp_dpi'] ?></td>
                            <td><?= $empleado['emp_puesto'] ?></td>
                            <td><?= $empleado['emp_edad'] ?></td>
                            <td><?= $empleado['emp_sexo'] ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <td colspan="4">NO SE HAN REGISTRADO EMPLEADOS</td>
                    </tr>
                <?php endif ?>
            </tbody>

        </table>
    </div>
</div>
<?php include_once '../../vistas/templates/foother.php'; ?>