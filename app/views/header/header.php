

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vibrant</title>
    <link rel="stylesheet" href="views/header/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <a href="index.php">
                <img src="views/header/header_img/logo.png" alt="">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?page=product&danh_muc=1">Giày nam</a></li>
                <li><a href="index.php?page=product&danh_muc=2">Giày nữ</a></li>
                <li><a href="index.php?page=product&danh_muc=3">Giày thể thao</a></li>
                <li><a href="index.php?page=product&danh_muc=4">Đặc biệt</a></li>
            </ul>
        </nav>

        <div class="search-icons">
            <div class="search-box">
                <form action="index.php" method="GET">
                    <input type="text" name="search" placeholder="Tìm Kiếm" aria-label="Tìm kiếm sản phẩm">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="icons" style="display: flex;">
            <a href="index.php?page=cart" aria-label="Giỏ hàng"><i class="fa-solid fa-cart-shopping"></i></a>

            <?php 
                if (isset($_SESSION['user'])) { 
                    echo '<a href="index.php?page=userInfo" aria-label="Tài khoản người dùng"><i class="fa-regular fa-user"></i></a>';
                    echo '<a href="index.php?page=logout" aria-label="Đăng xuất"><i class="fa-solid fa-right-from-bracket"></i></a>';
                } else {
                    echo '<a href="index.php?page=register" aria-label="Tài khoản người dùng"><i class="fa-solid fa-right-to-bracket"></i></a>';
                }
            ?>
            
            <button class="mobile-menu-btn" style="font-size: 18px; color: #004C59;" aria-label="Toggle menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>

    <div id="myLinks" class="mobile-menu">
        <ul>
            <li><a href="#">Giày nam</a></li>
            <li><a href="#">Giày nữ</a></li>
            <li><a href="#">Giày thể thao</a></li>
            <li><a href="#">Đặc biệt</a></li>
        </ul>
    </div>
</header>

    <button id="scrollTopBtn" onclick="scrollToTop()">Lên đầu trang</button>
    <script>
  
function toggleMenu() {
  var menu = document.getElementById("myLinks");
  if (menu.style.display === "block") {
    menu.style.display = "none"; 
  } else {
    menu.style.display = "block"; 
  }
}


document.querySelector(".mobile-menu-btn").addEventListener("click", function() {
  toggleMenu(); 
});

     window.onscroll = function() {
            let scrollTopBtn = document.getElementById("scrollTopBtn");
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollTopBtn.style.display = "block";
            } else {
                scrollTopBtn.style.display = "none";
            }
        };
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
     </script>

