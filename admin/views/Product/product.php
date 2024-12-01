
    <link rel="stylesheet" href="views/Product/product.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<body>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    foreach($data['product_info'] as $product){
                        echo '
                        <tr>
                            <td><img src="../public/image/'.$product['url'].'" alt="'.$product['ten_san_pham'].'"></td>
                            <td>'.$product['ten_san_pham'].'</td>
                            <td>Thời trang nữ</td>
                            <td>'.$product['gia'].'₫</td>
                            <td>'.$product['so_luong'].'</td>
                            <td>
                                <button class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="delete-btn"><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<pre>
    <?php #print_r($data['product_info']) ?>
</pre>
