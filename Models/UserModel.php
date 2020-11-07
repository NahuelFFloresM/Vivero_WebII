<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vivero;charset=utf8', 'root', '');
    }
    
	public function getUsers(){
        $sentencia = $this->db->prepare("SELECT * FROM usuario");
        $sentencia->execute();
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $users;
    }

    public function getUserById($id){
        $sentencia = $this->db->prepare("SELECT id_usuario,nombre_usuario,email_usuario,permisos FROM usuario WHERE id_usuario = ?");
        $sentencia->execute([$id]);
        $user = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }

    public function editUserById($nombre,$email,$permiso,$id){
        $sentencia = $this->db->prepare('UPDATE usuario
        SET nombre_usuario = ?,email_usuario=?,permisos=?
        WHERE id_usuario=?;');
        return $sentencia->execute([$nombre,$email,$permiso,$id]);
    }
}