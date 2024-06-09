<?php

require '../../modelos/Empleado.php';

// VALIDAR INFORMACION
$_POST['emp_id'] = filter_var($_POST['emp_id'], FILTER_VALIDATE_INT);
$_POST['emp_nombre'] = htmlspecialchars($_POST['emp_nombre']);
$_POST['emp_dpi'] = htmlspecialchars($_POST['emp_dpi']);
$_POST['emp_puesto'] = filter_var($_POST['emp_puesto'], FILTER_VALIDATE_INT);
$_POST['emp_edad'] = filter_var($_POST['emp_edad'], FILTER_VALIDATE_INT);
$_POST['emp_sexo'] = filter_var($_POST['emp_sexo'], FILTER_VALIDATE_INT);



if ($_POST['emp_nombre'] == '' || $_POST['emp_dpi'] == '' || $_POST['emp_puesto'] < 0 || $_POST['emp_edad'] < 0|| $_POST['emp_sexo'] < 0) {

    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $empleados = new Empleado($_POST);

        
        $modificar = $empleados->modificar();

        $resultado = [
            'mensaje' => 'SE HA MODIFICADO CORRECTAMENTE EL EMPLEADO',
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
        <a href="../../controladores/empleados/buscar.php" class="btn btn-primary w-100">REGRESAR</a>
    </div>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>