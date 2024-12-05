<link rel="stylesheet" href="views/userInfo/user_info.css">
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
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

<?php
include_once 'models/Database.php';
$DataBase = new DataBase();


$query = "SELECT * FROM nguoidung";
$result = $DataBase->getAll($query);


$userData = null; 
foreach ($result as $row) { 
   if ($_SESSION['user']['id'] == $row['id']) {
       $userData = $row; 
       break; 
   }
}

?>
<div class="container_">
  <div class="customer-info">
    <h2>Thông tin khách hàng</h2>
      <p><i class="fa-solid fa-user"></i> <strong><?php echo isset($userData['ten_dang_nhap']) ? htmlspecialchars($userData['ten_dang_nhap']) : ''; ?></strong></p>
      <p><i class="fa-solid fa-phone"></i><strong><?php echo isset($userData['sdt']) ? htmlspecialchars($userData['sdt']) : ''; ?></strong></p>
      <p><i class="fa-solid fa-envelope"><strong></i><?php echo isset($userData['email']) ? htmlspecialchars($userData['email']) : ''; ?></strong></p>
      <a href="?page=edituserinfo"><button class="btn">Sửa Thông Tin</button></a>
      <a href="?page=editpwuser"><button class="btn">Đổi Mật Khẩu</button></a>
  </div>

  <div class="order-history">
    <h2>Lịch Sử Mua Hàng</h2>
    <div class="order-header">
      <button class="order-btn">Đơn hàng</button>
      <span>Ngày mua</span>
      <span>Địa chỉ</span>
      <span>Tình Trạng</span>
    </div>
    <div class="no-orders">
      <i class="fa-solid fa-cart-shopping"></i>
      <p>Không Có Đơn Hàng</p>
    </div>
  </div>
</div>
