<?php

    require '../../modelos/Asignacion.php';
    
    $_GET['asi_id'] = filter_var( base64_decode($_GET['asi_id']), FILTER_SANITIZE_NUMBER_INT);
    $puesto = new Asignacion($_GET);
    
    try{
        
        $eliminar = $asignacion->eliminar();
        $resultado = [
            'mensaje' => 'SE HA ELIMINACO LA ASIGNACION SATISFACTORIAMENTE',
            'codigo' => 1
        ];
        
    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'HA OCURRIDO UN ERROR AL INTENTAR ELIMINAR LA ASIGNACION',
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
        <a href="../../controladores/asignaciones/buscar.php" class="btn btn-primary w-100">VOLVER A LA BUSQUEDA DE DATOS</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>  
