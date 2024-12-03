<?php
    if(isset($_GET['danh_muc'])){
        $danh_muc = $_GET['danh_muc'];
    }
?>
<link rel="stylesheet" href="views/product/product.css">
<div class="container11">
    <div class="breadcrumb">
        <a href="#">Trang Chủ</a> > <a href="#">Sản phẩm</a>
    </div>

    <div class="main-content">
        <aside class="sidebar">
            <div class="filters">
                <!-- Price Filter -->
                <div class="filter-section">
                    <h2 class="filter-title">Chọn mức giá</h2>
                    <form action="index.php?page=product&danh_muc=<?php echo $danh_muc ?>" method="post">
                        <label class="price-option">
                            <input type="submit" name="filter1" value="Giá  1 - 2 triệu" id="filter">
                            <!-- <span>1 - 2 triệu</span> -->
                        </label>
                        <label class="price-option">
                            <input type="submit" name="filter2" value="Giá  2 - 3 triệu" id="filter">
                            <!-- <span>2 - 3 triệu</span> -->
                        </label>
                        <label class="price-option">
                            <input type="submit" name="filter3" value="Giá trên 3 triệu" id="filter">
                            <!-- <span>Giá trên 3 triệu</span> -->
                        </label>
                    </form>
                </div>
    
                <div class="divider"></div>
    
                <!-- Brand Filter -->
                <div class="filter-section">
                    <h2 class="filter-title">Brand</h2>
                    <form action="index.php?page=product&danh_muc=<?php echo $danh_muc ?>" method="post">
                        <?php 
                            foreach ($data['brands'] as $brand){
                                echo '
                                    <label class="brand-option">
                                        <input type="submit" name="brand'.$brand['id'].'" value="'.$brand['ten_thuong_hieu'].'" id="filter">
                                    </label>
                                ';
                            }
                        ?>
                        
                    </form>
                    
                    
                </div>
    
                <div class="divider"></div>
    
                <!-- Size Filter -->
                
            </div>
        </aside>

        <main class="products-section">
            <div class="sort-bar">
                <select class="sort-select" id="sortSelect">
                    <option value="default">Thứ tự mặc định</option>
                    <option value="lowToHigh">Giá thấp đến cao</option>
                    <option value="highToLow">Giá cao đến thấp</option>
                </select>
            </div>

            <div class="products-grid" id="productsGrid">
            <?php 
                foreach ($data['products'] as $product) {
                    
                    $formatted_price = number_format($product['gia'], 0, ',', '.');
                    
                    echo '
                        <div class="product-card" data-price="'.$product['gia'].'">
                            <div class="img">
                            <img src="../public/image/'.$product['url'].'" alt="Áo Khoác nam">
                            </div>
                            <button class="btn">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0000 6.364L12 20.364l7.682-7.682a4.5 4.5 0000-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0000-6.364 0z"/>
                                </svg>
                            </button>
                            <a href="index.php?page=detail&id_san_pham='.$product['id'].'" class="product-title">'.$product['ten_san_pham'].'</a>
                            <div class="rating">
                                <div class="stars">★★★★★</div>
                                <span class="review-count">(123)</span>
                            </div>
                            <div class="product-price">'.$formatted_price.'₫</div>
                        </div>
                    ';
                }
                if(empty($data['products'])){
                    echo '<p style="color: red; font-size: 14px; margin-top: 5px;">Không có sản phẩm</p>';
                }
            ?>
            </div>
            
            <div class="pagination">
                <div class="page-item">←</div>
                <div class="page-item active">1</div>
                <div class="page-item">2</div>
                <div class="page-item">3</div>
                <div class="page-item">4</div>
                <div class="page-item">5</div>
                <div class="page-item">→</div>
            </div>
        </main>
    </div>
</div>
<section class="love-product">
    <h2><div class="section-title" style="color: #004C59;">Có thể</div> <div class="section-title" style="color: #F15E2C;" >bạn sẽ thích </div></h2>
    <div class="product-love">
    <?php
               foreach ($data['BCTT'] as $BCTT) {
                // Định dạng giá
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

<script src="views/product/product.js"></script>
