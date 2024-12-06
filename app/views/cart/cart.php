<?php
$cartKeys = array_keys($_SESSION['cart']);
$maxIndex = end($cartKeys); 
$productId = htmlspecialchars($_SESSION['cart'][$maxIndex]['id']);

?>
<link rel="stylesheet" href="views/cart/cart.css">
<section class="website">
    <ul>
    <li><a href="index.php">Trang chủ ></a></li>
            <li><a href="index.php?page=detail&id_san_pham=<?php echo $productId ?>">Chi tiết sản phẩm ></a></li>
            <li><a href="#">Giỏ Hàng</a></li>
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
                                <p>Số lượng: <span>'.$product['quantity'].'</span></p>
                                <form action="index.php?page=cart" method="post">
                                    <input type="hidden" name="product_id" value="'.$product['id'].'"></input>
                                    <button type="submit" class="delete-item" name="delProduct" ><i class="fa-regular fa-trash-can"></i></butotn>
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
                $sum += $product['gia'] * $product['quantity'];
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
                    <a href="index.php?page=checkout&checkout=ok"><button class="checkout-btn" >Thanh Toán</button></a>
                    <a href="index.php?page=product"><button class="continue-btn">Tiếp tục mua hàng</button></a>
                </div>
            ';
        ?>
    </div>
</div>
<section class="love-product">
<h2><div class="section-title" style="color: #004C59;">Có thể  </div> <div class="section-title" style="color: #F15E2C;" >bạn sẽ thích </div></h2>
    <div class="product-love">
    <?php

               foreach ($data['BCTT'] as $BCTT) {
                // Định dạng giá
                $formatted_price = number_format($BCTT['gia'], 0, ',', '.'); 
                echo '
                <a style="text-decoration: none;" href="index.php?page=detail&id_san_pham='.$BCTT['id'].'">
                    <div class="new">
                        <div class="img">
                            <img src="../public/image/'.$BCTT['url'].'" alt="Áo Hoodie Yellow D">
                            <button class="btn">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
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
  <?php
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";
    
    ?>