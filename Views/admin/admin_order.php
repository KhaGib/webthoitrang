<div class="container mt-4">
  <h2>📦 Danh sách đơn hàng</h2>
   <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success']?>
        </div>
        <?php unset($_SESSION['success']); endif; ?>
  <table class="table table-bordered table-hover mt-3">
    <thead class="thead-dark">
      <tr>
        <th>ID Đơn</th>
        <th>Khách hàng</th>
        <th>Ngày đặt</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order):?>
      <tr>
        <?php $color= ['pending' => 'warning', 'confirmed'=>'success', 'cancelled'=>'danger'];
            $badgeClass = $color[$order['payment_status']] ?? 'secondary';
        ?>
        <td><?=$order['id']?></td>
        <td><?=$order['user_name']?></td>
        <td><?=$order['created_at']?></td>
        <td><span class="badge bg-<?=$badgeClass?>"><?=$order['payment_status']?></span></td>
        <td>
          <a href="?ctrl=adorder&act=orderID&id=<?=$order['id']?>" class="btn btn-info btn-sm">Chi tiết</a>
          <a href="?ctrl=adorder&act=confirm&id=<?=$order['id']?>" class="btn btn-success btn-sm">Xác nhận</a>
          <?php var_dump($order['id'])?>
          <a href="?ctrl=adorder&act=cancel&id=<?=$order['id']?>" class="btn btn-danger btn-sm"
     onclick="return confirm('Bạn có chắc chắn muốn huỷ đơn hàng này không?')">Huỷ</a>
        </td>
      </tr>
      <?php endforeach;?>
      <tr>
        <td></td>
        <td>Lê Thị B</td>
        <td>2025-07-07</td>
        <td><span class="badge bg-success">Đã xác nhận</span></td>
        <td>
          <a href="order_detail.html" class="btn btn-info btn-sm">Chi tiết</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
