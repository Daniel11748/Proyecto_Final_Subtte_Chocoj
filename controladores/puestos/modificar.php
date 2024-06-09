<?php

require '../../modelos/Puesto.php';

// VALIDAR INFORMACION
$_POST['pue_id'] = filter_var($_POST['pue_id'], FILTER_VALIDATE_INT);
$_POST['pue_nombre'] = htmlspecialchars($_POST['pue_nombre']);
$_POST['pue_sueldo'] = filter_var($_POST['pue_sueldo'], FILTER_VALIDATE_FLOAT);



if ($_POST['pue_nombre'] == '' || $_POST['pue_sueldo'] < 0) {

    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $puestos = new Puesto($_POST);

        
        $modificar = $puestos->modificar();

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
        <a href="../../controladores/puestos/buscar.php" class="btn btn-primary w-100">REGRESAR</a>
    </div>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>