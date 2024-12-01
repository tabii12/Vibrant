<?php
require_once 'models/DataBase.php'; 

class UserModel {
    private $db;

    public function __construct() {
        // Khởi tạo đối tượng DataBase
        $this->db = new DataBase();
    }

    // Hàm lấy danh sách admin
    public function getAdmins() {
        // Truy vấn lấy tất cả admin từ bảng nguoidung
        $sql = "SELECT * FROM nguoidung WHERE role = 'admin'"; 
        return $this->db->getAll($sql);
    }

    
}
?>
