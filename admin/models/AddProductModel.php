<?php
require_once 'models/DataBase.php';

class AddProductModel {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function getCate() {
        $sql = "SELECT * FROM danhmuc";
        return $this->db->getAll($sql);
    }
    public function getBrand() {
        $sql = "SELECT * FROM thuonghieu";
        return $this->db->getAll($sql);
    }

    public function addProduct($data) {
        // Lưu sản phẩm vào bảng `sanpham`
        $sql = "
            INSERT INTO sanpham (ten_san_pham, id_danh_muc, id_thuong_hieu, gia, so_luong, gia_sale, mo_ta) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ";
        $params = [
            $data['name'],
            $data['category'],
            $data['brand'] = $_POST['id_thuong_hieu'],
            $data['price'],
            $data['quantity'],
            $data['sale_price'],
            $data['description'],
        ];
        $result = $this->db->insert($sql, $params);
        return $result;
    }

    public function addImages($id_sp, $url){
        $sql = "
            INSERT INTO sanpham_img (id_san_pham, url)
            VALUES (?, ?)
        ";
        $params = [
            $id_sp,
            $url
        ];
        $result = $this->db->insert($sql, $params);
        return $result;
    }
}
