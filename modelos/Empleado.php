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
        $this->emp_sexo = $args['emp_sexo'] ?? '';
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

     // METODO PARA CONSULTAR
     public static function buscarTodos(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM empleados where emp_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM empleados where emp_situacion = 1 ";


        if($this->emp_nombre != ''){
            $sql .= " AND emp_nombre like '%$this->emp_nombre%' ";
        }
        if($this->emp_dpi != ''){
            $sql .= " AND emp_dpi like'%$this->emp_dpi%' ";
        }
        if($this->emp_puesto != 0){
            $sql .= " AND emp_puesto like'%$this->emp_puesto%' ";
        }
        if($this->emp_edad != 0){
            $sql .= " AND emp_edad = $this->emp_edad ";
        }
        if($this->emp_sexo != ''){
            $sql .= " AND emp_sexo = $this->emp_sexo ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarId($id){
        $sql = " SELECT * FROM empleados WHERE emp_situacion = 1 AND emp_id= '$id' ";
        $resultado = array_shift( self::servir($sql)) ;

        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE empleados SET emp_nombre = '$this->emp_nombre', emp_dpi = '$this->emp_dpi', emp_puesto = '$this->emp_puesto', emp_edad = '$this->emp_edad', emp_sexo = '$this->emp_sexo' WHERE emp_id = '$this->emp_id' ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function eliminar(){
        $sql = "UPDATE empleados SET emp_situacion = 0 WHERE emp_id = $this->emp_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

}