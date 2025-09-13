<style>
    body {
        font-family: sans-serif;
    }

    .product-section {
        margin-top: 10%;
        text-align: center;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .product-item {
        width: 30%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    form {
        margin: 0 auto;
        padding: 15px;
    }

    input {
        padding: 8px;
        margin: 5px;
        width: 90%;
        outline: none;
        border-radius: 10px;
    }

    label {
        float: left;
        margin: 5px;
    }

    .text-center {
        text-align: center !important;
    }
</style>
<div class="product-section text-center" style="margin-top: 10% !important;">
    <?php if (isset($_SESSION['info'])): ?>
        <div class="information">
            <?php echo $_SESSION['info'] ?>
        </div>
        <?php unset($_SESSION['info']); endif; ?>
    <div class="container" style="margin: 0 auto;">
        <div class="row justify-content-center">
            <!-- Ảnh đại diện -->
            <div class="col-3 product-item">
                <form action="?ctrl=user&act=changeAvarta" method="post"  enctype="multipart/form-data">
                    <h3>Ảnh đại diện</h3>
                    <img src="./Public/img/<?=$user['id']?>.jpg" alt="anhne" width="50%" style="border-radius: 100px;">
                    <input type="file" name="avarta" id="">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </form>
            </div>
            <!-- Thông tin cá nhân -->
            <div class="col-3 product-item">
                <h3>Thông tin cá nhân</h3>
                <form action="?ctrl=user&act=changeInfo" method="post">
                    <label>Họ & Tên:</label>
                    <input type="text" name="name" value="<?= $user['name'] ?>">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?= $user['email'] ?>">
                    <label>Số điện thoại:</label>
                    <input type="number" name="phone" value="<?= $user['phone'] ?>">
                    <label>Địa chỉ:</label>
                    <input type="text" name="address" value="<?= $user['address'] ?>">
                    <button type="submit" class="btn-primary" style="margin-top: 15px; padding: 10px;">Lưu thông
                        tin</button>
                </form>
            </div>
            <!-- Đổi mật khẩu -->
            <div class="col-3 product-item">
                <h3>Đổi mật khẩu</h3>
                <form action="?ctrl=user&act=changePassword" method="post" style="margin-bottom: 15%;">
                    <label>Mật khẩu cũ</label>
                    <input type="password" name="old-password">
                    <label>Mật khẩu mới</label>
                    <input type="password" name="new-password">
                    <label>Xác nhận mật khẩu</label>
                    <input type="password" name="comfirm-password">
                    <button type="submit" class="btn-primary" style="margin-top: 15px; padding: 10px;">Cập nhật mật
                        khẩu</button>
                </form>
            </div>

        </div>

        <!-- Tiêu đề dưới -->
        <h2 class="mt-5" style="margin-bottom: 10%;">Cập nhật đi. Nhìn cái giề :]</h2>
    </div>
</div>

</div>