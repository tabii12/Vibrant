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
            <div class="infor-text">Đức Duy</div>
            <div class="infor-text">123 Quang Trung</div>
            <div class="infor-text-2">02-10-2024</div>

        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Đơn Hàng</th>
                    <th>Danh Mục</th>
                    <th>Startus</th>
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Áo Form Rộng</td>
                    <td>Thời Trang Nam</td>
                    <td><div class="table-status-success">Đã Đóng Gói</div></td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Áo Hoodie Black</td>
                    <td>Thời Trang Nam</td>
                    <td><div class="table-status-fail">Chưa Đóng Gói</div></td>
                </tr>
                  
            </tbody>
        </table>
    </div>
</div>
<?php 
print_r($data_Infor);

?>