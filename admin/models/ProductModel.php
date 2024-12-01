<?php
    require_once 'models/DataBase.php';

    class ProductModel{
        private $db;

        public function __construct(){
            $this->db = new DataBase();
        }

        public function getProducts(){
            $sql ="
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id;
            " ;
            return $this->db->getAll($sql);
        }
    }

?>