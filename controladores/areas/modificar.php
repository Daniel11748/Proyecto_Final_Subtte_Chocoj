<?php

require '../../modelos/Area.php';

// VALIDAR INFORMACION
$_POST['are_id'] = filter_var($_POST['are_id'], FILTER_VALIDATE_INT);
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

        
        $modificar = $areas->modificar();

        $resultado = [
            'mensaje' => 'SE HA MODIFICADO CORRECTAMENTE EL PUESTO',
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
        <a href="../../controladores/areas/buscar.php" class="btn btn-primary w-100">REGRESAR</a>
    </div>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>