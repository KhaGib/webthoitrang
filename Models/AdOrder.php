<?php
require "./Models/Database.php";
class AdOrder{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getAll(){
        return $this->db->query("SELECT * FROM orders");
    }
    public function updateStatus ($id, $status){
        $sql = "UPDATE orders SET status= ? WHERE id= ?";
        return $this->db->update($sql, [$status, $id]);
    }
    public function update($id, $status){
    $sql = "UPDATE orders SET payment_status= ? WHERE id= ?";
    return $this->db->update($sql, [$status, $id]);
}
public function orderID($id)  {
    return $this->db->query("SELECT * FROM order_details WHERE id=?" ,$id);
}

}











?>