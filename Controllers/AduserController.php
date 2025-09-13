<?php
class AduserController
{

    public function adUser()
    {
        require_once "./Models/AdUser.php";
        $userModel = new Aduser();
        $users = $userModel->getAll();
        include_once "./Views/admin/admin_user.php";
    }
    public function userLogin()
    {
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        require "./Models/AdUser.php";
        $userModel = new Aduser();
        $user = $userModel->checkEmail($email);
        if ($user && password_verify($password, $user['password']) && $user['role'] == 'admin') {
            $_SESSION['user'] = $user;
            header("Location: admin.php");
        } else {
            $_SESSION['error'] = "Sai tài khoản hoặc không phải admin!";
            header("Location: ?ctrl=aduser&act=adminLogin");
        }
        exit;
    }
    include_once "./Views/admin/admin_userlogin.php";

    }
    public function deleteUser($id)
    {
        require "./Models/AdUser.php";
        $userModel = new Aduser();
        $user = $userModel->deleteUser($id);

        $_SESSION['success'] = "Xóa user thành công";
        header("location: admin.php?ctrl=aduser&act=adUser");
        exit;
    }
    public function updateUser()
    {
        require "./Models/AdUser.php";
        $updateModel = new Aduser();
        $id = $_POST['id'] ?? null;
        if ($id == null) {
            die("K tim thay file");
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];

        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $update = $updateModel->updateUserPass($name, $email, $hashedPassword, $address, $id);
        } else {
            $update = $updateModel->updateUser($name, $email, $address, $id);
        }
        $_SESSION['success'] = "Cập nhật User thành công";
        header("location: admin.php?ctrl=aduser&act=editUser&id=" . $id);
    }
    public function editUser($id)
    {
        require "./Models/AdUser.php";
        $userModel = new Aduser();
        $users = $userModel->getById($id);
        include_once "./Views/admin/admin_editUser.php";
    }
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require "./Models/AdUser.php";
            $insertModel = new Aduser();
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $phone = $_POST['phone'] ?? null;
            $address = $_POST['address'] ?? null;
            if (empty($name) || empty($phone) || empty($address) || empty($email)) {
                $_SESSION['info'] = "Vui lòng nhập thông tin đầy đủ";
                header("location: ?ctrl=aduser&act=addUser");
                exit;
            }
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $_SESSION['info'] = "Name is required";
                header("location: ?ctrl=aduser&act=addUser");
                exit;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['info'] = "Email không đúng định dạng";
                header("location: ?ctrl=aduser&act=addUser");
                exit;
            }
            if (!preg_match('/^[0-9]{9,11}$/', $phone)) {
                $_SESSION['info'] = "Số điện thoại không hợp lệ";
                header("location: ?ctrl=aduser&act=addUser");
                exit;
            }
            $checkMail = $insertModel->checkEmail($email);
            if ($checkMail) {
                $_SESSION['info'] = "Email đã tồn tại";
                header("location: ?ctrl=aduser&act=addUser");
                exit;
            }
            $insert = $insertModel->adUser($name, $email, $hashedPassword, $phone, $address);
            $_SESSION['success'] = "Thêm user thành công";
            header("location: ?ctrl=aduser&act=adUser");
            exit;
        }
        include_once "./Views/admin/admin_aduser.php";
    }

}


?>