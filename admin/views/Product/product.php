
    <link rel="stylesheet" href="views/Product/product.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<body>
<div class="title_container">
    <h1>SẢN PHẨM</h1>
    <a href="index.php?page=addproduct">Thêm Sản Phẩm +</a>
    </div>
    <div class="table-container">
    <?php

    $items_per_page = 10;
    $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
    $total_items = count($data['product_info']);
    $total_pages = ceil($total_items / $items_per_page);

    $start = ($current_page - 1) * $items_per_page;
    $end = $start + $items_per_page;
    if($end > $total_items) $end = $total_items;
    ?>

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
            for($i = $start; $i < $end; $i++) {
                $product = $data['product_info'][$i];
                echo '
                <tr>
                    <td><img src="../public/image/'.$product['url'].'" alt="'.$product['ten_san_pham'].'"></td>
                    <td>'.$product['ten_san_pham'].'</td>
                    <td>Thời trang nữ</td>
                    <td>'.$product['gia'].'₫</td>
                    <td>'.$product['so_luong'].'</td>   
                    <td>
                        <a href="?page=editproduct&id='.$product['id'].'">
                            <button class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                         <a href="index.php?page=product&id='.$product['id'].'">
                        <button class="delete-btn"><i class="fa-regular fa-trash-can"></i></button>
                        </a>
                    </td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php
        function getPageUrl($page) {
            $params = $_GET;
            $params['trang'] = $page;
            return '?' . http_build_query($params);
        }

        if($current_page > 1) {
            echo '<a href="'.getPageUrl($current_page-1).'" class="page-link">Trước</a>';
        }

        $range = 2;
        
        for($i = 1; $i <= $total_pages; $i++) {
            if($i == 1 || $i == $total_pages || 
               ($i >= $current_page - $range && $i <= $current_page + $range)) {
                if($i == $current_page) {
                    echo '<span class="page-link active">'.$i.'</span>';
                } else {
                    echo '<a href="'.getPageUrl($i).'" class="page-link">'.$i.'</a>';
                }
            }
            elseif($i == 2 || $i == $total_pages - 1) {
                echo '<span class="page-dots">...</span>';
            }
        }

        if($current_page < $total_pages) {
            echo '<a href="'.getPageUrl($current_page+1).'" class="page-link">Sau</a>';
        }
        ?>
    </div>
</div>
</body>
</html>
<pre>
    <?php #print_r($data['product_info']) ?>
</pre>
