<?php

require '../../modelos/Asignacion.php';

$emp_id = $_POST['asi_emp_id'];
$are_id = $_POST['asi_are_id'];

// VALIDAR INFORMACION
$_POST['asi_emp_id'] = filter_var($emp_id, FILTER_VALIDATE_INT);
$_POST['asi_are_id'] = filter_var($are_id, FILTER_VALIDATE_INT);


if ($_POST['asi_emp_id'] < 0 || $_POST['asi_are_id'] < 0) {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $asignaciones = new Asignacion($_POST);
        $guardar = $asignaciones->guardar();
        $resultado = [
            'mensaje' => 'ASIGNACION CORRECTAMENTE INSERTADA',
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
        <a href="../../vistas/asignacion/index.php" class="btn btn-primary w-100">REGRESAR AL FORMULARIO DE GESTION DE ASIGNACIONES</a>
    </div>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>