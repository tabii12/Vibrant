
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
                        <label class="price-option">
                            <input type="radio" name="price" value="under500" id="under500">
                            <span>Giá dưới 500.000đ</span>
                        </label>
                        <label class="price-option">
                            <input type="radio" name="price" value="500to1mil" id="500to1mil">
                            <span>500.000đ - 1 triệu</span>
                        </label>
                        <label class="price-option">
                            <input type="radio" name="price" value="1to2mil" id="1to2mil">
                            <span>1 - 2 triệu</span>
                        </label>
                        <label class="price-option">
                            <input type="radio" name="price" value="2to3mil" id="2to3mil">
                            <span>2 - 3 triệu</span>
                        </label>
                        <label class="price-option">
                            <input type="radio" name="price" value="above3mil" id="above3mil">
                            <span>Giá trên 3 triệu</span>
                        </label>
                    </div>
        
                    <div class="divider"></div>
        
                    <!-- Brand Filter -->
                    <div class="filter-section">
                        <h2 class="filter-title">Brand</h2>
                        <?php 
                            foreach ($data['brands'] as $brand){
                                echo '
                                    <label class="brand-option">
                                        <input type="checkbox">
                                        <span>'.$brand['ten_thuong_hieu'].'</span>
                                    </label>
                                ';
                            }
                        ?>
                        
                    </div>
        
                    <div class="divider"></div>
        
                    <!-- Size Filter -->
                    
                </div>
            </aside>

            <main class="products-section">
                <div class="sort-bar">
                    <select class="sort-select">
                        <option>Thứ tự mặc định</option>
                        <option>Giá thấp đến cao</option>
                        <option>Giá cao đến thấp</option>
                        <option>Mới nhất</option>
                    </select>
                </div>

                <div class="products-grid">
                    <!-- Product Card Template - Repeat 8 times -->
                    
                    
                    <?php 
                        foreach ($data['products'] as $product){
                            echo '
                                <div class="product-card">
                                    <div class="img">
                                    <img src="../public/image/'.$product['url'].'" alt="Áo Khoác nam">
                                </div>
                                <button class="btn">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </button>
                                    <a href="#" class="product-title">'.$product['ten_san_pham'].'</a>
                                    <div class="rating">
                                        <div class="stars">★★★★★</div>
                                        <span class="review-count">(123)</span>
                                    </div>
                                    <div class="product-price">'.$product['gia'].'₫</div>
                                </div>
                            ';
                        }
                        $products = $data['products'];
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
        <section class="love-product">
            <h2 class="section-title">Có thể bạn sẽ thích</h2>
            <div class="product-love">
                <?php
                    foreach ($data['BCTT'] as $BCTT){
                        echo '
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
                                    <p class="price">'.$product['gia'].'đ</p>
                                </div>
                            </div>
                        ';

                    }
                ?>
            </div>
        </section>
    </div>

<script src="views/product/product.js"></script>

