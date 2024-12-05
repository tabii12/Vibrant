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
            return $this->db->getAll( $sql);
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
        public function getProduct1AnhNewGN(){
            $sql = "
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
                JOIN danhmuc dm ON dm.id = sp.id_danh_muc
                WHERE dm.id = 1
                ORDER BY sp.ngay_up_san_pham DESC
                LIMIT 1

            ";
            return $this->db->getAll($sql);
        }
        public function getProduct1AnhNewGNw(){
            $sql = "
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
                JOIN danhmuc dm ON dm.id = sp.id_danh_muc
                WHERE dm.id = 2
                ORDER BY sp.ngay_up_san_pham DESC
                LIMIT 1

            ";
            return $this->db->getAll($sql);
        }
        public function getProduct1AnhNewTT(){
            $sql = "
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
                JOIN danhmuc dm ON dm.id = sp.id_danh_muc
                WHERE dm.id = 3
                ORDER BY sp.ngay_up_san_pham DESC
                LIMIT 1

            ";
            return $this->db->getAll($sql);
        }
        public function getProduct1AnhNewDB(){
            $sql = "
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
                JOIN danhmuc dm ON dm.id = sp.id_danh_muc
                WHERE dm.id = 4
                ORDER BY sp.ngay_up_san_pham DESC
                LIMIT 1

            ";
            return $this->db->getAll($sql);
        }

        public function getProduct1AnhTheoDanhMuc($danh_muc){
            $sql = "
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url, dm.ten_danh_muc
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
                JOIN danhmuc dm ON dm.id = sp.id_danh_muc
                WHERE dm.id like $danh_muc
                ;

            ";
            return $this->db->getAll($sql);
        }
        public function getProduct1AnhTheoDanhMucfilter($danh_muc, $loc1 = [], $loc2 = []){
            $sql = "
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url, dm.ten_danh_muc
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
                JOIN danhmuc dm ON dm.id = sp.id_danh_muc
                WHERE dm.id like $danh_muc AND sp.gia BETWEEN $loc1 AND $loc2
                ORDER BY sp.gia ASC;

            ";
            return $this->db->getAll($sql);
        }
        public function getProduct1AnhTheoDanhMucbrand($danh_muc, $thuong_hieu){
            $sql = "
                SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url, dm.ten_danh_muc, th.ten_thuong_hieu
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
                JOIN danhmuc dm ON dm.id = sp.id_danh_muc
                JOIN thuonghieu th ON th.id = sp.id_thuong_hieu
                WHERE dm.id like $danh_muc AND th.id like $thuong_hieu
                ORDER BY sp.gia ASC;

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
            ORDER BY sp.so_luong DESC
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
        
        public function getKM(){
            $sql = "
                SELECT * FROM khuyenmai
            ";
            return $this->db->getAll($sql);
        }
    }