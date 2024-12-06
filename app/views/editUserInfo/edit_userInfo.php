
    <link rel="stylesheet" href="views/editUserInfo/edit_userInfo.css">
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
      <li><a href="?page=userInfo">Thông Tin Khách Hàng ></a></li>
      <li><a class="in_page" href="?page=edituserinfo">Sửa Đổi Thông Tin</a></li>
    </ul>
  </section>
  <div class="container_">


  <?php
      include_once 'models/Database.php';
      $DataBase = new DataBase();

      $id = $_SESSION['user']['id'];

      $query = "SELECT * FROM nguoidung WHERE id LIKE $id";
      $user = $DataBase->getAll($query);



  ?>


    <h1 class="title">SỬA ĐỔI THÔNG TIN</h1>
    <br>
    <h2>Thông tin tài khoản</h2>
    <form action="index.php?page=edituserinfo" method="post">
            <label for="name">Họ Và Tên</label>
            <input type="text" id="name" name="name" placeholder="Nhập họ và tên" value="<?php echo isset($user[0]['ten_nguoi_dung']) ? htmlspecialchars($user[0]['ten_nguoi_dung']) : ''; ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" value="<?php echo isset($user[0]['email']) ? htmlspecialchars($user[0]['email']) : ''; ?>">
            
            <label for="sdt">SĐT</label>
            <input type="text" id="sdt" name="sdt" placeholder="Nhập số điện thoại" value="<?php echo isset($user[0]['sdt']) ? htmlspecialchars($user[0]['sdt']) : ''; ?>">

          <div class="gender">
            <label for="gender">Giới Tính :</label>
            <input type="text" id="gender" name="gender" placeholder="Nhập giới tính" value="<?php  echo isset($user[0]['gioi_tinh']) ? htmlspecialchars($user[0]['gioi_tinh']) : ''; ?>">
          </div>
            <div class="dob-select">
              <label for="birth_date">Ngày Sinh:</label>
              <input type="date" id="birth_date" name="birth_date" value="<?php echo $user[0]['ngay_sinh'] ?>" required>
            </div>

          <button name="submit" type="submit" class="submit-btn">Cập Nhật</button>
        </form>

  </div>
<pre>
  <?php print_r($user) ?>
</pre>