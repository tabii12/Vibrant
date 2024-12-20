<?php 
$data_product = $data['product'];
?>
<link rel="stylesheet" href="views/home/home.css">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<section class="banner" >
       <a href="index.php?page=product"> <img src="views/home/home_img/bannernew.png" alt=""></a>
    </section>
    <section class="service">
        <div class="info-box">
            <p>Vận chuyển <strong>TOÀN QUỐC</strong><br>Thanh toán khi nhận hàng</p>
        </div>
        <div class="info-box">
            <p>Bảo đảm chất lượng<br>Sản phẩm bảo đảm chất lượng</p>
        </div>
        <div class="info-box">
            <p>Tiến hành <strong>THANH TOÁN</strong><br>Với nhiều <strong>PHƯƠNG THỨC</strong></p>
        </div>
        <div class="info-box">
            <p><strong>Đổi mới sản phẩm mới</strong><br>nếu sản phẩm lỗi</p>
        </div>
    </section>
<section class="new-product">
     <h2><div class="section-title" style="color: #004C59;">Bộ sưu tập </div> <div class="section-title" style="color: #F15E2C;" >mới ra mắt</div></h2>
    
     <div class="product-new">
         <?php 
          $count = 0;
          foreach ($data['productDB'] as $product) {
              if ($count >= 4) break; 
              $formatted_price = number_format($product['gia'], 0, ',', '.');
              echo '
               <a href="index.php?page=detail&id_san_pham='.$product['id'].'">
              <div class="new">
                  <div class="img">
                     
                          <img src="../public/image/'.$product['img_url'].'">
                     
                      <button class="btn">
                          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                          </svg>
                      </button>
                  </div>
                  <div class="info">
                      <h3 class="name">'.$product['ten_san_pham'].'</h3>
                      <p class="cate">'.$product['ten_danh_muc'].'</p>
                      <br>
                      <p class="price">'.$formatted_price.'đ</p>
                  </div>
              </div>
               </a>';
              $count++;
          }
          
         ?>
     </div>
</section>
<section class="new-products">
    <div class="intro">
        <h2>Bộ sưu tập giới hạn</h2>
        <p>Những sản phẩm đặc biệt giới hạn bởi những nhà thiết kế</p>
        <button class="shop-button">Mua Sắm</button>
    </div>
    <div class="products">
        <div class="product-item">
            <?php 
                foreach($data['productNewGN'] as $giay){
                    echo '
                        <a href="index.php?page=product&danh_muc=1">
                        <div class="img">
                        <img src="../public/image/'.$giay['url'].'" alt="Thời Trang Nam">
                        </div>
                        </a>
                    ';
                }            
            ?>
            <p>GIÀY NAM</p>
        </div>
        <div class="product-item">
        <?php 
                foreach($data['productNewGNw'] as $giay){
                    echo '
                        <a href="index.php?page=product&danh_muc=2">
                        <div class="img">
                        <img src="../public/image/'.$giay['url'].'" alt="Thời Trang Nam">
                        </div>
                        </a>
                    ';
                }            
            ?>
            <p>GIÀY NỮ</p>
        </div>
        <div class="product-item">
        <?php 
                foreach($data['productNewTT'] as $giay){
                    echo '
                        <a href="index.php?page=product&danh_muc=3">
                        <div class="img">
                        <img src="../public/image/'.$giay['url'].'" alt="Thời Trang Nam">
                        </div>
                        </a>
                    ';
                }            
            ?>
            <p>GIÀY THỂ THAO</p>
        </div>
        <div class="product-item">
        <?php 

                foreach($data['productNewDB'] as $giay){
                    echo '
                        <a href="index.php?page=product&danh_muc=4">
                        <div class="img">
                        <img src="../public/image/'.$giay['url'].'" alt="Thời Trang Nam">
                        </div>
                        </a>
                    ';
                }            
            ?>
            <p>ĐẶC BIỆT</p>
        </div>
    </div>
</section>

<section class="love-product">
<h2><div class="section-title" style="color: #004C59;">Có thể  </div> <div class="section-title" style="color: #F15E2C;" >bạn sẽ thích </div></h2>
    <div class="product-love">
    <?php
               foreach ($data['BCTT'] as $BCTT) {
                $formatted_price = number_format($BCTT['gia'], 0, ',', '.'); 
                echo '
                <a href="index.php?page=detail&id_san_pham='.$BCTT['id'].'">
                    <div class="new">
                        <div class="img">
                            <img src="../public/image/'.$BCTT['url'].'" alt="Áo Hoodie Yellow D">
                            <button class="btn">
                                
                            </button>
                        </div>
                        <div class="info">
                            <h3 class="name">'.$BCTT['ten_san_pham'].'</h3>
                            <p class="cate">Thời Trang Nam</p>
                            <br>
                            <p class="price">'.$formatted_price.'đ</p>
                        </div>
                    </div>
                </a>
                ';
            }
            
                   ?>
    

    </div>
</section>
<section class="brand"> 
    <h2>Những hãng hợp tác</h2>
    <img src="views/home/home_img/brand.png" alt="">
</section>
