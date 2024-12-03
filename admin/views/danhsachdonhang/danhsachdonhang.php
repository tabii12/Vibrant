<?php 
$data_Infor = $data['Oder'];
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="views\danhsachdonhang\Danh_Sach_Don_Hang.css">
<div class="oder-container">
        <div class="title">
            <h1>Danh Sách Oder</h1>
            </div>
        <div class="table-container">
            <div class="filter-container">
                <div class="filter">
                    <div class="filter-icon"><i class="fa-sharp fa-solid fa-filter"></i></div>
                    <div class="filter-text">Lọc</div>
                    <div class="filter-day dropdown">
                        Ngày <i class="fa-solid fa-chevron-down"></i>

                    </div>
                    <div class="filter-category dropdown">
                        Danh Mục <i class="fa-solid fa-chevron-down"></i>
                        <ul class="dropdown-menu">
                            <li><a href="#">Giày Nam</a></li>
                            <li><a href="#">Giày Nữ</a></li>
                            <li><a href="#">Giày Thể Thao</a></li>
                            <li><a href="#">Giày Đặc Biệt</a></li>
                        </ul>
                    </div>
                    <div class="filter-status dropdown">
                        Trạng thái <i class="fa-solid fa-chevron-down"></i>
                        <ul class="dropdown-menu">
                            <li><a href="#">Giao Thành công</a></li>
                            <li><a href="#">Đang Giao</a></li>
                            <li><a href="#">Giao Thất Bại</a></li>
                        </ul>
                    </div>
                    <div class="filter-reload">
                        <i class="fa-solid fa-rotate-right"></i> Làm lại
                    </div>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Địa Chỉ</th>
                        <th>Ngày</th>
                        <th>Startus</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($data_Infor as $infor) {
                        echo '
                            <tr>
                                <td>'.$infor['id'].'</td> <!-- Nếu là mảng -->
                                <td>'.$infor['nguoi_nhan'].'</td>
                                <td>'.$infor['dia_chi'].'</td>
                                <td>'.$infor['ngay_dat_hang'].'</td> ';
                        if($infor['trang_thai'] == 'đã thanh toán'){
                            echo'<td><div class="table-status-success">'.$infor['trang_thai'].'</div></td>
                                  </tr>';
                        }else echo'<td><div class="table-status-fail">'.$infor['trang_thai'].'</div></td>
                                  </tr>';
                                
                            
                       
                    }
                    ?>
                </tbody>
            </table>
        </div>
</div>
</body>
</html>
