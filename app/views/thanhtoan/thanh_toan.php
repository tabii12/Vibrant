<?php 
$data_user = $data['user'];
$data_product = $data['product'];
// print_r($data_product);
?>
<link rel="stylesheet" href="views/thanhtoan/thanh_toan.css">
<div class="container-1">
        <div class="menu-nav">
            <ul>
            <li><a href="#">Trang chủ ></a></li>
            <li><a href="#">Chi tiết sản phẩm ></a></li>
            <li><a href="#">Giỏ Hàng ></a></li>
            <li><a href="#">Thanh Toán</a></li>
            </ul>
        </div>
        <div class="name-conten">
        <h2>Thanh Toán</h2>
        </div>
        <div class="container-pay">
            <div class="artical">
                <div class="how-to-pay">
                    <div class="name-how-to-pay">
                        Bạn muốn thanh toán bằng cách nào
                        </div>
                    <br>
                        <select name="payment_method" required>
                            <option value="1">Thanh Toan bang momo</option>
                            <option value="2">Chuyen khoan ngan hang</option>
                            <option value="3">Thanh toan khi nhan hang</option>
                            </select>
                            <div class="body-sale">
                                <input type="text" placeholder="Nhập mã giảm giá" id = "code-sale">
                                <input type="submit" name="btn-sumit-tt" id="btn-sumit-tt" placeholder="Nhập mã giảm giá">  
                            </div>
                                <div class="form-container">
                                <h2>Xác nhận thông tin của bạn</h2>
                                <?php 
                                        echo'
                                        <form action="process_form.php" method="post">
                                                <input type="text" placeholder="'.$data_product[0]['nguoi_nhan'].'" name="first_name  value="'.$data_product[0]['nguoi_nhan'].'" required>
                                                
                                                <input type="text" placeholder="'.$data_product[0]['dia_chi'].'" name="city" required>
                                                <input type="text" placeholder="'.$data_product[0]['sdt'].'" name="district" required>
                                                <input type="text" placeholder="'.$data_product[0]['email'].'" name="ward" required>
                                                <div class="two-columns">
                                                    <input type="text" placeholder="700000" name="postal_code" required>
                                                    <input type="text" placeholder="Việt Nam" name="country" required>
                                                </div>  
                                            </form>
                                            '
                                            
                                
                                ?>
                                
                                        <!-- <form action="process_form.php" method="post">
                                            <input type="text" placeholder="Họ" name="first_name" required>
                                            <input type="text" placeholder="Tên" name="last_name" required>
                                            <input type="text" placeholder="Thành Phố/Tỉnh" name="city" required>
                                            <input type="text" placeholder="Quận/Huyện" name="district" required>
                                            <input type="text" placeholder="Phường" name="ward" required>
                                            <div class="two-columns">
                                                <input type="text" placeholder="700000" name="postal_code" required>
                                                <input type="text" placeholder="Việt Nam" name="country" required>
                                            </div>
                                        </form> -->


                </div>
            </div>
        </div>  




            <div class="order-summary">
                <?php
                    $shipping_free = 100000;
                    $total = $shipping_free + $data_user['tong_gia']
                
                ?>
                <h2>Tóm tắt đơn hàng</h2>
                <div class="total-section">
                    <div class="row">
                        <span>Tổng</span>
                        <span><?php 
                        echo($data_user['tong_gia']);
                        ?></span>
                    </div>
                    <div class="row">
                        <span>Phí vận chuyển</span>
                        <span><?php echo($shipping_free)?></span>
                    </div>
                    <hr>
                    <div class="row total">
                        <span>Tổng cộng</span>
                        <span><?php
                        echo($total)        
                        ?></span>
                    </div>
                    <p class="note">(Tổng giá phản ánh giá đơn hàng của bạn, bao gồm tất cả các loại thuế và phí)</p>
                </div>
                
                <!-- <div class="product">
                    <img src="#" alt="Nike Air Max 90">
                    <div class="product-info">
                        <h3>Nike Air Max 90</h3>
                        <p>SIZE 41 / WHITE</p>
                        <p>4.366.000₫</p>
                    </div>
                </div> -->

                <?php
                    foreach($data_product as $product){
                        echo '
                        <div class="product">
                            <img src="'.$product['url'].'" alt="'.$product['ten_san_pham'].'">
                            <div class="product-info">
                                <h3>'.$product['ten_san_pham'].'</h3>
                                <p>SIZE '.$product['size'].'</p>
                                <p>'.$product['gia'].'</p>
                            </div>  
                        </div>
                        ';
                    }
                ?>
                <button class="confirm">Xác Nhận</button>
            </div>
        </div>
    </div>
<pre>
<?php 
print_r($data_product);
?>
</pre>
