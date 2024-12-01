<?php 
$admin_infor = $data['Admin_info'];
?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="views/editAdmin/edit_admin.css">
<body>
<div class="title_container">
    <h1>Chỉnh sửa Tài Khoản Admin</h1>
    </div>
    <div class="form-container">
    <form method="POST">
                <div class="form-grid">
                <div class="form-group">
                    <label for="name">Họ và Tên</label> 
                    <input type="text" id="name" placeholder="Vui Lòng Nhập Họ Và Tên" value="<?php echo $admin_infor['ten_nguoi_dung']; ?>" required>
                </div>              
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Vui Lòng Nhập Email" value="<?php echo $admin_infor['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số Điện thoại</label>
                    <input type="text" id="phone" placeholder="Vui Lòng Nhập SDT" value="<?php echo $admin_infor['sdt']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="position">Chức vụ</label>
                    <input type="text" id="position" placeholder="Vui Lòng Nhập Chức Vụ" value="<?php echo $admin_infor['role']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select id="gender" required>
                        <option value="Nam" <?php echo $admin_infor['gioi_tinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                        <option value="Nữ" <?php echo $admin_infor['gioi_tinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                        <option value="Khác" <?php echo $admin_infor['gioi_tinh'] == 'Khác' ? 'selected' : ''; ?>>Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" id="username" placeholder="Vui Lòng Điền Tên Đăng Nhập" value="<?php echo $admin_infor['ten_dang_nhap']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="old-password">Mật khẩu cũ</label>
                    <input type="password" id="old-password" placeholder="Nhập mật khẩu cũ" required>
                </div>
                <div class="form-group">
                    <label for="new-password">Mật khẩu mới</label>
                    <input type="password" id="new-password" placeholder="Nhập mật khẩu mới" required>
                </div>
            </div>
            <div class="submit_container">
            <button type="submit" class="submit-btn">Cập Nhật Thông Tin</button>

            </div>
        </form>
    </div>
</body>
</html>
