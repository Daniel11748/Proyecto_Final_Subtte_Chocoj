<?php
require 'conexion.php';

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


}