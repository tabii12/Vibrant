<link rel="stylesheet" href="views/Addproduct/AddProduct.css">
<body>
<div class="title_container">
    <h1>THÊM SẢN PHẨM</h1>
    </div>
    <div class="form-container">        
        <form class="form-content" method="POST" enctype="multipart/form-data">
            <section class="left">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="form-group">
                    <label>Danh mục</label>
                    <input type="text" class="form-control" name="category" placeholder="Chọn danh mục">
                </div>

                <div class="row">
                    <div class="col">
                        <label>Giá</label>
                        <input type="text" class="form-control" name="price" placeholder="Giá sản phẩm">
                    </div>
                    <div class="col">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Số lượng sản phẩm" value="1">
                    </div>
                </div>

                <div class="form-group">
                    <label>Giá khuyến mại (nếu có)</label>
                    <input type="text" class="form-control" name="sale_price" placeholder="Giá sản phẩm khuyến mại">
                </div>
            </section>
            
            <section class="right">
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" name="description" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Góc Nhìn Chính</label>
                        <input type="file" class="form-control" name="image1">
                    </div>
                    <div class="col">
                        <label>Góc Nhìn 2</label>
                        <input type="file" class="form-control" name="image2">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Góc Nhìn 3</label>
                        <input type="file" class="form-control" name="image3">
                    </div>
                    <div class="col">
                        <label>Góc Nhìn 4</label>
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
