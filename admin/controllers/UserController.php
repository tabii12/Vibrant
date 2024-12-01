<?php
class UserController {
    public $user;   // Thuộc tính để lưu đối tượng UserModel
    public $data = [];

    // Hàm khởi tạo UserModel
    public function __construct() {
        $this->user = new UserModel();  // Lưu đối tượng UserModel vào thuộc tính $user
    }

    // Hàm hiển thị danh sách admin
    public function RenderAdmins($data) {
        require_once('views/danhSachAdmin/admin.php');  // Dữ liệu có thể được truyền vào view thông qua $this->data
    }

    // Hàm lấy thông tin admin và hiển thị
    public function ADmin() {
        if (isset($_POST['delete_id'])) {
            $id = (int)$_POST['delete_id'];  // Lấy ID cần xóa từ POST
            $this->deleteAdmin($id);         // Gọi phương thức xóa
        }
    
        $this->data['Admin_infor'] = $this->user->getAdmins();  // Lấy lại danh sách admin sau khi xóa
        $this->RenderAdmins($this->data);  // Hiển thị lại danh sách admin
    }
}
?>
