<?php
    $khuyenMais = $data['khuyenMai'];
?>
<link rel="stylesheet" href="views/khuyenMai/khuyenMai.css">
<div class="popup-form" id="popupForm">
      <h3>Thêm khuyến mãi</h3>
      <form id="promoForm" action="index.php?page=khuyenMai" method="post">
        <label for="promoCode">Mã khuyến mãi</label>
        <input type="text" id="promoCode" name="promoCode" placeholder="Nhập mã khuyến mãi" required />
  
        <label for="discount">Phần trăm giảm</label>
        <input type="number" id="discount" name="discount" placeholder="Nhập phần trăm giảm" required />
  
        <label for="startDate">Ngày bắt đầu</label>
        <input type="date" id="startDate" name="startDate" required />

        <label for="endDate">Ngày kết thúc</label>
        <input type="date" id="endDate" name="endDate" required />

        
            <input class="addButton" type="submit" value="Thêm" name="submit">
            <button type="button" class="cancel" id="cancelBtn">Hủy</button>
        
  
        
      </form>
    </div>

    <div class="container">
        <h2 class="mainTitle">Quản lý khuyến mãi</h2>

        <button id="addKhuyenMai">Thêm khuyến mãi</button>

        <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th id="a1">#</th>
                  <th id="a2">Mã giảm giá</th>
                  <th id="a3">Phần trăm giảm</th>
                  <th id="a4">Ngày bắt đầu</th>
                  <th id="a5">Ngày kết thúc</th>
                  <th id="a6">Hành động</th>
                </tr>
              </thead>
              <tbody id="khuyenMaiTable">
              <?php $i = 0;
                    foreach ($khuyenMais as $khuyenMai) {
                        $i += 1
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="code"><?php echo $khuyenMai['ma_nhap']; ?></td>
                            <td><?php echo $khuyenMai['phan_tram_giam']; ?>%</td>
                            <td><?php echo $khuyenMai['ngay_bat_dau']; ?></td>
                            <td><?php echo $khuyenMai['ngay_ket_thuc']; ?></td>
                            <td>
                                <form method="POST" action="index.php?page=khuyenMai">
                                    <input type="hidden" name="delete_id" value="<?php echo $khuyenMai['id']; ?>">
                                    <input class="delInput" type="submit" name="delete_submit" value="Xóa">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
              </tbody>
            </table>
        </div>
    </div>
                 
    <script src="https://kit.fontawesome.com/7d00a1e008.js" crossorigin="anonymous"></script>
    <script src="views/khuyenMai/khuyenMai.js"></script>
    

    <pre>
        <?php #print_r($data['khuyenMai']) ?>
    </pre>