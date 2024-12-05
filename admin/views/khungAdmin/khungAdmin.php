<!-- Sidebar -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="views/khungAdmin/khungAdmin.css">

 </head>
 <body>
<div class="sidebar">
        <div class="logo">
            <img style="width:200px;" src="views/khungAdmin/image/logo.png" alt="Logo">
        </div>
        
        <div class="menu">
            
            <a href="index.php?page=cate" class="menu-item">
                <span>Danh mục</span>
            </a>
            
            <a href="index.php?page=product" class="menu-item">
                <span>Sản phẩm</span>
            </a>

            <a href="index.php?page=oder" class="menu-item">
                <span>Danh sách oder</span>
            </a>
            
            <a href="index.php?page=comment" class="menu-item">
                <span>Bình Luận</span>
            </a>
            
            <a href="index.php?page=khuyenMai" class="menu-item">
                <span>Khuyến mãi</span>
            </a>
            
            <a href="index.php?page=customer" class="menu-item">
                <span>Khách hàng</span>
            </a>

            
            
            <a href="index.php?page=user" class="menu-item active">
                <span>Admin</span>
            </a>
            
            <a href="index.php?page=logout" class="menu-item">
                <span>Đăng xuất</span>
            </a>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="search-box">
            <img style="width: 20px; height: 20px;" src="views/khungAdmin/image/search.png" alt="">
            <input type="text" placeholder="Search...">
        </div>

        <div class="user-menu">
            <div class="notification">
                <img style="width: 40px; height: 40px;" src="views/khungAdmin/image/notification.png" alt="">
                <span class="notification-badge">2</span>
            </div>

            <div class="language-selector">
                <img style="width: 60px; height: 40px;" src="views/khungAdmin/image/vietnam.png" alt="Vietnamese flag">
                <span>Việt Nam</span>
            </div>

            <div class="user-profile">
                <div class="user-info">
                    <div class="user-name">Đức Duy</div>
                    <div class="user-role">Admin</div>
                </div>
                <div class="user-avatar">
                    👤
                </div>
            </div>
        </div>
    </div>
</div>