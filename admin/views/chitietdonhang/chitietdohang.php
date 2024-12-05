<?php 
$data_Infor = $data['Oder_Infor'];

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="views\chitietdonhang\chitietdonghang.css">
<div class="oder-container">
    <div class="title">
        <h1>Chi Tiết Oder</h1>
        </div>
    <div class="table-container">
        <div class="infor-container">
            <div class="infor-text"><?php echo $data_Infor[0]['nguoi_nhan']?></div>
            <div class="infor-text"><?php echo $data_Infor[0]['dia_chi']?></div>
            <div class="infor-text-2"><?php echo $data_Infor[0]['ngay_dat_hang']?></div>

        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Đơn Hàng</th>
                    <th>số Lượng</th>
                    <th>giá</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($data_Infor as $infor) {
                        echo '
                        <tr>
                            <td>'.$infor['id'].'</td>
                            <td>'.$infor['ten_san_pham'].'</td>
                            <td>'.$infor['ten_danh_muc'].'</td>
                            <td>'.$infor['gia'].'</td>
                        </tr>
                        
                        ';
                }
                ?>
                  
            </tbody>
        </table>
    </div>
</div>
<?php 


?>