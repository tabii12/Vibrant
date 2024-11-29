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
        $sql ="SELECT ten_san_pham, mo_ta,id,gia FROM sanpham WHERE id = $id_san_pham ";
        return $this->product->getAll($sql);
       }

       public function GetComment($id_san_pham){
        $sql ="SELECT 
                    nguoidung.ten_nguoi_dung,
                    binhluan.noi_dung,
                    binhluan.rating
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
            ORDER BY RAND()
            LIMIT 9;";
        return $this->product->getAll($sql); 
       }


    }
      
        
