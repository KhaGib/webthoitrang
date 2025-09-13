<div class="container-intro" style="margin-top: 5%">
    <?php if (isset($_SESSION['info'])): ?>
        <div class="information">
            <?php echo $_SESSION['info'] ?>
        </div>
        <?php unset($_SESSION['info']); endif; ?>
    <div class="product-detail">
        <div class="product-images">
            <div class="thumbnails">
                <img src="./Public/img/<?= $product['image'] ?>" alt="">
                <img src="./Public/img/<?= $product['image'] ?>" alt="">
                <img src="./Public/imgs/<?= $product['image'] ?>" alt="">
                <img src="./Public/img/<?= $product['image'] ?>" alt="">
                <img src="./Public/img/<?= $product['image'] ?>" alt="">
            </div>
            <div class="main-image">
                <img src="./Public/img/<?= $product['image'] ?>" alt="">
            </div>
        </div>
        <div class="product-info">
            <h1><?= $product['name'] ?></h1>
            <span><?= $product['description'] ?></span>
            <?php if ($product['sale_price']): ?>
                <p style="color: navy; font-weight: bold;">
                    <del style="color:rgb(208, 201, 201)"><?= number_format($product['sale_price']) . "đ" ?></del>
                    <?= number_format($product['price']) . "đ" ?>
                </p>
            <?php else: ?>
                <p class="price"><?= number_format($product['price']) . "đ" ?></p>
            <?php endif; ?>
            <div class="promotions">
                <h3>🎁 Khuyến mãi - Ưu đãi</h3>
                <ul>
                    <li>Nhập mã JUN10 GIẢM 10% tối đa 10K</li>
                    <li>Nhập mã JUN30 GIẢM 30K cho đơn từ 599k</li>
                    <li>Freeship đơn từ 399K</li>
                </ul>
            </div>
            <p>Màu sắc:<b>Trắng</b></p>
            <img src="./Public/img/ao1.jpg" alt="" width="30px" height="30px"
                style="border-radius: 30px; border: 1px black solid; padding: 5px;">
            <p>Kích thước: <b>M</b></p>
            <button type="button" class="btn-detail">S</button>
            <button type="button" class="btn-detail">M</button>
            <button type="button" class="btn-detail">L</button>
            <button type="button" class="btn-detail">XL</button>
            <div class="product-actions">
                <div class="quantity-control">
                    <button class="btn-minus">−</button>
                    <span class="quantity">1</span>
                    <button class="btn-plus">+</button>
                </div>
                <button class="add-to-cart">THÊM VÀO GIỎ</button>
            </div>
            <form action="?ctrl=cart&act=add&id=<?=$product['id'];?>" method="post">
                <button type="submit" class="add-order">MUA NGAY</button>
            </form>
        </div>
    </div>
</div>