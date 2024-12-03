<?php 
$customer_info = $data['customer_info'];
?>
<link rel="stylesheet" href="views/KhachHang/KhachHang.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="title_container">
    <h1>KHÁCH HÀNG</h1>
    </div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ Tên <i class="fa-solid fa-filter filter"></i></th>
                <th>E-Mail <i class="fa-solid fa-filter filter"></i></th>
                <th>Ngày sinh</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($customer_info as $info): ?>
                <tr>
                    <td><?php  echo $info['id']  ?></td>
                    <td><?php  echo $info['ten_nguoi_dung']  ?></td>
                    <td><?php  echo $info['email']  ?></td>
                    <td><?php  echo $info['ngay_sinh']  ?></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <button class="btn">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">/-strong/-heart:>:o:-((:-h <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="pagination">
        <button class="page-item">«</button>
        <button class="page-item active">1</button>
        <button class="page-item">2</button>
        <button class="page-item">3</button>
        <button class="page-item">4</button>
        <button class="page-item">»</button>
    </div>
</div>