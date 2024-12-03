<?php
require_once 'models/DataBase.php';

class AddProductModel{
    private $db;

    public function __construct(){
        $this->db = new DataBase();
    }

    public function addProduct($name, $category, $price, $quantity, $sale_price, $description, $image1, $image2, $image3, $image4){
        $sql = "
            INSERT INTO sanpham (ten_san_pham, id_danh_muc, gia, so_luong, gia_sale, mo_ta, image1, image2, image3, image4)
            VALUES (:ten_san_pham, :id_danh_muc, :gia, :so_luong, :gia_sale, :mo_ta, :image1, :image2, :image3, :image4)
        ";
        
        $params = [
            ':ten_san_pham' => $name,
            ':id_danh_muc' => $category,
            ':gia' => $price,
            ':quantity' => $quantity,
            ':gia_sale' => $sale_price,
            ':mo_ta' => $description,
            ':image1' => $image1,
            ':image2' => $image2,                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
            ':image3' => $image3,
            ':image4' => $image4,
        ];
        
        return $this->db->execute($sql, $params);
    }
}
?>
