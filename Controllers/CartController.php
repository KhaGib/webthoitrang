<?php
// xử lý trang giò hàng
class CartController{
    function list(){
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $cart = $_SESSION['cart'];
        include_once "./Models/Product.php";
        $productModel = new Product();
        $totalMoney = 0;
        foreach ($cart as &$item) {
            $info = $productModel->getById($item['id']);
            $item['name'] = $info['name'];
            $item['price'] = $info['price'];
            $item['image'] = $info['image'];
            $item['sale_price'] = $info['sale_price'];
            $item['total'] = $item['quantity'] * (isset($item['sale_price']) ? $item['sale_price'] : $item['price']);
            $totalMoney += $item['total'];
        }
        $_SESSION['cart'] = $cart;
        $_SESSION['total_money'] = $totalMoney;
        include_once "./Views/cart_list.php";
        include_once "./Views/layout_footer.php";

    }
    function checkout(){
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $totalMoney = isset($_SESSION['total_money']) ? $_SESSION['total_money'] : 0;

    include_once "./Views/cart_checkout.php";
    }
    function add($id){
        // có giỏ hàng chưa? chưa có tạo 
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        //đã có giỏ hàng - thêm vào giò hàng
        //th1: sp đã có trong giỏ hàng -> tăng sl sp
        $inCart = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantity']++;
                $inCart = true;
                break;
            }
        }
        //th2: sp chưa có trong giò hàng-> thêm vào giỏ hàng vs sl = 1
        if (!$inCart) {
            array_push($_SESSION['cart'], [
                "id" => $id,
                "quantity" => 1,
            ]);
        }

        $_SESSION['info'] = "Đã thêm sản phẩm vào giỏ hàng";
        header("location: ?ctrl=product&act=detail&id=$id");
    }
    function decrease($id){
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantity']--;
                $item['quantity'] = max(1, $item['quantity']);
                break;
            }
        }
        header('location: ?ctrl=cart&act=list');
    }
    function increase($id){
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantity']++;
                break;
            }
        }
        header('location: ?ctrl=cart&act=list');
    }
    function remove($id){
        foreach($_SESSION['cart'] as $index=>&$item){
            if($item['id'] == $id){
                array_splice($_SESSION['cart'], $index, 1);
                break;
            }
        }
        header('location: ?ctrl=cart&act=list');
    }
    function payment(){
        // $user_id =  isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
         if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
        $_SESSION['info'] = "Bạn cần đăng nhập trước khi thanh toán";
        header('location: ?ctrl=user&act=login');
        exit();
    }
        $user_id =  $_SESSION['user']['id'];
//         echo '<pre>';
// var_dump($user_id);
// die();

        $user_name = $_POST['user_name'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
        $payment_method =  strtoupper($_POST['payment_method']);
        // var_dump($_POST['payment_method']); exit;
        $totalMoney = $_SESSION['total_money'];
        $note = $_POST['note'];
        include_once "./Models/Order.php";
        $orderModel = new Order();
        $order_id = $orderModel->create($user_id, $user_name, 
        $user_address, $user_phone, $totalMoney, $payment_method, $note);
        $cart = $_SESSION['cart'];
        foreach($cart as $item){
            $orderModel->insertItem($order_id, $item['id'], 
            $item['quantity'], min($item['price'], $item['sale_price']));
        }
        // var_dump($_SESSION);
        // var_dump($order_id);
        $_SESSION['info'] = "Đơn hàng của bạn có mã là #" . $order_id;
        unset($_SESSION['cart']);
        header('location: ?ctrl=cart&act=done');

    }
    function done(){
        include_once "./Views/cart_done.php";
    }
}






?>