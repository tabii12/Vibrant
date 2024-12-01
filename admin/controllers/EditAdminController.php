<?php
class EditAdminController {
    public $edit;
    public $data = [];

    public function __construct() {
        $this->edit = new EditAdminModels();
    }

    public function RenderEditAdmin($data) {
        require_once('views/editAdmin/edit_admin.php');
    }

    public function Edit() {
        // Lấy id từ URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            echo "ID không hợp lệ!";
            return;
        }

        // Lấy thông tin admin từ DB
        $this->data['Admin_info'] = $this->edit->getEditAdmins($id);

        // Gọi phương thức render để hiển thị form chỉnh sửa thông tin
        $this->RenderEditAdmin($this->data);
    }
}


?>
