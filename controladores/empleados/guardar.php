<?php

require '../../modelos/Empleado.php';

$puesto = $_POST['emp_puesto'];
$edad = $_POST['emp_edad'];
$sexo = $_POST['emp_sexo'];
$area = $_POST['emp_area'];

// VALIDAR INFORMACION
$_POST['emp_nombre'] = htmlspecialchars($_POST['emp_nombre']);
$_POST['emp_dpi'] = htmlspecialchars($_POST['emp_dpi']);
$_POST['emp_puesto'] = filter_var($puesto, FILTER_VALIDATE_INT);
$_POST['emp_edad'] = filter_var($edad, FILTER_VALIDATE_INT);
$_POST['emp_sexo'] = filter_var($sexo, FILTER_VALIDATE_INT);
$_POST['emp_area'] = filter_var($area, FILTER_VALIDATE_INT);


if ($_POST['emp_nombre'] == '' || $_POST['emp_dpi'] == '' || $_POST['emp_puesto'] < 0 || $_POST['emp_edad'] < 0 || $_POST['emp_sexo'] < 0 || $_POST['emp_area'] < 0) {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $empleados = new Empleado($_POST);
        $guardar = $empleados->guardar();
        $resultado = [
            'mensaje' => 'CLIENTE INSERTADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/empleado/index.php" class="btn btn-primary w-100">REGRESAR AL FORMULARIO DE REGISTRO</a>
    </div>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>