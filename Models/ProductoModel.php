<?php

class ProductoModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vivero;charset=utf8', 'root', '');
    }
    
	public function getProductos($offset = null){

        $query = "SELECT * FROM producto LIMIT 5 OFFSET ".$offset;
        $sentencia = $this->db->prepare($query);
        $sentencia->execute();
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $productos;
    }

    public function getProductosAdmin(){

        $sentencia = $this->db->prepare("SELECT * FROM producto");
        $sentencia->execute();
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $productos;
    }

    public function getCantidadProductos(){
        $sentencia = $this->db->prepare( "SELECT COUNT(*) as total_items FROM producto");
        $sentencia->execute();
        $productos = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $productos;
    }

    // public function getProductos(){
    //     $sentencia = $this->db->prepare( "SELECT * FROM producto");
    //     $sentencia->execute();
    //     $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
    //     return $productos;
    // }

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

    public function nuevoProducto($nombre,$precio,$stock,$description,$idcat,$img_url = "../images/default.jpg"){
        $sentencia = $this->db->prepare('INSERT INTO producto(nombre_producto,precio_producto,stock_producto,description_producto,id_categoria,imagen_url,destacado_producto)
                                         VALUES(?,?,?,?,?,?,?)');        
        return $sentencia->execute([$nombre,$precio,$stock,$description,$idcat,$img_url,0]);
    }

    public function editProducto($nombre,$precio,$stock,$description,$idcat,$img_url,$id){
        $sentencia = $this->db->prepare('UPDATE producto
                                        SET nombre_producto = ?,precio_producto=?,stock_producto=?,description_producto=?,id_categoria=?,imagen_url=?
                                        WHERE id_producto=?');
        return $sentencia->execute([$nombre,$precio,$stock,$description,$idcat,$img_url,$id]);
    }

    public function getImagenProductoPath($id){
        $sentencia = $this->db->prepare( "SELECT imagen_url FROM producto WHERE id_producto=?");
        $sentencia->execute([$id]);
        $imagen_path = $sentencia->fetch(PDO::FETCH_OBJ);
        return $imagen_path;
    }

    public function deleteProducto($id){
        $sentencia = $this->db->prepare('DELETE FROM producto WHERE id_producto=?');
        return $sentencia->execute([$id]);
    }

    public function getProductosPorCate($id,$offset){
        $query = 'SELECT * FROM producto WHERE id_categoria=? LIMIT 5 OFFSET '.$offset;
        $sentencia = $this->db->prepare($query);
        $sentencia->execute([$id]);
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $productos;
    }

    public function buscarProductos($categoria = null,$nombre = "",$precio = null,$offset){
        $valores = array();
        $sentencia = 'SELECT * FROM categoria as cat, producto as pr WHERE ';
        $nombre = '%'.$nombre.'%';
        array_push($valores,$nombre);
        $sentencia .= 'pr.nombre_producto LIKE ? ';
        if ($categoria > 0){
            $sentencia .= 'AND cat.id_categoria = ? ';
            array_push($valores,$categoria);
        }        
        if($precio != 0){
            $sentencia .= 'AND pr.precio_producto <= ? ';
            array_push($valores,$precio);
        }
        $sentencia .='AND cat.id_categoria = pr.id_categoria LIMIT 5 OFFSET '.$offset;
        $sentencia = $this->db->prepare($sentencia);
        //$sentencia = 'SELECT * FROM categoria as cat, producto as pr WHERE cat.id_categoria = ?,pr.precio_prodcuto <= ?,pr.nombre_producto LIKE ?';
        $sentencia->execute($valores);
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
}