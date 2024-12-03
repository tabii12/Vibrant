<?php
class ThanhToanController {
    private $thanh_toan_model;
    private $data = []; // Khởi tạo mảng data rỗng

    public function __construct() {
        $this->thanh_toan_model = new thanh_toan_model; // Khởi tạo model
    }

    // Chỉnh sửa phương thức renderview để nhận tham số
    public function renderview($data) {
        // Truyền dữ liệu vào view
        require_once 'views\thanhtoan\thanh_toan.php'; // Gọi view mà không cần tham số
    }

    public function donhang() {
        // Kiểm tra nếu có id_nguoi_dung trong GET
        if (isset($_GET['id_nguoi_dung'])) {
            $id_nguoi_dung = $_GET['id_nguoi_dung']; 
            
            // Lấy thông tin người dùng từ model và lưu vào $this->data
            $this->data['user'] = $this->thanh_toan_model->getUser($id_nguoi_dung);
            $this->data['product'] = $this->thanh_toan_model->getProduct($id_nguoi_dung);
            // Gọi phương thức renderview và truyền dữ liệu vào
            $this->renderview($this->data);
        } else {
            echo 'Người dùng không tồn tại';
        }
    }
    

}
?>
