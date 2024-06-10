<?php

require '../../modelos/Area.php';


// VALIDAR INFORMACION
$_POST['are_nombre'] = htmlspecialchars($_POST['are_nombre']);



if ($_POST['are_nombre'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $areas = new Area($_POST);
        $guardar = $areas->guardar();
        $resultado = [
            'mensaje' => 'AREA CORRECTAMENTE INSERTADA',
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
        <a href="../../vistas/area/index.php" class="btn btn-primary w-100">REGRESAR AL FORMULARIO DE GESTION DE AREAS</a>
    </div>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>