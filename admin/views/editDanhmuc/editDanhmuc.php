<?php 
$data_cate = $data['danh_muc'];
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="views/editDanhmuc/editDanhmuc.css">

<div class="container_">
    <div class="title">
        <h1>Chỉnh sửa danh mục</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="edit-container">
            <div class="edit-box">
                <label for="name-category">Tên danh mục</label>
                <input type="text" id="name-category" name="ten_danh_muc" placeholder="<?php echo $data_cate[0]['ten_danh_muc']?>" value="<?php echo $data_cate[0]['ten_danh_muc']; ?>">
                <div class="edit-buttons">
                    <button type="submit" class="save">Lưu</button>
                    <button type="button" class="cancel"><a href="Index.php?page=cate">Hủy</a></button>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>
<?php 
