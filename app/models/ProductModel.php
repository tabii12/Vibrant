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
                    sanpham_img.url AS url, 
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

        public function getProduct1Anh(){
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
        public function get1Product1Anh($id){
            $sql = "
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
                WHERE sp.id like $id;

            ";
            return $this->db->getOne($sql);
        }

        public function getBrand(){
            $sql = 'SELECT * FROM thuonghieu';
            return $this->db->getAll($sql);
        }

        public function getBCTT(){
            $sql = '
            SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
            ORDER BY RAND()
            LIMIT 7;
            
            ';
            return $this->db->getAll($sql);
        }

        public function getProductDB(){
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
                    sanpham_img.url LIKE '%_1.png'  
                ORDER BY 
                    sanpham.ngay_up_san_pham ASC
                LIMIT 4"; 
        
            return $this->db->getAll($sql);
        }
        
        
        
    }