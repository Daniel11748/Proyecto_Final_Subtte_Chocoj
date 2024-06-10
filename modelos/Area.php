<?php
require 'conexion.php';

class Area extends conexion{
    public $are_id;
    public $are_nombre;
  
    public function __construct($args = [])
    {
        $this->are_id = $args['are_id'] ?? null;
        $this->are_nombre = $args['are_nombre'] ?? '';
    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into areas (are_nombre) values ('$this->are_nombre')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}