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

    public function addProduct($name, $category, $price, $quantity, $sale_price, $description, $images) {
        // Lưu sản phẩm vào bảng `sanpham`
        $sql = "INSERT INTO sanpham (ten_san_pham, id_danh_muc, gia, so_luong, gia_sale, mo_ta) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$name, $category, $price, $quantity, $sale_price, $description];
        $productId = $this->db->insert($sql, $params);

        // Lưu ảnh vào bảng `sanpham_img`
        foreach ($images as $image) {
            $sql = "INSERT INTO sanpham_img (id_sanpham, image_path) VALUES (?, ?)";
            $this->db->query($sql, [$productId, $image]);
        }
    }
}
