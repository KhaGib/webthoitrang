<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 12%;">
        <div class="grid">
            <div class="col-sm-6">
                <?php if (isset($_SESSION['info'])): ?>
                    <div class="information">
                        <?php echo $_SESSION['info'] ?>
                    </div>
                    <?php unset($_SESSION['info']); endif; ?>
                <h4 style="text-align: center; color: rgb(28, 28, 201); font-weight: bold;">Sản phẩm trong giỏ hàng</h4>
                <table class="table-form">
                    <tr class="">
                        <th>Sản Phẩm</th>
                        <th></th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                    </tr>
                    <?php foreach ($cart as $it): ?>
                        <tr>
                            <td><?= $it["name"] ?></td>
                            <td></td>
                            <td>
                                <?php if (isset($it['sale_price'])): ?>
                                    <?= number_format($it['sale_price']) ?>đ
                                    <del><?= number_format($it['price']) ?>đ</del>
                                <?php else: ?>
                                    <?= number_format($it['sale_price']) ?>đ

                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="quantity-box">
                                    <?= $it['quantity'] ?>
                                </div>
                            </td>
                            <td>
                                <?= number_format($it['total']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4">Tổng tiền:</td>
                        <td><?= number_format($totalMoney) . "đ" ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <form action="?ctrl=cart&act=payment" method="post">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="input-control" name="user_name"
                        value="<?= isset($_SESSION['user']) ? $_SESSION['user']['name'] : '' ?>">
                         <label for="exampleInputPassword1" class="form-label">Số Điện Thoại</label>
                    <input type="number" class="input-control" name="user_phone"
                        value="<?= isset($_SESSION['user']) ? $_SESSION['user']['phone'] : '' ?>">
                    <label for="exampleInputEmail1" class="form-label">Địa Chỉ Giao Hàng</label>
                    <input type="text" class="input-control" name="user_address"
                        value="<?= isset($_SESSION['user']) ? $_SESSION['user']['address'] : '' ?>">
                                       <label for="exampleInputPassword1" class="form-label">Phương Thức Thanh Toán</label>

                    <select class="form-select" name="payment_method" aria-label="Default select example" style="padding: 8px; border-radius: 5px; border: none; border: 1px solid rgb(219, 209, 209);
                        width: 100%;">
                        <option value="COD">Thanh Toán Khi Nhận Hàng</option>
                        <option value="online">Thanh toán trực tuyến (thẻ QR)</option>
                        <option value="3">Ngân Hàng</option>
                    </select>
                    <label for="">Ghi Chú Đơn Hàng:</label><br>
                    <textarea name="note" id=""></textarea><br>
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>