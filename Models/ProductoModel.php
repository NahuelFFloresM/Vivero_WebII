<?php

class ProductoModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vivero;charset=utf8', 'root', '');
    }
    
	public function getProductos(){
        $sentencia = $this->db->prepare( "SELECT * FROM producto");
        $sentencia->execute();
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $productos;
    }

  public function mostrarDetalle($id) {
      $sentencia = $this->db->prepare('SELECT * FROM producto WHERE id_producto = ?');
      $sentencia->execute([$id]);
      return $sentencia->fetch(PDO::FETCH_OBJ);
      
    }

    

}

?>