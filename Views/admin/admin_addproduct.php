<div class="container mt-4">
    <h1>Thêm sản phẩm</h1>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); endif; ?>
    <form action="admin.php?ctrl=adproduct&act=addProduct" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="price" placeholder="Giá">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="sale_price" placeholder="Giá Sale">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="file" placeholder="Hình ảnh">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" id="" placeholder="Mô tả"></textarea>
        </div>
        <select name="category_id" class="form-control">
            <option value="">-- Chọn danh mục --</option>
            <?php foreach($GLOBALS['categories'] as $cat):?>
            <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
            <?php endforeach;?>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Thêm sản phẩm</button>
    </form>
</div>