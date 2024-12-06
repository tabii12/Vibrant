<?php
class DetailModel{
         private $product;

        public function __construct(){
            $this->product = new DataBase();
        }

        public function getURL($id_san_pham){
            // $sql ="SELECT * FROM product";
            $sql ="SELECT url FROM sanpham_img WHERE id_san_pham = $id_san_pham  " ;
        return $this->product->getAll($sql);   
       } 

       public function GetInfor($id_san_pham){
        $sql ="SELECT 
                    sp.ten_san_pham, 
                    sp.mo_ta,
                    sp.id, 
                    sp.gia, 
                    sp.id_danh_muc,
                    dm.ten_danh_muc
                FROM 
                    sanpham sp
                JOIN 
                    danhmuc dm ON sp.id_danh_muc = dm.id
                WHERE 
                    sp.id = $id_san_pham; ";
        return $this->product->getAll($sql);
       }

       public function GetComment($id_san_pham){
        $sql ="SELECT 
                    nguoidung.ten_nguoi_dung,
                    binhluan.noi_dung,
                    binhluan.rating,
                    binhluan.ngay_binh_luan
                FROM 
                    nguoidung
                JOIN 
                    binhluan
                ON 
                    nguoidung.id = binhluan.id_nguoi_dung
                WHERE 
                    binhluan.id_san_pham = $id_san_pham" ;
        return $this->product->getAll($sql);
       }

       public function GetBCTT(){
        $sql = "SELECT sp.id, sp.ten_san_pham, sp.mo_ta, sp.gia, sp.so_luong, si.url
                FROM sanpham sp
                JOIN (
                    SELECT id_san_pham, MIN(id) AS min_id
                    FROM sanpham_img
                    GROUP BY id_san_pham
                ) si_min ON sp.id = si_min.id_san_pham
                JOIN sanpham_img si ON si.id = si_min.min_id
            ORDER BY sp.so_luong DESC
            LIMIT 4;";
        return $this->product->getAll($sql); 
       }

       public function addBinhLuan($id_san_pham, $id_nguoi_dung, $noi_dung, $ngay_binh_luan) {
        if (empty($id_san_pham) || empty($id_nguoi_dung) || empty($noi_dung)) {
            return false;
        }

        $sql = "INSERT INTO binhluan (id_san_pham, id_nguoi_dung, noi_dung, ngay_binh_luan) VALUES (?, ?, ?, ?)";
        $params = [$id_san_pham, $id_nguoi_dung, $noi_dung,$ngay_binh_luan];

        return $this->product->insert($sql, $params);
    }


    }
      
        
