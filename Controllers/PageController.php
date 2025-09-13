<?php
//quản lý các trang không liên quan
//vd: trang chủ, trang liên hệ, trang giới thiệu
class PageController
{
    function home()
    { // 1.xử lý dữ liệu. 2.gọi đến model để xử lý 3.gọi đến view hiển thị dữ li
        include_once "./Models/Product.php";
        $productModel = new Product();

        $productList = $productModel->getNew();
        $productTs = $productModel->getNewJT();
        $productLimit = $productModel->getLimit();
        print_r($productList);
        include_once "./Views/page_home.php";
        include_once "./Views/layout_footer.php";
    }
    function contact()
    {
        include_once "./Views/page_contact.php";
    }
    function about()
    {
        include_once "./Views/page_about.php";
    }
    //lỗi tìm 1 sp mà nó show hết
function search($keyword) {
    include_once "./Models/Product.php";
    $productModel = new Product();

    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

    $productSearch = $productModel->showSearch($keyword);

    include_once "./Views/product_search.php";
}

}







?>