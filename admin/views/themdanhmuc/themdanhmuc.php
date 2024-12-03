
<link rel="stylesheet" href="views\themdanhmuc\themdanhmuc.css">
<div class="container_">
        <div class="title">
        <h1>Thêm Danh Mục</h1>
        </div>
        <div class="add-container">
            <div class="add-box">
                <form action="index.php?page=addcate" method="post" enctype="multipart/form-data">
                    <label>Tên danh mục</label>
                    <input type="text" id="name-category" name="ten_danh_muc" placeholder="nhập tên danh mục">
                
                    <div class="add-buttons">
                    <button type="submit" class="save" name="them_cate" value="Lưu">Lưu</button>
                    <button type="button" class="cancel" onclick="window.history.back();">Hủy</button>
                    </div>
                </form>    
            </div>
        </div>