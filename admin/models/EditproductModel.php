<?php
    require_once 'models/DataBase.php';

    class EditProductModel{
        private $db;

        public function __construct(){
            $this->db = new DataBase();
        }

        public function getEditproduct($id){
            $sql ="
                SELECT 
                    sanpham.id,
                    sanpham.ten_san_pham,
                    sanpham.mo_ta,
                    sanpham.gia,
                    sanpham.gia_sale,
                    sanpham.so_luong,
                    sanpham.id_danh_muc,
                    sanpham.id_thuong_hieu,
                    sanpham.ngay_up_san_pham,
                    sanpham_img.url
                FROM sanpham
                LEFT JOIN sanpham_img ON sanpham.id = sanpham_img.id_san_pham
                WHERE sanpham.id = :id;

            " ;
            $prd = $this->db->getConnection()->prepare($sql);
    
            // Liên kết tham số :id với giá trị ID
            $prd->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Thực thi truy vấn
            $prd->execute();
            
            // Lấy kết quả từ truy vấn
            return $prd->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>