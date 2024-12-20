<?php 
$data_product = $data['Detail_product'];
$data_infor = $data['Infor'];
$data_BCTT = $data['BCTT'];
$data_comment = $data['comment'];
?>

<link rel="stylesheet" href="views/chitietsanpham/Chi_Tiet_San_Pham.css">
<div class="website">
            <ul>
            <li><a href="index.php">Trang chủ ></a></li>
            <li>Chi tiết sản phẩm</li>
            </ul>
        </div>
<div class="detail-container">

        
            <?php 
            echo'
            <div class="product-gallery">
    <img src="../public/image/'.$data_product[0]['url'].'" alt="Nike Air Max 90" class="main-image">
    
    <div class="thumbnail-row">
        <img src="../public/image/'.$data_product[0]['url'].'" alt="Nike Air Max 90 View 1" class="thumbnail active">
        <img src="../public/image/'.$data_product[1]['url'].'" class="thumbnail">
        <img src="../public/image/'.$data_product[2]['url'].'" class="thumbnail">
        <img src="../public/image/'.$data_product[3]['url'].'" class="thumbnail">
    </div>
</div>

<div class="product-info">
    <h1>'.$data_infor[0]['ten_san_pham'].'</h1>
    <span class="category">'.$data_infor[0]['ten_danh_muc'].'</span></br>
    <br>
    <span class="price">'.number_format($data_infor[0]['gia'], 0, ',', '.').'₫</span>'
            ;

            
            ?>
            
        
          
        

            <div class="size-section">
                <div class="size-label">Chọn Size:</div>
                <div class="size-grid">
                    <div class="size-box active">38</div>
                    <div class="size-box">39</div>
                    <div class="size-box">39.5</div>
                    <div class="size-box">40</div>
                    <div class="size-box ">40.5</div>
                    <div class="size-box">41</div>
                    <div class="size-box">41.5</div>
                    <div class="size-box">42</div>
                    <div class="size-box">42.5</div>
                    <div class="size-box">43</div>
                </div>
            </div>

            <?php
            echo'
            <div class="product-description">
            '.$data_infor[0]['mo_ta'].'
            </div>
            ';
            

            
        
            ?>

            <div class="action-buttons">
                <form action="index.php?page=cart" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $data_infor[0]['id']; ?>">
                    <button type="submit" name="submit" class="btn btn-cart">Thêm Vào Giỏ Hàng</button>
                </form>

                <form action="index.php?page=checkout" method="POST" style="display:inline;">
                    <input type="hidden" name="product_id" value="<?php echo $data_infor[0]['id']; ?>">
                    <button type="submit" name="buyNow" class="btn btn-buy">Mua Ngay</button>
                </form>
            </div>
            
        </div>
        
    </div>
    <div class="container1">
        <div class="ratings-section">
            <h3>Đánh Giá và Nhận Xét</h3>
            <div class="ratings-header">
                <div class="rating-overview">
                    <div class="rating-score">5/5</div>
                    <div class="rating-stars">★★★★★</div>
                </div>
                <div class="rating-bars">
                    <div class="rating-bar-container">
                        <span class="rating-label">5★</span>
                        <div class="rating-bar">
                            <div class="rating-bar-fill" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="rating-bar-container">
                        <span class="rating-label">4★</span>
                        <div class="rating-bar">
                            <div class="rating-bar-fill" style="width: 0%"></div>
                        </div>
                    </div>
                    <div class="rating-bar-container">
                        <span class="rating-label">3★</span>
                        <div class="rating-bar">
                            <div class="rating-bar-fill" style="width: 0%"></div>
                        </div>
                    </div>
                    <div class="rating-bar-container">
                        <span class="rating-label">2★</span>
                        <div class="rating-bar">
                            <div class="rating-bar-fill" style="width: 0%"></div>
                        </div>
                    </div>
                    <div class="rating-bar-container">
                        <span class="rating-label">1★</span>
                        <div class="rating-bar">
                            <div class="rating-bar-fill" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reviews-section">
            <?php 

                if (isset($_SESSION['user'])) { 
                    $tenNguoiDung = $_SESSION['user']['ten_dang_nhap'];
                   echo '
                    <h4>'.$tenNguoiDung.':</h4>
                    <div class="comment">
                    <form method="post" action="">
                        <select class="custom-rating" id="rating" name="rating">
                                <option value="5" name="rating">★★★★★</option>
                                <option value="4" name="rating">★★★★</option>
                                <option value="3" name="rating">★★★</option>
                                <option value="2" name="rating">★★</option>
                                <option value="1" name="rating">★</option>
                        </select>
                        <input type="text" name="noi_dung" placeholder="Nhập bình luận của bạn ở đây...">
                        <button type="submit" name="gui_bl">Gửi bình luận</button>
                    </form>
                    </div>
                   ';
                } else {
                    echo '<h4>hãy đăng nhập để bình luận</h4>';
                }


                foreach($data_comment as $comment) {

                    if ($comment['rating'] == 5) {
                        $stars = '★★★★★';
                    } elseif ($comment['rating'] == 4) {
                        $stars = '★★★★';
                    } elseif ($comment['rating'] == 3) {
                        $stars = '★★★';
                    } elseif ($comment['rating'] == 2) {
                        $stars = '★★';
                    } elseif ($comment['rating'] == 1) {
                        $stars = '★';
                    }


                    echo '
                    <div class="review-item">
                        <div class="review-header">
                        <h5>'.$comment['ten_dang_nhap'].'</h5>
                        <div class ="rating">
                        <h5>'.$stars.'</h5>
                        </div>
                        <div class="review-date">'.$comment['ngay_binh_luan'].'</div>
                        </div>
                        <div class="review-text">
                        '.$comment['noi_dung'].'
                        </div>
                    </div>';
                }
?>

            </div>
        </div>

        <div class="related-products">
            <h3>Có thể bạn sẽ thích</h3>
            <div class="product-grid">
            <?php
                foreach($data_BCTT as $BCTT) 
                echo'
                    <a href="index.php?page=detail&id_san_pham='.$BCTT['id'].'" class="product-card">
                        <img src="../public/image/'.$BCTT['url'].'" alt="Nike Air Low Premium">
                        <div class="product-info">
                            <h4>'.$BCTT['ten_san_pham'].'</h4>
                            <div class="product-price">'.number_format($BCTT['gia'], 0, ',', '.').'₫</div>
                        </div>
                    </a>

                ';
                ?>
                
            </div>
        </div>
    </div>

    <script>
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.querySelector('.main-image');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                mainImage.src = this.src.replace('70/70', '600/400');
            });
        });

        const sizeBoxes = document.querySelectorAll('.size-box');
        sizeBoxes.forEach(box => {
            box.addEventListener('click', function() {
                sizeBoxes.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        let currentImageIndex = 0;
        const images = document.querySelectorAll('.thumbnail');
        
        document.querySelector('.prev').addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            updateMainImage();
        });

        document.querySelector('.next').addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            updateMainImage();
        });

        function updateMainImage() {
            thumbnails.forEach(t => t.classList.remove('active'));
            images[currentImageIndex].classList.add('active');
            mainImage.src = images[currentImageIndex].src.replace('70/70', '600/400');
        }
    </script>
</body>
</html>
<?php 


?>