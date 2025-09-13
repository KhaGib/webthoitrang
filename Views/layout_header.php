<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thời Trang Nam</title>
    <link rel="icon" href="./Public/img/icon.jpg" type="image/x-icon" style="border-radius: 20px">
    <link rel="stylesheet" href="/WEBP/Public/css/style.css">
    <link rel="stylesheet" href="/WEBP/Public/css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap 5 CDN -->
</head>

<body>
    <div class="fixed-header">
        <div class="header-wrapper">
            <div class="top-bar">
                <div class="slider-wrapper">
                    <div id="text-slider">
                        Ra mắt STITCH COLLECTION - BETTER TOGETHER •
                        VOUCHER 10% TỐI ĐA 10K •
                        VOUCHER 30K ĐƠN TỪ 599K •
                        VOUCHER 70K ĐƠN TỪ 899K •
                        VOUCHER 100K ĐƠN TỪ 1199K •
                        🚛 FREESHIP ĐƠN TỪ 250K •
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="row header-row">
                    <div class="col logo">
                        <!-- <span>ICON<span class="bold">DENIM</span></span> -->
                        <a href="?ctrl=page&act=home"><img src="./Public/img/logo.jpg" alt="" width="160px"
                                height="40px"></a>
                    </div>
                    <div class="col menu">
                        <ul>
                            <li><a href="?ctrl=product&act=list">Sản phẩm</a></li>
                            <li><a href="#" class="new">Hàng Mới</a></li>
                            <li><a href="?ctrl=product&act=tshirt">Áo Nam</a></li>
                            <li><a href="?ctrl=product&act=trous">Quần Nam</a></li>
                            <li><a href="#">DENIM</a></li>
                            <li><a href="#">TechUrban</a></li>
                            <li><a href="#" class="sale">OUTLET -50%</a></li>
                        </ul>
                    </div>
                    <div class="col icons">
                        <?php if (!isset($_SESSION['user'])): ?>
                            <form action="?ctrl=page&act=search" class="search-container" method="GET">
                                <input type="hidden" name="ctrl" value="page">
                                <input type="hidden" name="act" value="search">

                                <input type="text" name="keyword" id="search-input" class="input-control"
                                    placeholder="Search">

                                <!-- Đây là button thật sự -->
                                <button type="submit" id="search-icon">🔍</button>
                            </form>
                            <a class="" href="?ctrl=user&act=login">👤</a>
                            <a
                                href="?ctrl=cart&act=list">🛒<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></a>
                        <?php else: ?>
                            <!-- <div class="col icons"> -->
                            <a style="text-decoration: none; font-size: 13pt;"
                                href="?ctrl=user&act=profile"><?= $_SESSION['user']['name'] ?></a>
                            <button type="button"
                                style="border: 0.5px blue solid; border-radius: 5px; padding: 5px 5px; background: none;"><a
                                    style="width: 20px; text-decoration: none; 
                             color: blue; font-size: 12pt" href="?ctrl=user&act=logout">Đăng Xuất</a></button>
                            <a
                                href="?ctrl=cart&act=list">🛒<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>