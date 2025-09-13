<!-- BANNER -->
<div class="container-shipping">
    <div class="col-img slider">
        <img src="./Public/img//banner.jpg" alt="" class="slide-img active">
        <img src="./Public/img//banner1.jpg" alt="" class="slide-img">
        <img src="./Public/img//banner2.jpg" alt="" class="slide-img">
        <img src="./Public/img//banner3.jpg" alt="" class="slide-img">
        <button class="but-ton" id="prev">
            <i style='font-size:20px; color: black;' class='fas'>&#xf104;</i>
        </button>
        <button class="but-ton" id="next">
            <i style='font-size:20px; color: black;' class='fas'>&#xf105;</i>
        </button>
    </div>
    <div class="controls">
        <!-- <button class="goto-btn" data-index=""></button>
            <button class="goto-btn" data-index=""></button>
            <button class="goto-btn" data-index=""></button>
            <button class="goto-btn" data-index=""></button> -->
    </div>
</div>
<div class="container-transport">
    <div class="row-transport">
        <div class="col-3-transport">
            <img src="./Public/img//xetai.jpg" alt="">
            <div class="text-box">
                <span class="title">Miễn Phí Vận Chuyển</span>
                <span class="sub">Đơn Hàng Từ 250k</span>
            </div>
        </div>
        <!-- Lặp lại 3 lần nữa -->
        <div class="col-3-transport">
            <img src="./Public/img/bantay.jpg" alt="">
            <div class="text-box">
                <span class="title">Miễn Phí Vận Chuyển</span>
                <span class="sub">Đơn Hàng Từ 250k</span>
            </div>
        </div>

        <div class="col-3-transport">
            <img src="./Public/img/thanhtoan.jpg" alt="">
            <div class="text-box">
                <span class="title">Miễn Phí Vận Chuyển</span>
                <span class="sub">Đơn Hàng Từ 250k</span>
            </div>
        </div>

        <div class="col-3-transport">
            <img src="./Public/img/dienthoai.jpg" alt="">
            <div class="text-box">
                <span class="title">Miễn Phí Vận Chuyển</span>
                <span class="sub">Đơn Hàng Từ 250k</span>
            </div>
        </div>
    </div>
</div>

<!-- SẢN PHẨM MỚI -->
<div class="product-section">
    <div class="container">
        <!-- <h2>HÀNG MỚI</h2> -->
        <div class="row">
            <?php foreach ($productList as $product): ?>
                <div class="col-3 product-item">
                    <a href="?ctrl=product&act=detail"><img src="./Public/img/<?= $product['image'] ?>" alt="Áo sơ mi"></a>
                    <p><?= $product['name'] ?></p>
                    <?php if (isset($product['sale_price'])): ?>
                        <strong style="margin-bottom: 5px;">
                            <del><?= $product['price'] ?>VNĐ</del>
                            <?= $product['sale_price'] . "<u>VNĐ</u>" ?>
                        </strong>
                    <?php else: ?>
                        <strong style="margin-bottom: 5px;"><?= number_format($product['price']) . "<u>VNĐ</u>" ?></strong>
                    <?php endif; ?>
                   <a href="?ctrl=product&act=detail&id=<?= $product['id'] ?>" class="click">Mua Ngay</a></button>
                </div>
            <?php endforeach; ?>
            <button type="button" class="btn-view">Xem Tất Cả
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
        <div class="view-img">
            <img src="./Public/img/banner-view.jpg" alt="">
        </div>
        <div class="row">
            <?php foreach ($productTs as $product): ?>
                <div class="col-3 product-item">
                    <a href="?ctrl=product&act=detail"><img src="./Public/img/<?= $product['image'] ?>" alt="Áo sơ mi"></a>
                    <p><?= $product['name'] ?></p>
                    <strong style="margin-bottom: 5px;"><?= number_format($product['price']) . "<u>VNĐ</u>" ?></strong>
                    <a href="?ctrl=product&act=detail&id=<?= $product['id'] ?>" class="click">Mua Ngay</a>
                </div>
            <?php endforeach; ?>
            <button type="button" class="btn-view">Xem Tất Cả
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
        <div class="row">
            <?php foreach ($productLimit as $product): ?>
                <div class="col-3 product-item">
                    <img src="./Public/img/<?= $product['image'] ?>" alt="Tank top">
                    <p><?= $product['name'] ?></p>
                    <strong style="margin-bottom: 5px;"><?= number_format($product['price']) . "<u>VNĐ</u>" ?></strong>
                    <a href="?ctrl=product&act=detail&id=<?= $product['id'] ?>" class="click">Mua Ngay</a>
                </div>
            <?php endforeach; ?>
            <button type="button" class="btn-view">Xem Tất Cả
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
        <h2 style="text-align: center;">Bộ Sưu Tập Chính Hãng Từ Marvel & Disney</h2>
        <div class="banner-img">
            <div class="view">
                <img src="./Public/img/banner-view1.jpg" alt="">
            </div>
            <div class="view">
                <img src="./Public/img/banner-view2.jpg" alt="">
            </div>
            <div class="view">
                <img src="./Public/img/banner-view3.jpg" alt="">
            </div>
            <div class="view">
                <img src="./Public/img/banner-view3.jpg" alt="">
            </div>
        </div>
        <div class="btn-views">
            <button type="button" class="btn-view">Xem Thêm <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>
</div>
</div>