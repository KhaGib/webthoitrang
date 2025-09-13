<?php
require_once "./Models/Database.php";
class AdProduct{
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    public function getAll() {
    return $this->db->query("SELECT * FROM products ORDER BY id DESC");
    }
    public function delete($id){
        return $this->db->execute("DELETE FROM products WHERE id = ?", [$id]);
    }
    public function getProductId($id){
        return $this->db->query("SELECT * FROM products WHERE id=?", $id);
    }
    public function updateProduct($name, $price, $sale_price, $image, $description, $id){
        $sql = "UPDATE products SET name=?, price=?, sale_price=? image=?, description=? WHERE id=?";
         return $this->db->update($sql, [$name, $price, $sale_price, $image, $description, $id]);
    }
    public function Insert($name, $price, $sale_price, $image, $description, $category_id){
        $sql = "INSERT INTO products(name, price, sale_price, image, description, category_id) VALUES(?,?,?,?,?,?)";
        return $this->db->insert($sql, [$name, $price, $sale_price, $image, $description, $category_id]);
    } 

}



?>