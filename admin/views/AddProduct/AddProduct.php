<?php
$data_cate = $data['cate'];
?>
<link rel="stylesheet" href="views/AddProduct/AddProduct.css">
<body>
    <div class="title_container">
        <h1>THÊM SẢN PHẨM</h1>
    </div>
    <div class="form-container">
        <form class="form-content" method="POST" enctype="multipart/form-data" action="index.php?page=addproduct">
            <!-- Các trường nhập -->
            <section class="left">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="id_danh_muc">Danh mục</label>
                    <select id="id_danh_muc" name="id_danh_muc">
                        <?php foreach ($data_cate as $cate): ?>
                            <option value="<?= $cate['id'] ?>"><?= $cate['ten_danh_muc'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Giá</label>
                        <input type="text" class="form-control" name="gia" placeholder="Giá sản phẩm">
                    </div>
                    <div class="col">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="so_luong" placeholder="Số lượng sản phẩm" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label>Giá khuyến mại</label>
                    <input type="text" class="form-control" name="gia_sale" placeholder="Giá khuyến mại">
                </div>
            </section>
            <!-- Upload ảnh -->
            <section class="right">
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" name="mo_ta" placeholder="Mô tả sản phẩm"></textarea>
                </div>
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="form-group">
                        <label>Hình ảnh <?= $i ?></label>
                        <input type="file" class="form-control" name="image<?= $i ?>">
                    </div>
                <?php endfor; ?>
            </section>
            <!-- Nút -->
            <div class="button-group">
                <button type="submit" class="btn btn-save">Lưu</button>
                <button type="button" class="btn btn-cancel">Hủy</button>
            </div>
        </form>
    </div>
</body>
