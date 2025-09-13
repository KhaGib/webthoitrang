<div class="container mt-4">
    <h1>Thêm Người Dùng</h1>
    <?php if (isset($_SESSION['info'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['info'] ?>
        </div>
        <?php unset($_SESSION['info']); endif; ?>
    <form action="admin.php?ctrl=aduser&act=addUser" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nhập tên">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="phone" placeholder="Phone">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" id="" placeholder="Địa Chỉ"></input>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
    </form>
</div>