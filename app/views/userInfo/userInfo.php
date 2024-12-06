<link rel="stylesheet" href="views/userInfo/user_info.css">

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

<section class="website">
  <ul>
    <li><a href="index.php">Trang Chủ ></a></li>
    <li><a class="in_page" href="?page=userInfo">Thông Tin Khách Hàng</a></li>
  </ul>
</section>
<div class="container_">
  <div class="customer-info">
    <h2>Thông tin khách hàng</h2>
      <p><i class="fa-solid fa-user"></i><?php echo $data['user'][0]['ten_dang_nhap'] ?></p>
      <p><i class="fa-solid fa-phone"></i><?php echo $data['user'][0]['sdt'] ?></p>
      <p><i class="fa-solid fa-envelope"></i><?php echo $data['user'][0]['email'] ?></p>
      <a href="?page=edituserinfo"><button class="btn">Sửa Thông Tin</button></a>
      <a href="?page=editpwuser"><button class="btn">Đổi Mật Khẩu</button></a>
  </div>

  <div class="order-history">
    <h2>Lịch Sử Mua Hàng</h2>
    <?php if (empty($data['orders'])): ?>
        <div class="no-orders">
            <i class="fa-solid fa-cart-shopping"></i>
            <p>Không Có Đơn Hàng</p>
        </div>
    <?php else: ?>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Đơn Hàng</th>
                    <th>Ngày Mua</th>
                    <th>Địa Chỉ</th>
                    <th>Tình Trạng</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; foreach ($data['orders'] as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($index) ?></td>
                        <td><?= htmlspecialchars($order['ngay_dat_hang']) ?></td>
                        <td><?= htmlspecialchars($order['dia_chi']) ?></td>
                        <td><?= htmlspecialchars($order['trang_thai']) ?></td>
                    </tr>
                <?php $index++; endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
  </div>

</div>