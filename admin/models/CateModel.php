<?php 

class cateModel {
    private $db;

    public function __construct() {
        // Giả sử DataBase là lớp kết nối cơ sở dữ liệu của bạn
        $this->db = new DataBase();
    }

   
    public function addcate($data_cate) {
        // Kiểm tra dữ liệu đầu vào
        if (empty($data_cate['ten_danh_muc'])) {
            echo "Tên danh mục không được để trống!";
            return false;
        }

        // Chuẩn bị câu lệnh SQL
        $sql = "INSERT INTO danhmuc (ten_danh_muc) VALUES (?)";

        // Gán tham số vào mảng params
        $params = [$data_cate['ten_danh_muc']];

        // Thực thi truy vấn và trả kết quả
        return $this->db->insert($sql, $params);
    }
}
