<?php
require "./Models/Database.php";
// require "./Models/AdProduct.php";
class Aduser {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getAll(){
        return $this->db->query("SELECT * FROM users");
    }
    public function deleteUser($id){
        return $this->db->query("DELETE FROM users WHERE id= ?", $id);
    }
    public function checkEmail($email){
        return $this->db->queryOne("SELECT * FROM users WHERE email=?", $email);
    }
    public function getById($id){
        return $this->db->query("SELECT * FROM users WHERE id=?", $id);
    }
    public function updateUserPass($name, $email, $password, $address, $id){
        $sql = "UPDATE users SET name=?, email=?, password=?,  address=? WHERE id=?";
        return $this->db->update($sql, [$name, $email, $password, $address, $id]);
    }
    public function updateUser($name, $email, $address, $id){
        $sql = "UPDATE user SET name=?, email=?, address=? WHERE id=?";
        return $this->db->update($sql, [$name, $email, $address, $id]);
    }
    public function adUser($name, $email, $hashedPassword, $phone, $address){
        $sql = "INSERT INTO users(name, email, password, phone, address) VALUES(?,?,?,?,?)";
        return $this->db->insert($sql, [$name, $email, $hashedPassword, $phone, $address]);
    }
}



?>