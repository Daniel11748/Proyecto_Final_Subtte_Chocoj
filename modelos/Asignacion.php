<?php
require_once 'conexion.php';

class Asignacion extends conexion{
    public $asi_id;
    public $asi_emp_id;
    public $asi_are_id;
  


    public function __construct($args = [])
    {
        $this->asi_id = $args['asi_id'] ?? null;
        $this->asi_emp_id = $args['asi_emp_id'] ?? 0;
        $this->asi_are_id = $args['asi_are_id'] ?? 0;

    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into asignacion_areas (asi_emp_id,
         asi_are_id) values ('$this->asi_emp_id',
         '$this->asi_are_id')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    
      // METODO PARA CONSULTAR
      public static function buscarTodos(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM asignacion_areas where asi_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM asignacion_areas where asi_situacion = 1 ";


        if($this->asi_emp_id != ''){
            $sql .= " AND asi_emp_id = $this->asi_emp_id ";
        }
        if($this->asi_are_id != ''){
            $sql .= " AND asi_are_id = $this->asi_emp_id ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarId($id){
        $sql = " SELECT * FROM asignacion_areas WHERE asi_situacion = 1 AND asi_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;

        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE asignacion_areas SET asi_emp_id = '$this->asi_emp_id', asi_are_id = '$this->asi_are_id' WHERE asi_id = '$this->asi_id' ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function eliminar(){
        $sql = "UPDATE asignacion_areas SET asi_situacion = 0 WHERE asi_id = $this->asi_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function MostrarNombre(){
        $sql = "SELECT asi_id, emp_nombre, are_nombre FROM asignacion_areas INNER JOIN empleados ON asi_emp_id = emp_id INNER JOIN areas ON asi_are_id = are_id WHERE asi_situacion = 1 ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }


    

}

