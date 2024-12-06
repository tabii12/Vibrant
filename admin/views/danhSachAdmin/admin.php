<?php 
$data_infor = $data['Admin_infor'];
?>
<link rel="stylesheet" href="views/danhSachAdmin/admin.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<body>
    <div class="title_container">
    <h1>Admin</h1>
    <a href="index.php?page=add">Thêm Admin Mới +</a>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên </th>
                    <th>Chức vụ </th>
                    <th>E-Mail </th>
                    <th>SDT</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_infor as $infor): ?>
                    <tr>
                        <td><?php echo $infor['id']; ?></td> 
                        <td><?php echo $infor['ten_nguoi_dung']; ?></td>
                        <td><?php echo $infor['role']; ?></td>
                        <td><?php echo $infor['email']; ?></td>
                        <td><?php echo $infor['sdt']; ?></td>
                        <td>
                            <a href="index.php?page=edit&id=<?php echo $infor['id']; ?>" class="action-btn"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>

                            <form method="POST" action="index.php?page=user" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                <input type="hidden" name="delete_id" value="<?php echo $infor['id']; ?>">
                                <button class="action-btn" type="submit">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>


                        </td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
