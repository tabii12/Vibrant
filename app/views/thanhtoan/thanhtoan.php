
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
                    <form action="index.php?page=checkout" method="post">
                        <div class="body-sale">
                            <input type="text" placeholder="Nhập mã giảm giá" name="ma_nhap" id = "code-sale">
                            <input type="submit" name="km" id="btn-sumit-tt" placeholder="Nhập mã giảm giá">  
                        </div>
                        <?php if (!empty($error_message)): ?>
                            <div class="error-message">
                                <p style="color: red; padding-bottom: 10px;"><?php echo $error_message; ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($true_message)): ?>
                            <div class="error-message">
                                <p style="color: green; padding-bottom: 10px;"><?php echo $true_message; ?></p>
                            </div>
                        <?php endif; ?>
                    </form>
    <form id="main-form" action="index.php?page=checkout" method="post">
                    <div class="name-how-to-pay">
                        Bạn muốn thanh toán bằng cách nào
                    </div>
                    <br>
                    <select name="payment_method" required>
                        <option value="Thanh toán trực tiếp">Thanh toán trực tiếp</option>
                        <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                    </select>
                    <div class="form-container">
                        <h2>Xác nhận thông tin của bạn</h2>
                        <input type="text" placeholder="Tên người nhận" name="ten_nguoi_nhan" value="<?php echo $_SESSION['user']['ten_nguoi_dung'] ?>" required>
                        <input type="text" placeholder="Địa chỉ" name="dia_chi" value="<?php echo $_SESSION['user']['dia_chi'] ?>" required>
                        <input type="text" placeholder="Số điện thoại" name="sdt" value="<?php echo $_SESSION['user']['sdt'] ?>" required>
                    </div>
                </div>
            </div>  
            <div class="order-summary">
                <h2>Tóm tắt đơn hàng</h2>
                <?php
                    $midtotal = 0;

                    foreach($_SESSION['cart'] as $product){
                        $midtotal += $product['gia'];
                    }

                    $total = $midtotal + 100000;
                    if(isset($discount)){
                        $total = $total * (1 - $discount / 100);
                    }
                ?>
                <div class="total-section">
                    <div class="row">
                        <span>Tổng</span>
                        <span><?php echo number_format($midtotal, 0, '', ',') ?></span>
                    </div>
                    <div class="row">
                        <span>Phí vận chuyển</span>
                        <span>100,000đ</span>
                    </div>
                    <hr>
                    <div class="row total">
                        <span>Tổng cộng</span>
                        <span><?php echo number_format($total, 0, '', ',') ?></span>
                    </div>
                    <p class="note">(Tổng giá phản ánh giá đơn hàng của bạn, bao gồm tất cả các loại thuế và phí)</p>
                </div>
                <?php
                    foreach($_SESSION['cart'] as $product){
                        echo '
                        <div class="product">
                            <img src="../public/image/'.$product['url'].'" alt="'.$product['ten_san_pham'].'">
                            <div class="product-info">
                                <h3>'.$product['ten_san_pham'].'</h3>
                                <p>'.number_format($product['gia'], 0, '',',').'đ</p>
                            </div>  
                        </div>
                        ';
                    }
                ?>
                <input type="hidden" name="tong_gia" value="<?php echo $total; ?>">
                
                <?php if (!empty($idDiscount)): ?>
                    <input type="hidden" name="id_khuyen_mai" value="<?php echo $idDiscount; ?>">
                <?php endif; ?>
                <button name="submit" class="confirm">Xác Nhận</button>
            </div>
        </div>
    </form>
</div>
<pre>
    <?php print_r($_SESSION['cart']) ?>
</pre>