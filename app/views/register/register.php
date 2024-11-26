<link rel="stylesheet" href="views/register/register.css">
<section class="website">
  <ul>
    <li><a href="index.php?page=home">Trang Chủ ></a></li>

    <li><a class="in_page" href="#">Đăng Ký</a></li>
  </ul>
</section>
<section class="form_register">
  <div class="form-container">
    <div class="form-left">
      <h1>ĐĂNG KÝ</h1>
      <form id="registerForm" action="index.php?page=register" method="post">
        <!-- Tên đăng nhập -->
        <div class="form-group">
          <label for="ten_dang_nhap">Tên đăng nhập</label>
          <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập" required>
        </div>
        <!-- Email -->
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
        </div>
        <!-- Số điện thoại -->
        <div class="form-group">
          <label for="sdt">Số điện thoại</label>
          <input type="text" id="sdt" name="sdt" placeholder="Nhập số điện thoại của bạn" required>
        </div>
        <!-- Mật khẩu -->
        <div class="form-group">
          <label for="mat_khau">Mật khẩu</label>
          <input type="password" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu" required>
        </div>
        <!-- Xác nhận mật khẩu -->
        <div class="form-group">
          <label for="xac_nhan_mat_khau">Xác nhận mật khẩu</label>
          <input type="password" id="xac_nhan_mat_khau" name="xac_nhan_mat_khau" placeholder="Nhập lại mật khẩu" required>
          <!-- Hiển thị lỗi xác nhận mật khẩu -->
          <?php if (!empty($error_message)): ?>
              <p style="color: red; font-size: 14px; margin-top: 5px;"><?php echo $error_message; ?></p>
          <?php endif; ?>
        </div>
        <!-- Đồng ý điều khoản -->
        <div class="form-group checkbox-group">
          <input type="checkbox" id="remember_me" name="remember_me">
          <label for="remember_me">Đồng ý với các điều khoản</label>
        </div>
        <!-- Nút đăng ký -->
        <div class="form-group">
          <input type="submit" name="submit" id="submit" value="Đăng Ký">
        </div>
      </form>
      <!-- Đăng nhập nếu đã có tài khoản -->
      <div class="login-link">
        <p>Đã có tài khoản? <a href="index.php?page=login">Đăng nhập ngay</a></p>
      </div>
    </div>
    <!-- Hình ảnh minh họa -->
    <div class="form-right">
      <img src="views/register/register_img/Image_Sale_login-right.png" alt="Hình ảnh minh họa">
    </div>
  </div>
</section>
