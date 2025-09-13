<div class="container mt-4">
    <h2>Chỉnh sửa sản phẩm</h2>
    <?php foreach($edit as $edits):?>
    <form action="admin.php?ctrl=adproduct&act=updateProduct" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $edits['id'] ?>">
        <input type="hidden" name="old_image" value="<?= $edits['image'] ?>">

        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="<?= $edits['name'] ?>" required>
        </div>

        <div class="form-group">
            <label>Giá</label>
            <input type="number" name="price" class="form-control" value="<?= $edits['price'] ?>" required>
        </div>

        <div class="form-group">
            <label>Hình ảnh hiện tại</label><br>
            <img src="./Public/img/<?= $edits['image'] ?>" width="100">
            <input type="file" name="image" class="form-control mt-2">
            <input type="submit" value="Upload">
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control"><?= $edits['description'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="admin.php?ctrl=adproduct&act=productAd" class="btn btn-secondary">Hủy</a>
    </form>
    <?php endforeach;?>
</div>
