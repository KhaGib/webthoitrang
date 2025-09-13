<style>
    .custom-form {
        margin-top: 7%;
        display: flex;
        width: 50%;
        /* margin-left: 100px; */
        margin-left: 140px;
        /* padding: 20px;
        background-color: #f8f9fa;
        width: 80%;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-left: 30px; */
    }

    .custom-input {
        width: 150%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-right: 10px;
    }

    .custom-select {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #aaa;
        border-radius: 5px;
        font-size: 16px;
        background-color: #fff;
        appearance: none;
        margin-right: 10px;

        /* bỏ style mặc định hệ điều hành */
    }

    .btn-color {
        width: 30%;
        height: 40px;
        border-radius: 10px;
        color: white;
        background-color: navy;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-color:active {
        box-shadow: 4px 4px 12px #1d0372, -4px -4px 12px #27058d;
        border: 3px solid rgb(6, 6, 130);
        /* viền xanh đậm khi bấm */
        transform: scale(0.97);
        /* hơi co lại khi bấm */
        /* box-shadow: none; */
    }
</style>
<form action="" method="GET" class="custom-form">
    <input type="hidden" name="ctrl" value="product">
    <input type="hidden" name="act" value="list">
    <input type="search" name="keyword" class="custom-input" placeholder="Tìm kiếm sản phẩm..." value="<?= $keyword ?>">
    <select class="custom-select" name="sort">
        <option value="null">Mặc định</option>
        <option <?= $sort == 'price-asc' ? 'selected' : '' ?> value="price-asc">Giá thấp đến cao</option>
        <option <?= $sort == 'price-desc' ? 'selected' : '' ?> value="price-desc">Giá cao đến thấp</option>
        <option <?= $sort == 'name-asc' ? 'selected' : '' ?> value="name-asc">Tên A-Z</option>
        <option <?= $sort == 'name-desc' ? 'selected' : '' ?> value="name-desc">Tên Z-A</option>
    </select>
    <select class="custom-select" name="category_id">
        <option value="all">Tất cả danh mục</option>
        <?php foreach ($categoryList as $cate): ?>
            <option <?= $category_id == $cate['id'] ? 'selected' : '' ?> value="<?= $cate['id'] ?>"><?= $cate['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn-color">LỌC</button>
</form>
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