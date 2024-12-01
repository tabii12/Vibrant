<?php


?>
<link rel="stylesheet" href="views/cart/cart.css">
<section class="website">
    <ul>
      <li><a href="#">Trang Chủ ></a></li>
      <li><a href="#">Chi Tiết Sản Phẩm ></a></li>
      <li><a class="in_page" href="cart.html">Giỏ Hàng</a></li>
    </ul>
  </section>
<div class="cart-container">
    <h1><span>| </span>GIỎ HÀNG</h1>
    <div class="summary">
      <h3>SẢN PHẨM</h3>
      <p class="all"><p></p> <span></span></p>
    </div>

    
    <!-- Sản phẩm -->
    <div class="cart-content">
        <div class="cart-products">
        <?php 
            foreach($_SESSION['cart'] as $product){
                echo '
                    <div class="cart-items">
                        <div class="cart-item" data-price="'.$product['gia'].'">
                            <img src="../public/image/'.$product['url'].'" alt="'.$product['ten_san_pham'].'">
                            <div class="item-details">
                                <h3>'.$product['ten_san_pham'].'</h3>
                                <p>SIZE 41</p>
                                <p class="price">'.number_format($product['gia'], 0, '', ',').'đ</p>
                                
                                <form action="index.php?page=cart" method="post">
                                    <button class="delete-item" name="delProduct" value="'.$product['id'].'"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </div>
                        </div>      
                    </div>
                ';
            }
        ?>
                    <!-- <div class="cart-items">
                        <div class="cart-item" data-price="'.$product['gia'].'">
                            <img src="../public/image/'.$product['url'].'" alt="'.$product['ten_san_pham'].'">
                            <div class="item-details">
                                <h3>'.$product['ten_san_pham'].'</h3>
                                <p>SIZE 41</p>
                                <p class="price">'.$product['gia'].'đ</p>
                                
                                    <div class="quantity">
                                        <button type="submit" name="action" value="decrease" class="decrease">-</button>
                                        <input type="hidden" name="product_id" value="'.$product['id'].'">
                                        <input type="number" name="quantity" value="'.$product['quantity'].'" min="1" class="quantity-input">
                                        <button type="submit" name="action" value="increase" class="increase">+</button>
                                    </div>
                            </div>
                            <button class="delete-item"><i class="fa-regular fa-trash-can"></i></button>
                        </div>      
                    </div> -->
                    
        </div>
        

    
      <!-- Tổng giá -->
        <?php 
            $sum = 0;
            foreach($_SESSION['cart'] as $product){
                $sum += $product['gia'];
            }
            echo '
                <div class="cart-summary">
                    <div class="price_shoe_ship">
                        <p>Tổng giá giày: <span>'.number_format($sum, 0, '', ',').'đ</span></p>
                        <p>Phí ship: <span>100,000đ</span></p>
                    </div>
                    <div class="sumAll">
                        <p>Tổng giá: <span>'.number_format($sum + '100000', 0, '', ',').'đ</span></p>
                    </div>
                    <button class="checkout-btn">Thanh Toán</button>
                    <button class="continue-btn">Tiếp tục mua hàng</button>
                </div>
            ';
        ?>

        <!-- <div class="cart-summary">
            <div class="price_shoe_ship">
                <p>Tổng giá giày: <span>0đ</span></p>
                <p>Phí ship: <span>100.000đ</span></p>
            </div>
            <div class="sumAll">
                <p>Tổng giá: <span>0đ</span></p>
            </div>
            <button class="checkout-btn">Thanh Toán</button>
            <button class="continue-btn">Tiếp tục mua hàng</button>
        </div> -->
    </div>
</div>
  <section class="love-product">
    <div class="title-love-product">
      <h2 style="font-family: 'Lobster', cursive;">Có thể <span style="font-family: 'Lobster', cursive;">bạn sẽ thích</span></h2>
      <div class="vector_arrow">
        <i class="fa-solid fa-share"></i>
      </div>
    </div>
    
    <div class="product-love">
        <!-- Product 1 -->
        <div class="new">
            <div class="img">
                <img src="image/product/Hoodie_Yellow.png" alt="Áo Hoodie Yellow D">
                <button class="btn">
                    <i class="fa-regular fa-heart"></i>
                </button>
            </div>
            <div class="info">
                <h3 class="name">Áo Hoodie Yellow D</h3>
                <p class="cate">Thời Trang Nam</p>
                <br>
                <p class="price">4,366,000đ</p>
            </div>
        </div>
        <div class="new">
            <div class="img">
                <img src="image/product/TayDai_H&M.png" alt="Áo Tay Dài H&M">
                <button class="btn">
                  <i class="fa-regular fa-heart"></i>
              </button>
            </div>
            <div class="info">
                <h3 class="name">Áo Tay Dài H&M</h3>
                <p class="cate">Thời Trang Nam</p>
                <br>
                <p class="price">4,699,000đ</p>
            </div>
        </div>  <div class="new">
            <div class="img">
                <img src="image/product/Nike_OngRong.png" alt="Quần Nike Ống Rộng">
                <button class="btn">
                  <i class="fa-regular fa-heart"></i>
              </button>
            </div>
            <div class="info">
                <h3 class="name">Quần Nike Ống Rộng</h3>
                <p class="cate">Thời Trang Nam</p>
                <br>
                <p class="price">450,000đ</p>
            </div>
        </div>
        

        <!-- Product 2 -->
        <div class="new">
          <div class="img">
              <img src="image/product/Adidas_Green.png" alt="Áo Adidas Green">
              <button class="btn">
                <i class="fa-regular fa-heart"></i>
            </button>
          </div>
          <div class="info">
              <h3 class="name">Áo Adidas Green</h3>
              <p class="cate">Thời Trang Nam</p>
              <br>
              <p class="price">500,000đ</p>
          </div>
      </div>

      <!-- Product 3 -->
      <div class="new">
          <div class="img">
              <img src="image/product/Nike_Revolution.png" alt="Nike Revolution 7">
              <button class="btn">
                <i class="fa-regular fa-heart"></i>
            </button>
          </div>
          <div class="info">
              <h3 class="name">Nike Revolution 7</h3>
              <p class="cate">Giày</p>
              <br>
              <p class="price">1,431,000đ</p>
          </div>
      </div>
      <!-- Product 4 -->
      <div class="new">
          <div class="img">
              <img src="image/product/Ao_Phao_Kieu.png" alt="Áo Phao Kiểu">
              <button class="btn">
                <i class="fa-regular fa-heart"></i>
            </button>
          </div>
          <div class="info">
              <h3 class="name">Áo Phao Kiểu</h3>
              <p class="cate">Thời Trang Nam</p>
              <br>
              <p class="price">1,644,000đ</p>
          </div>
      </div>
      <!-- Product 5 -->

      <div class="new">
        <div class="img">
            <img src="image/product/TuiDa_Puma.png" alt="Túi Da Puma">
            <button class="btn">
              <i class="fa-regular fa-heart"></i>
          </button>
        </div>
        <div class="info">
            <h3 class="name">Túi Da Puma</h3>
            <p class="cate">Phụ Kiện</p>
            <br>
            <p class="price">2,600,000đ</p>
        </div>
    </div>
  </div>

  <?php
    echo "<pre>";
    // print_r($_SESSION['cart']);
    echo "</pre>";
    
    ?>