<?php 
$data_cate = $data['cate'];

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="views/danhmuc/danh_muc.css">
<div class="container-category">
    <div class="form-table-category">
        <div class="name-table-category">
            <span>Danh Mục Sản Phẩm</span>
            <table>
                <tr>
                    <th>Tên Danh Mục</th>
                    <th></th>
                </tr>
                <?php 
                foreach ($data_cate as $cate){
                    echo'
                    <tr>
                        <td>'.$cate['ten_danh_muc'].'</td>
                        
                        <td>
                            <button class="btn-edit"><a href="index.php?page=editcate&id_danh_muc='.$cate['id'].'"> Chỉnh sửa</a></button>
                            <button class="btn-remove"><a href="index.php?page=cate&id='.$cate['id'].'">Xóa</a></button>
                        </td>
                    </tr>';
                }
                ?>
               
            </table>
            <div class="form-btn-add-new-category">
                    <button class="btn-add-new-category"><a href="index.php?page=addcate">Thêm danh mục sản phẩm</a></button>
                </div>
        </div>
    </div>
</div>
</body>
</html>
<?php 
print_r($data['cate']);
?>