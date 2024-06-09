<?php
require 'conexion.php';

class Empleado extends conexion{
    public $emp_id;
    public $emp_nombre;
    public $emp_dpi;
    public $emp_puesto;
    public $emp_edad;
    public $emp_sexo;
    public $emp_situacion;


    public function __construct($args = [])
    {
        $this->emp_id = $args['emp_id'] ?? null;
        $this->emp_nombre = $args['emp_nombre'] ?? '';
        $this->emp_dpi = $args['emp_dpi'] ?? '';
        $this->emp_puesto = $args['emp_puesto'] ?? 0;
        $this->emp_edad = $args['emp_edad'] ?? 0;
        $this->emp_sexo = $args['emp_sexo'] ?? 0;
        $this->emp_situacion = $args['emp_situacion'] ?? '';

    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into empleados (emp_nombre,
         emp_dpi, emp_puesto, emp_edad, emp_sexo) values ('$this->emp_nombre',
         '$this->emp_dpi', '$this->emp_puesto', '$this->emp_edad', '$this->emp_sexo')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }


}