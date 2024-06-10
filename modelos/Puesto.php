<?php
require_once 'conexion.php';

class Puesto extends conexion{
    public $pue_id;
    public $pue_nombre;
    public $pue_sueldo;
  


    public function __construct($args = [])
    {
        $this->pue_id = $args['pue_id'] ?? null;
        $this->pue_nombre = $args['pue_nombre'] ?? '';
        $this->pue_sueldo = $args['pue_sueldo'] ?? 0;

    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into puestos (pue_nombre,
         pue_sueldo) values ('$this->pue_nombre',
         '$this->pue_sueldo')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    
      // METODO PARA CONSULTAR
      public static function buscarTodos(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM puestos where pue_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM puestos where pue_situacion = 1 ";


        if($this->pue_nombre != ''){
            $sql .= " AND pue_nombre like '%$this->pue_nombre%' ";
        }
        if($this->pue_sueldo != ''){
            $sql .= " AND pue_sueldo = $this->pue_sueldo ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarId($id){
        $sql = " SELECT * FROM puestos WHERE pue_situacion = 1 AND pue_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;

        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE puestos SET pue_nombre = '$this->pue_nombre', pue_sueldo = '$this->pue_sueldo' WHERE pue_id = '$this->pue_id' ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function eliminar(){
        $sql = "UPDATE puestos SET pue_situacion = 0 WHERE pue_id = $this->pue_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

}