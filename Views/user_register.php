<div class="form-control" style="margin-top: 10%;">
    <?php if (isset($_SESSION['info'])): ?>
        <div class="information">
            <?php echo $_SESSION['info'] ?>
        </div>
        <?php unset($_SESSION['info']); endif; ?>
    <div class="text-center">
        <a href="?ctrl=user&act=login" class="log-1" style="font-size: 15pt;">Đăng Nhập</a>
        <a href="?ctrl=user&act=register" class="log-2" style="font-size: 15pt;">Đăng Ký</a>
    </div>
    <form action="?ctrl=user&act=submitRegister" method="POST">
        <input type="text" name="name" id="name" class="input-control" placeholder="Nhập Họ Tên"><br>
        <input type="email" name="email" id="email" class="input-control" placeholder="Nhập Email"><br>
        <input type="password" name="password" id="password" class="input-control" placeholder="Nhập Mật Khẩu"><br>
        <input type="password" name="rePassword" id="rePassword" class="input-control" placeholder="Nhập Lại Mật Khẩu">
        <button type="submit" class="btn-danger"> Đăng Ký</button>
    </form>
</div>