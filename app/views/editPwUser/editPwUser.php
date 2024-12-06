
    <link rel="stylesheet" href="views/editPwUser/editPwUser.css">
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
      <li><a class="in_page" href="?page=editpwuser">Đổi Mật Khẩu</a></li>
    </ul>
  </section>
  <div class="change-password-container">
    <h1>Đổi Mật Khẩu</h1>
    <form class="change-password-form">
      <div class="form-group">
        <label for="current-password">Mật Khẩu Hiện Tại</label>
        <input type="password" id="current-password" placeholder="Nhập mật khẩu hiện tại" required>
      </div>
      <div class="form-group">
        <label for="new-password">Mật Khẩu Mới</label>
        <input type="password" id="new-password" placeholder="Nhập mật khẩu mới" required>
      </div>
      <div class="form-group">
        <label for="confirm-password">Nhập Lại Mật Khẩu Mới</label>
        <input type="password" id="confirm-password" placeholder="Nhập lại mật khẩu mới" required>
      </div>
      <button type="submit">Đổi Mật Khẩu</button>
    </form>
  </div>
