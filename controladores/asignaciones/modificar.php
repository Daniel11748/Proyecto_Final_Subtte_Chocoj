<?php

require '../../modelos/Asignacion.php';

// VALIDAR INFORMACION
$_POST['asi_id'] = filter_var($_POST['asi_id'], FILTER_VALIDATE_INT);
$_POST['asi_emp_id'] = filter_var($_POST['asi_emp_id'], FILTER_VALIDATE_FLOAT);
$_POST['asi_are_id'] = filter_var($_POST['asi_are_id'], FILTER_VALIDATE_FLOAT);




if ($_POST['asi_emp_id'] == '' || $_POST['asi_are_id'] < 0) {

    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $asignaciones = new Asignacion($_POST);

        
        $modificar = $asignaciones->modificar();

        $resultado = [
            'mensaje' => 'SE HA MODIFICADO CORRECTAMENTE LA ASIGNACION',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR AL MODIFICAR LOS REGISTROS DE LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'HA OCURRIDO UN ERROR AL TRATAR DE EJECUTAR',
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
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/asignaciones/guardar.php" class="btn btn-primary w-100">REGRESAR</a>
    </div>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>