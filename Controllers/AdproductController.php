<?php

class AdproductController
{
    public function productAd()
    {
        include_once './Models/AdProduct.php';
        $productModel = new AdProduct();
        $products = $productModel->getAll(); // hàm này bạn phải có
        include_once "./Views/admin/admin_product.php";
    }
    public function deleteProduct($id)
    {
        if (isset($id) && is_numeric($id)) {
            require_once "./Models/AdProduct.php";
            $productModel = new AdProduct();
            $product = $productModel->delete($id);
            header("Location: admin.php?ctrl=adproduct&act=productAd");
            exit;
            // include_once "./Views/admin/admin_product.php";
        }
    }
    public function editproductForm($id)
    {
        require_once "./Models/AdProduct.php";
        $editModel = new AdProduct();
        $edit = $editModel->getProductId($id);
        include_once "./Views/admin/admin_edit.php";
    }
    public function updateProduct()
    {
        require "./Models/AdProduct.php";
        $updateModel = new AdProduct();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $sale_price = $_POST['sale_price'];
        $image = $_POST['old_image'];
        $description = $_POST['description'];
        if (!empty($_FILES['image']['name'])) {
            $image = basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], "./Public/img/" . $image);
        }
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = basename($_FILES['image']['name']);
            $targetDir = "./Public/img/";

            // Tạo thư mục nếu chưa tồn tại
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $image);
        }
        $update = $updateModel->updateProduct($name, $price, $sale_price, $image, $description, $id);
        if ($update) {
            $_SESSION['success'] = "Cập nhật thành công";
        } else {
            $_SESSION['error'] = "Lỗi khi cập nhật";
        }
        header("location: admin.php?ctrl=adproduct&act=productAd");
        exit;
    }
    public function addProduct()
    {
        require "./Models/Category.php";
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        require "./Models/AdProduct.php";
        $addproductModel = new AdProduct();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? null;
            $price = $_POST['price'] ?? null;
            $sale_price = $_POST['sale_price'] ?? null;
            $description = $_POST['description'] ?? null;
            $category_id = $_POST['category_id'] ?? null;
            if(empty($name) || empty($price) || empty($category_id) || empty($description)){
                $_SESSION['info'] = "Vui lòng nhập thông tin đầy đủ";
                header("location: ?ctrl=adproduct&act=addProduct");
                exit;
            }
            if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                $fileName = $_FILES['file']['name'];
                $tmpName = $_FILES['file']['tmp_name'];
                $uploadPath = "./Public/img/uploads/";
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                move_uploaded_file($tmpName, $uploadPath . $fileName);
            } else {
                $fileName = null;
            }
            $addProduct = $addproductModel->Insert($name, $price, $sale_price, $fileName, $description, $category_id);
            $_SESSION['success'] = "Thêm sản phẩm thành công";
            header('location: ?ctrl=adproduct&act=productAd');
            exit;
        }
        $GLOBALS['categories'] = $categories;
        include_once "./Views/admin/admin_addproduct.php";

    }
}






?>