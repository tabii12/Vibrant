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
                                <td><a href="index.php?page=oderdetail&id_don_hang='.$infor['id'].'">'.$infor['id'].'</a></td> <!-- Nếu là mảng -->
                                <td><a href="index.php?page=oderdetail&id_don_hang='.$infor['id'].'">'.$infor['nguoi_nhan'].'</a></td>
                                <td><a href="index.php?page=oderdetail&id_don_hang='.$infor['id'].'">'.$infor['dia_chi'].'</a></td>
                                <td><a href="index.php?page=oderdetail&id_don_hang='.$infor['id'].'">'.$infor['ngay_dat_hang'].'</a></td> ';
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
