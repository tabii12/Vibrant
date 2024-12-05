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
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            echo "ID không hợp lệ!";
            return;
        }

        $this->data['Admin_info'] = $this->edit->getEditAdmins($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $position = $_POST['position'];
            $gender = $_POST['gender'];
            $username = $_POST['username'];
            $oldPassword = $_POST['old-password'];
            $newPassword = $_POST['new-password'];

            $updateSuccess = $this->edit->updateAdmin($id, $name, $email, $phone, $position, $gender, $username, $oldPassword, $newPassword);

            if ($updateSuccess) {
                echo "<script> alert('Cập nhật thông tin thành công!'); </script>";
            } else {
                echo "<script> alert('Mật khẩu cũ không đúng!'); </script>";
            }
        }

        $this->RenderEditAdmin($this->data);
    }
}


?>
