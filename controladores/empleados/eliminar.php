<?php

    require '../../modelos/Empleado.php';
    
    $_GET['emp_id'] = filter_var( base64_decode($_GET['emp_id']), FILTER_SANITIZE_NUMBER_INT);
    $empleado = new Empleado($_GET);
    
    try{
        
        $eliminar = $empleado->eliminar();
        $resultado = [
            'mensaje' => 'SE HA ELIMINADO EL EMPLEADO SATISFACTORIAMENTE',
            'codigo' => 1
        ];
        
    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'HA OCURRIDO UN ERROR AL INTENTAR ELIMINAR EL EMPLEADO',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'HA OCURRIDO UN ERROR EN LA EJECUCION',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }




$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../controladores/empleados/buscar.php" class="btn btn-primary w-100">VOLVER A LA BUSQUEDA DE DATOS</a>
    </div>
</div>


<?php include_once '../../vistas/templates/foother.php'; ?>  
