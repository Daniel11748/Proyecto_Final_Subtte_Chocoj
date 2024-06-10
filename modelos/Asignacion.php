<?php
require 'conexion.php';

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

}