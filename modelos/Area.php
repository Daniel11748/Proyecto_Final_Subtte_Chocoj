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

      // METODO PARA CONSULTAR
      public static function buscarTodos(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM areas where are_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM areas where are_situacion = 1 ";


        if($this->are_nombre != ''){
            $sql .= " AND are_nombre like '%$this->are_nombre%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarId($id){
        $sql = " SELECT * FROM areas WHERE are_situacion = 1 AND are_id = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;

        return $resultado;
    }
}