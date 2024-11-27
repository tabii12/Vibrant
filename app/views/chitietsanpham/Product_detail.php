<link rel="stylesheet" href="views/chitietsanpham/Chi_Tiet_San_Pham.css">;
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<div class="product-container">
        <?php 
        $product_img = $data['Detail_product'];
        $productInfor = $data['Infor'];
        $product_love = $data['love_product'];
        $product_Comment = $data['comment'];
              
        if (is_array($product_img)  && is_array($productInfor)) {
            echo '<div class="product-images">
                    <div class="main-image">
                        <img src="../public/image/'.$product_img[0]['url'].'" alt="Main Product Image">
                    </div>
                    <div class="thumbnails">
                    <img  class="select-img" src="../public/image/'.$product_img[0]['url'].'" alt="Thumbnail 1">
                    <img src="../public/image/'.$product_img[1]['url'].'" alt="Thumbnail 2">
                    <img src="../public/image/'.$product_img[2]['url'].'" alt="Thumbnail 3">
                    <img src="../public/image/'.$product_img[3]['url'].'" alt="Thumbnail 4">
                    </div>

                    <div class="description"> 
                    <p>'.$productInfor[0]['mo_ta'].'</p>
                   </div>
                </div>
                
                <div class="product-details">
            <h2>'.$productInfor[0]['ten_san_pham'].'</h2>
            <p class="category">Áo Nam</p>
            <p class="price"><span class="current-price">4,366,000₫</span> <span class="old-price">4,568,000₫</span></p>
            <hr>';
            };
        ?>
        
            <div class="size-options">
                <p>Chọn Theo Size:</p>
                <div class="sizes">
                    <span>36</span>
                    <span>37</span>
                    <span>38</span>
                    <span>38,5</span>
                    <span>39</span>
                    <span>39,5</span>
                    <span>40</span>
                    <span>40,5</span>
                    <span>41</span>
                    <span>41,5</span>
                    <span>42</span>
                    <span>42,5</span>
                    <span>43</span>
                    
                    
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="buttons">
                <div class="add-to-cart"><a href="index.php?page=cart.php&id=<?php echo $productInfor[0]['id']; ?>">Thêm Vào Giỏ Hàng</a></div>
                <div class="buy-now">Mua Ngay</div>
            </div>
        </div>
    </div>
    <div class="stars-content">
        
        <div class="review-section">
            <div class="rating">
                <div class="rating-header">Đánh Giá Và Nhận Xét</div>
                <div class="rating-overall">
                    5/5
                    <div class="stars">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                </div>
                <div class="rating-bars">
                    <div class="rating-row">
                        <span>5</span>
                        <div class="bar"><div class="fill" style="width: 100%;"></div></div>
                        <span class="rating-count">2 Đánh Giá</span>
                    </div>
                    <div class="rating-row">
                        <span>4</span>
                        <div class="bar"></div>
                        <span class="rating-count">0 Đánh Giá</span>
                    </div>
                    <div class="rating-row">
                        <span>3</span>
                        <div class="bar"></div>
                        <span class="rating-count">0 Đánh Giá</span>
                    </div>
                    <div class="rating-row">
                        <span>2</span>
                        <div class="bar"></div>
                        <span class="rating-count">0 Đánh Giá</span>
                    </div>
                    <div class="rating-row">
                        <span>1</span>
                        <div class="bar"></div>
                        <span class="rating-count">0 Đánh Giá</span>
                    </div>
                </div>
            </div>
                <!-- phan binh luan -->
                <div class="comment">
                <?php 

                   if(isset($product_Comment) && !empty($product_Comment)){
                    foreach ($product_Comment as $Comment) {
                        echo '
                        <div class="comment-name">
                            <h4>' . $Comment['ten_nguoi_dung'] . '</h4>
                            <div class="comment-content">
                                <div class="stars">';
                        
                        // Hiển thị sao theo rating
                        $rating = isset($Comment['rating']) ? $Comment['rating'] : 0; // Mặc định rating là 0 nếu không tồn tại
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span>★</span>'; // Sao đầy
                            } else {
                                echo '<span>☆</span>'; // Sao rỗng
                            }
                        }

                        echo '</div>
                                <p><strong>Nhận Xét:</strong> ' . $Comment['noi_dung'] . '</p>
                            </div>
                        </div>';
                     }}else echo'<div class="thongbao"><h3> chưa có Comment nào </h3></div>' 
                     ?>

               
                    
                </div>
        
            
    </div>  
            
        
    
        <div class="product-watched">
            <h3>Sản Phẩm Có Thể Thích</h3>
            <?php
            foreach($product_love as $product){
                echo'
                <div class="product-clone">
                    <img src="../public/image/'.$product['url'].'" alt="'.$product['ten_san_pham'].'    ">
                    <div class="product-info">
                        <h4>'.$product['ten_san_pham'].'</h4>
                        <div class="price">'.$product['gia'].'đ</div>
                    </div>
                </div>
                ';
            }
            ?>
            
                
                <!-- <div class="product-clone">
                    <img src="img/test.jpg" alt="Adidas Stan Smith">
                    <div class="product-info">
                        <h4>Adidas Stan Smith</h4>
                        <div class="price">2,600,000đ</div>
                    </div> 
                </div> -->
            </div>
        </div>
        
    </div>
</div>

    <button id="scrollTopBtn" onclick="scrollToTop()">Lên đầu trang</button>
    
    <script>
     const mainImage = document.querySelector(".main-image img");
const thumbnails = document.querySelectorAll(".thumbnails img");

thumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener("click", function () {
        mainImage.src = this.src;

       
        thumbnails.forEach((thumb) => thumb.classList.remove("select-img"));


        this.classList.add("select-img");
    });
});

    </script>
<?php 
// print_r($product_Comment);
//

?>
