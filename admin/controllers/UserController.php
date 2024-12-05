<?php
class UserController {
    public $user;  
    public $data = [];

    public function __construct() {
        $this->user = new UserModel();
    }

    public function RenderAdmins($data) {
        require_once('views/danhSachAdmin/admin.php'); 
    }

    public function ADmin() {
        if (isset($_POST['delete_id'])) {
            $id = (int)$_POST['delete_id']; 
            $this->deleteAdmin($id);     
        }
    
        $this->data['Admin_infor'] = $this->user->getAdmins(); 
        $this->RenderAdmins($this->data);  
    }

    private function deleteAdmin($id) {
        if ($this->user->deleteAdmin($id)) {
            echo "<script> alert('Xóa admin thành công!'); window.location.href='index.php?page=user'; </script>";
        } else {
            echo "<script> alert('Xóa admin không thành công!'); window.location.href='index.php?page=user'; </script>";
        }
    }
}

?>
