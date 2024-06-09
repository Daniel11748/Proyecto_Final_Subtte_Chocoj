<?php

    require '../../modelos/Puesto.php';
    
    $_GET['pue_id'] = filter_var( base64_decode($_GET['pue_id']), FILTER_SANITIZE_NUMBER_INT);
    $puesto = new Puesto($_GET);
    
    try{
        
        $eliminar = $puesto->eliminar();
        $resultado = [
            'mensaje' => 'SE HA ELIMINACO EL PUESTO SATISFACTORIAMENTE',
            'codigo' => 1
        ];
        
    } catch (PDOException $pe){
        $resultado = [
            'mensaje' => 'HA OCURRIDO UN ERROR AL INTENTAR ELIMINAR EL PUESTO ',
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
        <a href="../../controladores/puestos/buscar.php" class="btn btn-primary w-100">VOLVER A LA BUSQUEDA DE DATOS</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>  
