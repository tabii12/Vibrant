<?php 

class cateModel {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function getcate() {
        $sql = "SELECT * FROM danhmuc"; 
        return $this->db->getAll($sql);
    }

   
    public function addcate($data_cate) {
        if (empty($data_cate['ten_danh_muc'])) {
            echo "<script>alert('Tên danh mục không được để trống!');</script>";
            return false;
        } else {
        $sql = "INSERT INTO danhmuc (ten_danh_muc) VALUES (?)";
        $params = [$data_cate['ten_danh_muc']];

        return $this->db->insert($sql, $params);
        }
    }

    public function deletecate($cateid) {
    
    $sql = "DELETE FROM danhmuc WHERE id = ?";
    return $this->db->query($sql, [$cateid]);
    }

}
