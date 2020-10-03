<?php

class ContactoModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tareas;charset=utf8', 'root', '');
        
    }
}
