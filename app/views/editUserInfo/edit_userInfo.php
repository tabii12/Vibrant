
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


      $query = "SELECT * FROM nguoidung";
      $result = $DataBase->getAll($query);


      $userData = null; 
      foreach ($result as $row) { 
        if ($_SESSION['user']['id'] == $row['id']) {
            $userData = $row; 
            break; 
        }
      }

      $ngaySinh = isset($userData['ngay_sinh']) ? $userData['ngay_sinh'] : '';
      $ngay = date('d', strtotime($ngaySinh));  
      $thang = date('m', strtotime($ngaySinh)); 
      $nam = date('Y', strtotime($ngaySinh)); 

  ?>


    <h1 class="title">SỬA ĐỔI THÔNG TIN</h1>
    <br>
    <h2>Thông tin tài khoản</h2>
        <form action="#" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" value="<?php echo isset($userData['email']) ? htmlspecialchars($userData['email']) : ''; ?>">
            
            <label for="sdt">SĐT</label>
            <input type="text" id="sdt" name="sdt" placeholder="Nhập số điện thoại" value="<?php echo isset($userData['sdt']) ? htmlspecialchars($userData['sdt']) : ''; ?>">

            <label for="name">Họ Và Tên</label>
            <input type="text" id="name" name="name" placeholder="Nhập họ và tên" value="<?php echo isset($userData['ten_nguoi_dung']) ? htmlspecialchars($userData['ten_nguoi_dung']) : ''; ?>">
          <div class="gender">
            <label for="gender">Giới Tính :</label>
            <input type="text" id="gender" name="gender" placeholder="Nhập giới tính" value="<?php echo isset($userData['gioi_tinh']) ? htmlspecialchars($userData['gioi_tinh']) : ''; ?>">
          </div>
            <div class="dob-select">
            <label for="dob">Ngày Sinh :</label>

            <select id="day" name="day">
                <option value="<?php echo htmlspecialchars($ngay); ?>"><?php echo htmlspecialchars($ngay); ?></option>
                <?php for ($i = 1; $i <= 31; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($i == $ngay) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>

            <select id="month" name="month">
                <option value="<?php echo htmlspecialchars($thang); ?>"><?php echo htmlspecialchars($thang); ?></option>
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($i == $thang) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>

            <select id="year" name="year">
                <option value="<?php echo htmlspecialchars($nam); ?>"><?php echo htmlspecialchars($nam); ?></option>
                <?php for ($i = 1900; $i <= 2024; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($i == $nam) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            </div>

            <button type="submit" class="submit-btn">Cập Nhật</button>
        </form>

  </div>
