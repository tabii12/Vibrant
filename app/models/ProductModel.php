<?php
    class ProductModel{
        private $db;

        public function __construct(){
            $this->db = new DataBase();
        }

        public function getProduct(): mixed{
            $sql = "
                SELECT 
                    sanpham.id, 
                    sanpham.ten_san_pham, 
                    sanpham.mo_ta, 
                    sanpham.gia, 
                    sanpham.so_luong, 
                    sanpham_img.url AS img_url, 
                    danhmuc.ten_danh_muc
                FROM 
                    sanpham
                LEFT JOIN 
                    sanpham_img 
                ON 
                    sanpham.id = sanpham_img.id_san_pham
                LEFT JOIN 
                    danhmuc 
                ON 
                    sanpham.id_danh_muc = danhmuc.id
                WHERE 
                    sanpham_img.url LIKE '%_1.png' ";
            return $this->db->getAll(sql: $sql);
        }

    }