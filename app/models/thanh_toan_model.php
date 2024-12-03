<?php
class  thanh_toan_model{
        private $db;

        public function __construct(){
            $this->db = new DataBase();
        }
        public function getUser($id_nguoi_dung){
            // $sql ="SELECT * FROM product";
            $sql ="SELECT * FROM donhang  WHERE id_nguoi_dung = $id_nguoi_dung" ;
            
        return $this->db->getOne($sql);
       } 

       public function getProduct($id_nguoi_dung){
        $sql ="SELECT 
        *   
            FROM donhang dh
            JOIN ct_donhang ctdh ON dh.id = ctdh.id_don_hang
            JOIN sanpham sp ON sp.id = ctdh.id_san_pham
            JOIN (
                SELECT id_san_pham, MIN(url) AS url -- Lấy URL đầu tiên (theo thứ tự chữ cái hoặc số)
                FROM sanpham_img
                GROUP BY id_san_pham
            ) spi ON sp.id = spi.id_san_pham
            JOIN sanpham_size sps ON sp.id = sps.id_san_pham -- Liên kết với bảng sanpham_size
            JOIN nguoidung nd ON dh.id_nguoi_dung = nd.id -- Liên kết với bảng nguoidung để lấy sdt
            WHERE dh.id_nguoi_dung = 1";

        return $this->db->getAll($sql);

       }

       
       }


