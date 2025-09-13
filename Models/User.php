<?php
include_once "./Models/Database.php";
class User
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }
    function login($email, $password)
    {
        // $user = $this->db->queryOne("SELECT * FROM users WHERE email='$email' AND password=MD5('$password')");
        // return isset($user)? $user : false;
        $user = $this->db->queryOne("SELECT * FROM users WHERE email=? AND password=?", $email, MD5($password));
        return isset($user) ? $user : false;
    }
    function checkMail($email)
    {
        return $this->db->queryOne("SELECT * FROM users WHERE email=?", $email);
    }
    public function register($name, $email, $password)
    {
        return $this->db->insert(
            "INSERT INTO users(`name`, `email`, `password`) VALUES (?,?,?)",
            [$name, $email, md5($password)]
        );
    }
    public function getInfo($id){
        return $this->db->queryOne("SELECT * FROM users WHERE id=?", $id);
    }
   public function changeIfo($id, $name, $phone, $address){
        return $this->db->update("UPDATE users SET name=?, phone=?, address=? WHERE id=?", [$name, $phone, $address, $id]);
   }
   public function checkPassword($id, $password){
        return $this->db->queryOne("SELECT * FROM users WHERE id=? AND password=?", $id, md5($password));
   }
   public function changePassword($id, $password){
        return $this->db->update("UPDATE users SET password=? WHERE id=?", [ md5($password), $id]);
   }
}




?>