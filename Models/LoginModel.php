<?php

class LoginModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vivero;charset=utf8', 'root', '');
    }

    public function getUserbyMail($useremail){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email_usuario=?");
        $sentencia->execute([$useremail]);
        $user = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }

    public function registrarUser($nombre,$email,$password){
        $sentencia = $this->db->prepare("INSERT INTO usuario(nombre_usuario,email_usuario,contrasenia_usuario,permisos) VALUES(?,?,?,?)");
        $sentencia->execute([$nombre,$email,$password,0]);
        $user = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }
}

?>