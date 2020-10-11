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

    public function getCategorias(){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria");
        $sentencia->execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $categorias;
    }

    public function getProductoById($id) {
        $sentencia = $this->db->prepare('SELECT * FROM producto WHERE id_producto=?');
        $sentencia->execute([$id]);
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $producto;
    }

    public function editProducto($id){
        $nombre = $_POST['product_name'];
        $precio = $_POST['product_price'];
        $stock = $_POST['product_stock'];
        $description = $_POST['product_description'];
        $idcat = $_POST['id_categoria'];
        $sentencia = $this->db->prepare('UPDATE producto
                                         SET nombre_producto = ?,precio_producto=?,stock_producto=?,description_producto=?,id_categoria=?
                                         WHERE id_producto=?;');
        $sentencia->execute([$nombre,$precio,$stock,$description,$idcat,$id]);
        return true;
    }

    public function deleteProducto($id){
        $sentencia = $this->db->prepare('DELETE FROM producto WHERE id_prodcuto=?');
        $sentencia->execute([$id]);
    }

    public function mostrarDetalle($id) {
      $sentencia = $this->db->prepare('SELECT * FROM producto WHERE id_producto = ?');
      $sentencia->execute([$id]);
      return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    

}

?>