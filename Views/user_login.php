<div class="form-control" style="margin-top: 12%; margin-bottom: 10%;">
    <!-- <h3>Đăng Nhập Tài Khoản</h3> -->
    <?php if (isset($_SESSION['info'])): ?>
        <div class="information">
            <?php echo $_SESSION['info'] ?>
        </div>
        <?php unset($_SESSION['info']); endif; ?>
    <div class="text-center" style="padding: 10px; margin-top: 0px;">
        <a href="?ctrl=user&act=login" class="log-1" style="font-size: 15pt; ">Đăng Nhập</a>
        <a href="?ctrl=user&act=register" class="log-2" style="font-size: 15pt;">Đăng Ký</a>
    </div>
    <form action="?ctrl=user&act=submitLogin" method="post">
        <input type="email" name="email" id="name" class="input-control" placeholder="Nhập email"><br>
        <input type="password" id="password" name="password" class="input-control" placeholder="Nhập password">
        <button type="submit" value="" class="btn-primary" style="margin-top: 15px;padding: 10px; margin-right: 10px "> Đăng Nhập</button>
        <a href="?ctrl=user&act=forgotpassword">Quên Mật Khẩu?</a>
    </form>
</div>