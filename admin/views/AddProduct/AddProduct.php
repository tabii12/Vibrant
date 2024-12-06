<?php
$data_cate = $data['cate'];
$data_brand = $data['brand'];
?>
<link rel="stylesheet" href="views/AddProduct/AddProduct.css">
<body>
    <div class="title_container">
        <h1>THÊM SẢN PHẨM</h1>
    </div>
    <div class="form-container">
        <form class="form-content" method="POST" enctype="multipart/form-data" action="index.php?page=addproduct">
            <section class="left">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="form-group" style="display:flex; gap: 237px">
                    <div class="left">
                        <label for="id_danh_muc">Danh mục</label>
                        <select id="id_danh_muc" name="id_danh_muc">
                            <?php foreach ($data_cate as $cate): ?>
                                <option value="<?= $cate['id'] ?>"><?= $cate['ten_danh_muc'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="right">
                        <div class="left">
                            <label for="id_thuong_hieu">thương hiệu</label>
                            <select id="id_thuong_hieu" name="id_thuong_hieu">
                                <?php foreach ($data_brand as $brand): ?>
                                    <option value="<?= $brand['id'] ?>"><?= $brand['ten_thuong_hieu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Giá</label>
                        <input type="text" class="form-control" name="gia" placeholder="Giá sản phẩm" required>
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
            <section class="right">
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" name="mo_ta" placeholder="Mô tả sản phẩm" required></textarea>
                </div>
                    <div class="form-group">
                        <!-- <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="image" multiple> -->
                        <label for="images">Chọn 4 ảnh:</label>
                        <input type="file" name="images[]" class="form-control" id="images" accept="image/*" multiple required>
                        <?php if (!empty($error_image_message)): ?>
                            <div class="error-message">
                                <p style="color: green; padding-bottom: 10px;"><?php echo $error_image_message; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
            </section>
            <div class="button-group">
                <button type="submit" class="btn btn-save" name="submit">Lưu</button>
                <button type="button" class="btn btn-cancel" name="cancel">Hủy</button>
            </div>
        </form>
    </div>
</body>
<?php if (!empty($error_message)): ?>
    <div class="error-message">
        <p style="color: green; padding-bottom: 10px;"><?php echo $error_message; ?></p>
    </div>
<?php endif; ?>