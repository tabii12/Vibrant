<?php 

class editcateModel {
    private $db;

    public function __construct() {
        // Giả sử DataBase là lớp kết nối cơ sở dữ liệu của bạn
        $this->db = new DataBase();
    }

    public function getcate($id) {
       
    
        $sql = "SELECT * FROM danhmuc WHERE id = $id";
        return $this->db->getAll($sql);
    }
    
    public function updateCate($id, $ten_danh_muc) {
        if (!is_numeric($id) || empty($ten_danh_muc)) {
           
            echo "<script>alert('Tên danh mục không được để trống!');</script>";
            return false;
        }
        
        $sql = "UPDATE danhmuc SET ten_danh_muc = ? WHERE id = ?";
        $params = [$ten_danh_muc, $id];
        return $this->db->query($sql, $params); // Sử dụng prepared statement
    }
}