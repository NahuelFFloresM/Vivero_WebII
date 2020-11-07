<?php

class ComentarioModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vivero;charset=utf8', 'root', '');
    }
    
	public function getComentarios(){
        $sentencia = $this->db->prepare( "SELECT * FROM comentarios as c,usuario as u WHERE c.id_usuroo=u.id_usuario");
        $sentencia->execute();
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $comentarios;
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

    public function nuevoProducto(){
        $valores = array();
        array_push($valores,$_POST['product_name'],$_POST['product_price'],$_POST['product_stock'],$_POST['product_description'],$_POST['id_categoria'],0);
        $nombre = $_POST['product_name'];
        $precio = $_POST['product_price'];
        $stock = $_POST['product_stock'];
        $description = $_POST['product_description'];
        $idcat = $_POST['id_categoria'];
        $sentencia = $this->db->prepare('INSERT INTO producto(nombre_producto,precio_producto,stock_producto,description_producto,id_categoria,destacado_producto)
                                         VALUES(?,?,?,?,?,?)');        
        return $sentencia->execute($valores);        
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
        $sentencia = $this->db->prepare('DELETE FROM producto WHERE id_producto=?');
        return $sentencia->execute([$id]);
    }

    public function getProductosPorCate($id){
        $sentencia = $this->db->prepare('SELECT * FROM producto WHERE id_categoria=?');
        $sentencia->execute([$id]);
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $productos;
    }
}