<?php
require_once 'models/DataBase.php';
class AddAdminController {
    public $add;
    public $data = [];

    public function __construct(){
        $this->add = new AddAdminModels();
    }

    public function RenderAddAdmin($data){
        require_once('views/AddAdmin/add_admin.php');
    }

    public function Add() {
        if (isset($_POST['submit'])) {
            if (isset($_POST['ten_nguoi_dung'], $_POST['email'], $_POST['phone'], $_POST['position'], $_POST['gender'], $_POST['username'], $_POST['password'], $_POST['again_password'])) {
                // Lấy dữ liệu từ form
                $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $position = $_POST['position'];
                $gender = $_POST['gender'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $againPassword = $_POST['again_password'];
    
                // Kiểm tra nếu mật khẩu và nhập lại mật khẩu khớp nhau
                if ($password !== $againPassword) {
                    echo "<script>alert('Mật khẩu nhập lại không khớp!'); window.location.href='?page=add';</script>";
                    return;
                }
                 // Gọi phương thức addAdmin từ AddAdminModels 
                 $result = $this->add->addAdmin($ten_nguoi_dung, $email, $phone, $position, $gender, $username, $password);

                if ($result) {
                    echo "<script>alert('Thêm admin thành công!'); window.location.href='?page=add';</script>";
                } else {
                    echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại!'); window.location.href='?page=add';</script>";
                }
            } else {
                echo "<script>alert('Dữ liệu không đầy đủ!'); window.location.href='?page=add';</script>";
            }
        } else {
            $this->RenderAddAdmin($this->data);
        }
    }
}
?>
