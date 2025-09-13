<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Quản lý Người dùng</h1>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); endif; ?>
    <!-- Button thêm mới -->
    <a href="?ctrl=aduser&act=addUser" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Thêm người dùng
    </a>
    <!-- Bảng người dùng -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['password'] ?></td>
                            <td><?= ucfirst($user['role']) ?></td>
                            <td>
                                <a href="?ctrl=aduser&act=editUser&id=<?= $user['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="?ctrl=aduser&act=deleteUser&id=<?= $user['id'] ?>" onclick="return confirm('Xóa người dùng này?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php if (empty($user)): ?>
                    <p class="text-center text-danger">Không có người dùng nào.</p>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
