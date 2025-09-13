<div class="cart" style="margin-top: 5%">
    <h2>Giỏ hàng của bạn</h2>
    <?php if (isset($_SESSION['info'])): ?>
        <div class="information">
            <?php echo $_SESSION['info'] ?>
        </div>
        <?php unset($_SESSION['info']); endif; ?>
    <div class="cart-content">
        <!-- Cột trái -->
        <div class="cart-left">
            <table class="table-form">
                <tr>
                    <th>Sản phẩm</th>
                    <th></th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                    <th>Xóa</th>
                </tr>
                
                <?php foreach ($cart as $it): ?>
                    <tr>
                        <td><?= $it["name"] ?></td>
                        <td><img src="./Public/img/<?= $it['image'] ?>" alt=""></td>
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
                                <a style="text-decoration: none;" href="?ctrl=cart&act=decrease&id=<?= $it['id'] ?>">-</a>
                                <?= $it['quantity'] ?>
                                <a style="text-decoration: none;" href="?ctrl=cart&act=increase&id=<?= $it['id'] ?>">+</a>
                            </div>
                        </td>
                        <td>
                            <?= number_format($it['total']) ?>
                        </td>
                        <!-- <td>2,500,000₫</td> -->
                        <td><a href="?ctrl=cart&act=remove&id=<?= $it["id"] ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                <i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="note">
                <label for="order-note">Ghi chú đơn hàng</label>
                <textarea id="order-note" placeholder="Nhập ghi chú..."></textarea>
            </div>
            <div class="invoice">
                <input type="checkbox" id="export-invoice">
                <label for="export-invoice">Xuất hoá đơn cho đơn hàng</label>
            </div>
        </div>

        <!-- Cột phải -->
        <div class="cart-right">
            <h3>Thông tin đơn hàng</h3>
            <p><strong>Thời gian giao hàng:</strong></p>
            <div>
                <label><input type="radio" name="delivery-time" checked> Giao khi có hàng</label><br>
                <label><input type="radio" name="delivery-time"> Chọn thời gian</label>
            </div>
            <p class="total">Tổng tiền: <strong><?= number_format($totalMoney) . "đ" ?></strong></p>
            <a class="checkout-btn" href="?ctrl=cart&act=checkout" style="text-decoration: none; color:white;">Thanh
                Toán</a>
        </div>
    </div>
</div>