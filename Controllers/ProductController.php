<?php
// quản lý các trang liên quan đến sp
//vd: ds sp, , chi tiết sp, tìm kiếm sản phẩm
class ProductController{
    function list($keyword = "", $sort= null, $category_id = null){
        include_once "./Models/Product.php";
        $productModel = new Product();
        $productList = $productModel->getAll($keyword, $sort, $category_id);
        include_once "./Models/Category.php";
        $categoryModel = new Category();
        $categoryList = $categoryModel->getAll();
        include_once "./Views/product_list.php";
        include_once "./Views/layout_footer.php";
    }
    function tshirt(){
        include_once "./Models/Product.php";
        $productModel = new Product();
        $productTshirt = $productModel->getTshirt();
        include_once "./Views/product_tshirt.php";
        include_once "./Views/layout_footer.php";
    }
    function trous(){
        include_once "./Models/product.php";
        $productModel = new Product();
        $productTrous = $productModel->getTrous();
        include_once "./Views/product_trous.php";
        include_once "./Views/layout_footer.php";
    }
    function detail($id){
        // echo $id;
        include_once "./Models/Product.php";
        $productModel = new Product();
        
        $product = $productModel->getById($id);
        // $productList = $product->getById($id);
        // print_r($product['name']);
        include_once "./Views/product_detail.php";
    }
    function search(){
        include_once "./Views/product_search.php";
    }
 
}



?>