<?php

class CategoriaModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vivero;charset=utf8', 'root', '');
    }

    public function getCategorias(){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria");
        $sentencia->execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $categorias;
    }

    public function nuevaCategoria($nombre,$descrip){
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre_categoria,descripcion_categoria) VALUES(?,?)");
        return $sentencia->execute([$nombre,$descrip]);
    }

    public function editCategoria($id,$nombre,$descripcion){
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre_categoria=?,descripcion_categoria=? WHERE id_categoria=?");
        $sentencia->execute([$nombre,$descripcion,$id]);
    }

    public function deleteCategoria($id){
        $sentencia = $this->db->prepare('DELETE FROM categoria WHERE id_categoria=?');
        $sentencia->execute([$id]);
    }

    public function getCategoriaById($id){
        $sentencia = $this->db->prepare( "SELECT * FROM categoria WHERE id_categoria = ?");
        $sentencia->execute([$id]);
        $categoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categoria[0];
    }
}

?>