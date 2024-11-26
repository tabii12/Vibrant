<link rel="stylesheet" href="views/login/login.css">
<section class="website">
    <ul>
        <li><a href="index.php?page=home">Trang Chủ ></a></li>

        <li><a class="in_page" href="#">Đăng Nhập</a></li>
    </ul>
</section>
      <section class="form_login">
        <div class="form-left">
            <img src="views/login/login_img/Image_Sale_Login-left.png" alt="Login Image" />
        </div>
        <div class="form-right">
            <div class="title">
                <h1>ĐĂNG NHẬP</h1>
            </div>
            <form action="index.php?page=login" method="post">
            <div class="information">
                <div class="account">
                    <label for="ten_dang_nhap">Tên đăng nhập</label>
                    <input class="enter_account" id="ten_dang_nhap" name="ten_dang_nhap" type="text" placeholder="Tên đăng nhập">
                </div>
                <div class="password">
                    <label for="mat_khau">MẬT KHẨU</label>
                    <input class="enter_password" id="mat_khau" name="mat_khau" type="password" placeholder="Nhập mật khẩu">
                </div>
                <?php if (!empty($error_message)): ?>
                    <div class="error-message">
                        <p style="color: red;"><?php echo $error_message; ?></p>
                    </div>
                <?php endif; ?>
                <div class="confirm">
                    <input class="checkbox" type="checkbox" id="remember_me">
                    <label for="remember_me">Ghi Nhớ Mật Khẩu</label>
                </div>
            </div>
            <div class="login_button">
                <input type="submit" name="submit" id="submit">
            </div>
          </form>
            <div class="go-to_signup">
                <p>Chưa có tài khoản? <a href="index.php?page=register">Đăng ký ngay</a></p>
            </div>
            <div class="social-login">
                <p>Hoặc Đăng Nhập Bằng</p>
                <div>
                    <button class="login-with_facebook"><img src="views/login/login_img/Facebook.png" alt="Facebook"></button>
                    <button class="login-with_google"><img src="views/login/login_img/Google.png" alt="Google"></button>
                </div>
            </div>
        </div>
    </section>