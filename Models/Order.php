<?php
include_once "./Models/Database.php";
class Order
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }
  public function create($user_id, $user_name, $user_phone, $user_address, $totalMoney, $payment_method = "pending", $note=null){
        $payment_method = strtolower(trim($payment_method));
        $payment_status = ($payment_method =='online') ? 'paid' : 'pending';
        return $this->db->insert("INSERT INTO orders(`user_id`,`user_name`,
        `user_phone`,`user_address`,`total_money`,`payment_method`,`payment_status`,`note`) VALUES(?,?,?,?,?,?,?,?)", 
        [$user_id, $user_name,$user_phone, $user_address, $totalMoney, $payment_method, $payment_status, $note]);
    }
    public function insertItem($order_id, $product_id, $quantity, $price){
        return $this->db->insert("INSERT INTO order_details(`order_id`,`product_id`,`quantity`,`price`)VALUES(?,?,?,?)", 
        [$order_id, $product_id, $quantity, $price]);
    }
}


?>