<?php

class HomeModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tareas;charset=utf8', 'root', '');
    }
    /*
	public function GetTareas(){
        $sentencia = $this->db->prepare( "select * from tarea");
        $sentencia->execute();
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $tareas;
    }
    
    public function GetTarea($id){
        $sentencia = $this->db->prepare( "select * from tarea where id = ?");
        $sentencia->execute([$id]);
        $tarea = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $tarea;
    }

    public function InsertarTarea($titulo,$descripcion,$prioridad, $finalizada, $imagen = null) {

        $filepath = null;
        if ($imagen)
            $filepath = $this->moveFile($imagen);


        $sentencia = $this->db->prepare("INSERT INTO tarea(titulo, descripcion,prioridad,finalizada, imagen_url) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($titulo,$descripcion,$prioridad, $finalizada, $filepath));

        return $this->db->lastInsertId();
    }

    //  mueve la imagen y retorna la ubicación}
    private function moveFile($imagen) {
        $filepath = "img/task/" . uniqid() . "." . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($imagen['tmp_name'], $filepath);
        return $filepath;
    }

    public function FinalizarTarea($id){
        $sentencia =  $this->db->prepare("UPDATE tarea SET finalizada=1 WHERE id=?");
        $sentencia->execute(array($id));
    }

    public function ActualizarTarea($id, $titulo, $descripcion, $prioridad){
        $sentencia =  $this->db->prepare("UPDATE tarea SET titulo=?, descripcion=?, prioridad=? WHERE id=?");
        $sentencia->execute(array($titulo, $descripcion, $prioridad, $id));
    }

    public function BorrarTarea($id){
        $sentencia = $this->db->prepare("DELETE FROM tarea WHERE id=?");
        $sentencia->execute(array($id));
    }*/
}

?>