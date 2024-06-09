<?php

require '../../modelos/Puesto.php';

$sueldo = $_POST['pue_sueldo'];


// VALIDAR INFORMACION
$_POST['pue_nombre'] = htmlspecialchars($_POST['pue_nombre']);
$_POST['pue_sueldo'] = filter_var($sueldo, FILTER_VALIDATE_INT);



if ($_POST['pue_nombre'] == '' || $_POST['pue_sueldo'] < 0) {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $puesto = new Puesto($_POST);
        $guardar = $puestos->guardar();
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