<?php
class UserController {
    public $user;  
    public $data = [];

    // Hàm khởi tạo UserModel
    public function __construct() {
        $this->user = new UserModel();
    }

    // Hàm hiển thị danh sách admin
    public function RenderAdmins($data) {
        require_once('views/danhSachAdmin/admin.php'); 
    }

    // Hàm lấy thông tin admin và hiển thị
    public function ADmin() {
        if (isset($_POST['delete_id'])) {
            $id = (int)$_POST['delete_id'];  // Lấy ID cần xóa từ POST
            $this->deleteAdmin($id);     
        }
    
        $this->data['Admin_infor'] = $this->user->getAdmins(); 
        $this->RenderAdmins($this->data);  
    }

    // Hàm xóa admin
    private function deleteAdmin($id) {
        // Gọi phương thức deleteAdmin trong model để thực hiện xóa
        if ($this->user->deleteAdmin($id)) {
            echo "<script> alert('Xóa admin thành công!'); window.location.href='index.php?page=user'; </script>";
        } else {
            echo "<script> alert('Xóa admin không thành công!'); window.location.href='index.php?page=user'; </script>";
        }
    }
}

?>
