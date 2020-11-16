<?php

class ComentarioModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vivero;charset=utf8', 'root', '');
    }
    
	public function getComentarios($id_producto){
        $sentencia = $this->db->prepare( "SELECT * FROM comentario WHERE id_producto=?");
        $sentencia->execute($id_producto);
        $comentarios= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $comentarios;
    }

    public function getComentario($id_comentario){
        $sentencia = $this->db->prepare("SELECT * FROM comentario where id_comentario=?");
        $sentencia->execute(array($id_comentario));
        $comentario=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentario;
    }

    public function agregarComentario($comentario, $puntuacion, $id_producto, $id_usuario){
        $sentencia = $this->db->prepare('INSERT INTO comentario(comentario,puntuacio,id_producto,id_usuario)
                                         VALUES(?,?,?,?,)');        
        return $sentencia->execute(array($comentario,$puntuacion,$id_producto,$id_usuario));        
    }

    public function borrarComentario($id_comentario){
        $comentario = $this->getComentario($id_comentario);
        if(isset($comentaio)){
            $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id_comentario=?');
            return $comentario;
        }       
    }

}