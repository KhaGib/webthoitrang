<?php
session_start();
// 👉 Bật hiển thị lỗi để debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 👉 Giả lập user có quyền admin (nếu chưa login)
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = ['role' => 'admin']; // Xóa sau khi xong
}

// 👉 Bảo vệ quyền admin
if ($_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php?ctrl=user&act=login");
    exit;
}

// 👉 Layout admin riêng
include_once "./Views/admin/admin_header.php";

// 👉 Điều hướng controller
if (isset($_GET['ctrl']) && isset($_GET['act'])) {
    $ctrlName = ucfirst($_GET['ctrl']) . "Controller";
    $actName = $_GET['act'];

    $ctrlPath = "./Controllers/$ctrlName.php";
    if (file_exists($ctrlPath)) {
        include_once $ctrlPath;
        $ctrl = new $ctrlName();

        $args = array_splice($_GET, 2);
        if (method_exists($ctrl, $actName)) {
            $ctrl->$actName(...$args);
        } else {
            echo "Không tìm thấy action: <b>$actName</b>";
        }
    } else {
        echo "Không tìm thấy controller: <b>$ctrlName</b>";
    }
} else {
    // 👉 Trang mặc định admin
    include_once "./Controllers/AdminController.php";
    $ctrl = new AdminController();
    $ctrl->adhome();
}

// 👉 Layout admin footer
include_once "./Views/admin/admin_footer.php";
