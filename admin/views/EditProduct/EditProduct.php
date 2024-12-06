<?php 
     $editproduct_info = $data['editproduct_info']; 
     $product_info = $editproduct_info[0];

     $image_urls = array_column($editproduct_info, 'url'); 
?>
<link rel="stylesheet" href="views/EditProduct/EditProduct.css">
<body>
<div class="title_container">
    <h1>CHỈNH SỬA SẢN PHẨM</h1>
    </div>
    <div class="form-container">        
        <form class="form-content" method="POST">
            <section class="left">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="<?php echo $product_info['ten_san_pham']; ?>">
                </div>

                <div class="form-group">
                    <label>ID Danh mục</label>
                    <input type="number" class="form-control" name="category" placeholder="Chọn danh mục" value="<?php echo $product_info['id_danh_muc']; ?>">
                </div>

                <div class="row">
                    <div class="col">
                        <label>Giá</label>
                        <input type="text" class="form-control" name="price" placeholder="Giá sản phẩm" value="<?php echo $product_info['gia']; ?>">
                    </div>
                    <div class="col">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Số lượng sản phẩm" value="<?php echo $product_info['so_luong']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Giá khuyến mại (nếu có)</label>
                    <input type="text" class="form-control" name="sale_price" placeholder="Giá sản phẩm khuyến mại" value="<?php echo $product_info['gia_sale']; ?>">
                </div>
            </section>
            
            <section class="right">
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" name="description" placeholder="Nhập mô tả sản phẩm" ><?php echo $product_info['mo_ta']; ?></textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Góc Nhìn Chính</label> <br>  
                        <img style="width:50px; height:50px; border-radius:5px; border=1px solid gray;" src="../public/image/<?php echo $image_urls[0] ?>" alt="">    
                        <input  type="file" class="form-control" name="image1" >
                        
                    </div>
                    <div class="col">
                        <label>Góc Nhìn 2</label> <br>
                        <img style="width:50px; height:50px; border-radius:5px;" src="../public/image/<?php echo $image_urls[1] ?>" alt="">
                        <input type="file" class="form-control" name="image2">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Góc Nhìn 3</label> <br>
                        <img style="width:50px; height:50px; border-radius:5px;" src="../public/image/<?php echo $image_urls[2] ?>" alt="">
                        <input type="file" class="form-control" name="image3">
                    </div>
                    <div class="col">
                        <label>Góc Nhìn 4</label> <br>
                        <img style="width:50px; height:50px; border-radius:5px;" src="../public/image/<?php echo $image_urls[3] ?>" alt="">
                        <input type="file" class="form-control" name="image4">
                    </div>
                </div>
            </section>

            <div class="button-group">
                <button type="submit" class="btn btn-save">Lưu</button>
                <button type="button" class="btn btn-cancel">Hủy</button>
            </div>
        </form>
    </div>
</body>
<pre>
   <?php  #print_r($image_urls[0]) ?>
</pre>