<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Quản lý Sản phẩm</h1>

    <!-- Button thêm mới -->
    <a href="admin.php?ctrl=adproduct&act=addProduct" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Thêm sản phẩm
    </a>

    <!-- Bảng sản phẩm -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Description</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= number_format($product['price']) ?>₫
                        <del><?=number_format($product['sale_price'])?></del></td>
                            <td><img src="./Public/img/<?= $product['image'] ?>" width="60" height="60"></td>
                            <td><?= $product['description']?></td>
                            <td>
                                <a href="?ctrl=adproduct&act=editProductForm&id=<?=$product['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="?ctrl=adproduct&act=deleteProduct&id=<?=$product['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php if (empty($products)): ?>
                    <p class="text-center text-danger">Không có sản phẩm nào.</p>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
