<?php
class AdorderController
{
    public function orderAd()
    {
        require "./Models/AdOrder.php";
        $orderModel = new AdOrder();
        $orders = $orderModel->getAll();
        include_once "./Views/admin/admin_order.php";
    }
    public function orderdetailAd()
    {
        include_once "./Views/admin/admin_orderdetail.php";
    }
    public function confirm()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            require "./Models/AdOrder.php";
            $updateModel = new AdOrder();
            $updates = $updateModel->updateStatus($id, 'confirmed');
            $_SESSION['success'] = "Đã xác nhận đơn hàng # $id";
        }
        header("location: ?ctrl=adorder&act=orderAd");
        exit;
        // include_once "./Views/admin/admin_order.php";
    }
    public function cancel($id)
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "kh có id don hang";
            exit;
        }
        require "./Models/AdOrder.php";
        $updateModel = new AdOrder();
        $updateModel->update($id, 'cancelled');
        $_SESSION['success'] = "Đã huỷ đơn hàng #$id";

        header("location: ?ctrl=adorder&act=orderAd");
        exit;
    }
    public function orderID(){
        require_once "./Models/AdOrder.php";
        $orderModel = new AdOrder();
        $orderID = $orderModel->orderID($id);
        include_once "./Views/admin/admin_order.php";
    }

}




?>