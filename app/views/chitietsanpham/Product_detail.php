<?php 
$data_product = $data['Detail_product'];
$data_infor = $data['Infor'];
$data_BCTT = $data['BCTT'];
?>

<link rel="stylesheet" href="views/chitietsanpham/Chi_Tiet_San_Pham.css">
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
            
            
            <div class="price-container">
                <span class="price">'.$data_infor[0]['gia'].'₫</span>
            </div>'
            ;

            
            ?>
            
        
          
        

            <div class="size-section">
                <div class="size-label">Chọn Size:</div>
                <div class="size-grid">
                    <div class="size-box">38</div>
                    <div class="size-box">39</div>
                    <div class="size-box">39.5</div>
                    <div class="size-box">40</div>
                    <div class="size-box active">40.5</div>
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
          '.$data_infor[0]['gia'].'
            </div>
           ';
            

        
           ?>

           
            <div class="action-buttons">
                <button class="btn btn-cart">Thêm Vào Giỏ Hàng</button>
                <button class="btn btn-buy">Mua Ngay</button>
            </div>
        </div>
        
    </div>
    <div class="container1">
        <!-- Ratings Section -->
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

            <!-- Reviews Section -->
            <div class="reviews-section">
                <div class="review-item">
                    <div class="review-header">
                        <div class="review-stars">★★★★★</div>
                        <div class="review-date">1 tháng trước</div>
                    </div>
                    <div class="review-text">
                        Giày đẹp lắm ạ!! Em rất thích thiết kế này của nike ạ❤️
                    </div>
                </div>
                <div class="review-item">
                    <div class="review-header">
                        <div class="review-stars">★★★★★</div>
                        <div class="review-date">2 tháng trước</div>
                    </div>
                    <div class="review-text">
                        Chất lượng sản phẩm tuyệt vời, đóng gói cẩn thận, vận chuyển nhanh. Rất hài lòng với sản phẩm này.
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        <div class="related-products">
            <h3>Sản Phẩm Đã Xem</h3>
            <div class="product-grid">
            <?php
                foreach($data_BCTT as $BCTT) 
                echo'
                    <a href="index.php?page=detail&id_san_pham='.$BCTT['id'].'" class="product-card">
                        <img src="../public/image/'.$BCTT['url'].'" alt="Nike Air Low Premium">
                        <div class="product-info">
                            <h4>'.$BCTT['ten_san_pham'].'</h4>
                            <div class="product-price">'.$BCTT['gia'].'</div>
                        </div>
                    </a>
                ';
                ?>
                
            </div>
        </div>
    </div>

    <script>
        // Handle thumbnail clicks
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.querySelector('.main-image');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Remove active class from all thumbnails
                thumbnails.forEach(t => t.classList.remove('active'));
                // Add active class to clicked thumbnail
                this.classList.add('active');
                // Update main image (in real implementation, would use actual image URLs)
                mainImage.src = this.src.replace('70/70', '600/400');
            });
        });

        // Handle size selection
        const sizeBoxes = document.querySelectorAll('.size-box');
        sizeBoxes.forEach(box => {
            box.addEventListener('click', function() {
                sizeBoxes.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Handle slider buttons
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
// print_r($data_infor);
?>  