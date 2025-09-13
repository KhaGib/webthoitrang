<?php
include_once "./Models/Database.php";
class Category{
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    function getAll(){
         $result = $this->db->query("SELECT * FROM categories");
         return $result;
    }
}







?>