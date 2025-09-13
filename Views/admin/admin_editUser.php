<div class="container mt-4">
    <h2>Chỉnh sửa User</h2>
       <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); endif; ?>
    <?php foreach($users as $user):?>
    <form action="admin.php?ctrl=aduser&act=updateUser" method="post" enctype="multipart/form-data">
       <input type="hidden" name="id" value="<?=$user['id'] ?>">
        <!-- <input type="hidden" name="old_image" value=">">  -->
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
        </div>

        <div class="form-group">
            <label>Password:</label><br>
            <input type="password" name="password" class="form-control mt-2" value="<?=$user['password']?>">
        </div>
        <div class="form-group">
            <label>address:</label>
            <input name="address" name="address" class="form-control" value="<?= $user['address'] ?>"></input>
        </div>
         <div class="form-group">
            <label>role:</label>
            <textarea name="description" name="role" class="form-control"><?= $user['role'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="admin.php?ctrl=adproduct&act=productAd" class="btn btn-secondary">Hủy</a>
    </form>
    <?php endforeach;?>
</div>
