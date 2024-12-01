
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="views/AddAdmin/add_admin.css">
<body>
<div class="title_container">
    <h1 >Thêm Admin Mới</h1>
    </div>
    <div class="form-container">
    <form method="POST" action="index.php?page=add">
        <div class="form-grid">
            <div class="form-group">
                <label for="ten_nguoi_dung">Họ và Tên</label>
                <input type="text" id="ten_nguoi_dung" name="ten_nguoi_dung" placeholder="Vui Lòng Nhập Họ Và Tên" required>
            </div>              
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Vui Lòng Nhập Email" required>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện thoại</label>
                <input type="text" id="phone" name="phone" placeholder="Vui Lòng Nhập SDT" required>
            </div>
            <div class="form-group">
                <label for="position">Chức vụ</label>
                <input type="text" id="position" name="position" placeholder="Vui Lòng Nhập Chức Vụ" required>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select id="gender" name="gender" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Vui Lòng Điền Tên Đăng Nhập" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group">
                <label for="again_password">Nhập Lại Mật khẩu</label>
                <input type="password" id="again_password" name="again_password" placeholder="Nhập lại mật khẩu" required>
            </div>
        </div>
        <div class="submit_container">
            <button type="submit" class="submit-btn" name="submit">Thêm Admin</button>
        </div>
    </form>

    </div>
</body>
