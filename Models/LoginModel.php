<?php

class LoginModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vivero;charset=utf8', 'root', '');
    }

    public function getUserbyMail($useremail){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email_usuario=:email");
        $sentencia->bindParam(":email", $useremail);
        $sentencia->execute();
        $productos = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $productos;
    }
}

?>