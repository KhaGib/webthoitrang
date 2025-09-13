<div class="product-section">
    <div class="container" style="margin-top: 10%; margin-bottom: 10%;">
        <!-- <h2>HÀNG MỚI</h2> -->
        <div class="row">
            <?php foreach ($productTrous as $product): ?>
                <div class="col-3 product-item">
                    <a href="?ctrl=product&act=detail"><img src="./Public/img/<?= $product['image'] ?>" alt="Áo sơ mi"></a>
                    <p><?= $product['name'] ?></p>
                    <?php if (isset($product['sale_price'])): ?>
                        <strong style="margin-bottom: 5px;">
                            <del><?= $product['price'] ?>VNĐ</del>
                            <?= $product['sale_price'] ?>
                        </strong>
                    <?php else: ?>
                        <p><?= number_format($product['price']) ?></p>
                    <?php endif; ?>
                    <a href="?ctrl=product&act=detail&id=<?= $product['id'] ?>" class="btn-primary">Mua Ngay</a>
                </div>
            <?php endforeach; ?>
            <!-- <button type="button" class="btn">Xem Tất Cả
                <i class="fa-solid fa-arrow-right"></i>
            </button> -->
        </div>
    </div>
</div>