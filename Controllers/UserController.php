<?php
//quản lý các trang liên quan tài khoản người dùng
//vd: đaăn ký, đăng nhập, đăng xuất, quên  mk..
class UserController
{
    function profile(){
        include_once "./Models/User.php";
        $userModel = new User();
        $user = $userModel->getInfo($_SESSION['user']['id']);
        include_once "./Views/user_profile.php";
        include_once "./Views/layout_footer.php";
    }
    function changeInfo(){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        include_once "./Models/User.php";
        $userModel = new User();
        $kq = $userModel->changeIfo($_SESSION['user']['id'], $name, $phone, $address);
        if($kq){
            $_SESSION['info'] = "Thông tin đã được cập nhật";
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['phone'] = $phone;
            $_SESSION['user']['address'] = $address;
        }else{
            $_SESSION['info'] = "Có lỗi xảy ra khi cập nhật thông tin vui lòng thử lại sao";
        }
        header("location: ?ctrl=user&act=profile");
    }
    function changeAvarta(){
        if($_FILES['avarta']['error'] == 0){
            $kq = move_uploaded_file($_FILES['avarta']['tmp_name'], "Public/img/".$_SESSION['user']['id'].".jpg");
            if($kq){
                $_SESSION['info'] = "Đã cập nhật avarta thành công";
            }else{
                $_SESSION['info'] = "Có lỗi khi chuyển trang";
            }
        }
        header('location: ?ctrl=user&act=profile');
    }
    function changePassword(){
        $old_password = $_POST['old-password'];
        $new_password = $_POST['new-password'];
        $confirm_password = $_POST['comfirm-password'];
        //kt mk cũ có khớp không
        include_once "./Models/User.php";
        $userModel = new User();
        $check = $userModel->checkPassword($_SESSION['user']['id'], $old_password);
        if(!$check){
            $_SESSION['info'] = "Mật khẩu hiện tại không đúng. Không thể đổi mật khẩu";
            header("location: ?ctrl=user&act=profile");
            return;
        }
        //kt mk moi nhap 2 lan có khớp không
        if($new_password != $confirm_password){
            $_SESSION['info'] = "Mật khẩu mới và mk nhập lại không trùng khớp";
            header("location: ?ctrl=user&act=profile");
            return;
        }
        //cập nhật mk
        $kq = $userModel->changePassword($_SESSION['user']['id'], $new_password);
            if($kq){
                $_SESSION['info'] = "Mật khẩu đã được thay đổi";
            }else{
                $_SESSION['info'] = "Có lỗi xảy ra khi đổi mật khẩu. Vui lòng nhập lại";
            }
        header("location: ?ctrl=user&act=profile");
    }
    function register(){
        include_once "./Views/user_register.php";
        include_once "./Views/layout_footer.php";
    }
    function submitRegister(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];
        if($password !== $rePassword){
            $_SESSION['info'] = "Mật khẩu không khớp. Vui lòng nhập lại!";
            header('location: ?ctrl=user&act=register');
            return;
        }
        include_once "./Models/User.php";
        $userModel = new User();
        $user= $userModel->checkMail($email);
        // print_r($user);
        if($user){
            $_SESSION['info'] = "Email đã tồn tại. Vui lòng đăng nhập";
            header('location: ?ctrl=user&act=register');
            return;
        }
        $result = $userModel->register($name, $email, $password);
        if($result){
            $_SESSION['info'] = "Đăng ký thành công. Vui lòng đăng nhập nhé!";
            header('location: ?ctrl=user&act=login');
            return;
        }else{
            $_SESSION['info'] = "Xảy ra lỗi trong quá trình đăng ký";
            header('location: ?ctrl=user&act=register');
            return;
        }

    }
    function logout(){
        unset($_SESSION['user']);
        header('location: ?ctrl=user&act=login');
    }
     function login(){
        include_once "./Views/user_login.php";
        include_once "./Views/layout_footer.php";

    }
    function submitLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        include_once "./Models/User.php";
        $userModel = new User();
        $user = $userModel->login($email, $password);
        // print_r($user);
        if ($user) {
            // echo "Đăng Nhập Thành Công";
            $_SESSION['user'] = $user;
            header('location: ?ctrl=page&act=home');
        } else {
            // echo "Đăng Nhập Thất Bại!";
            $_SESSION['info'] = "Email or Password không đúng!";
            header('location: ?ctrl=user&act=login');
        }
        // if($email == 'khahoang@gmail.com' && $password == "11111"){
        //     header("location: admin.php");
        // }else{
        //     $_SESSION['info'] = 'Email hoặc Password Ad Không đúng';
        //     header("location: admin.php");
        // }

    }
    
    function forgotPassword()
    {
        include_once "./Views/user_forgot_password.php";
    }
    
}