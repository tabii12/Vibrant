<?php
require_once 'models/DataBase.php';

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function getProducts() {
        $sql = "
            SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
            FROM sanpham sp
            JOIN (
                SELECT id_san_pham, MIN(id) AS min_id
                FROM sanpham_img
                GROUP BY id_san_pham
            ) si_min ON sp.id = si_min.id_san_pham
            JOIN sanpham_img si ON si.id = si_min.min_id;
        ";
        return $this->db->getAll($sql);
    }

    public function deleteProductImages($productId) {
        
        $sql = "SELECT url FROM sanpham_img WHERE id_san_pham = ?";
        $images = $this->db->getAll($sql, [$productId]);
    

        foreach ($images as $image) {
            $imagePath = "../public/image/" . $image['url'];
            unlink($imagePath);
        }
    
        
        $sqlDeleteImages = "DELETE FROM sanpham_img WHERE id_san_pham = ?";
        $this->db->query($sqlDeleteImages, [$productId]);
    
        return true;
    }
    

    public function deleteProductById($productId) {
        $sql = "DELETE FROM sanpham WHERE id = ?";
        $this->db->query($sql, [$productId]);
        return true;
    }
}
?>
