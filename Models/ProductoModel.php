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

        function getProductoById($id) {
        $sentencia = $this->db->prepare('SELECT * FROM producto WHERE id = ?');
        $sentencia->execute([$id]);
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

      /*function GetProducto($idproducto){
        $sentencia = $this->db->prepare( "SELECT nombre_producto, precio_producto, stock_producto, description_producto, 
            id_categoria, destacado_producto from producto inner JOIN categoria on producto.id_categoria=categoria.id_categoria where idproducto=?");
        $sentencia->execute(array($idproducto));
        return $sentencia->fetch(PDO::FETCH_OBJ);
      }*/
}

?>