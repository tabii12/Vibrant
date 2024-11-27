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
        $sql ="SELECT ten_san_pham, mo_ta,id FROM sanpham WHERE id = $id_san_pham ";
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

       public function GetProduct(){
        $sql = "SELECT 
                    sanpham.ten_san_pham,
                    sanpham.gia,
                    sanpham_img.url
                FROM 
                    sanpham
                JOIN 
                    sanpham_img
                ON 
                    sanpham.id = sanpham_img.id_san_pham where sanpham_img.id_san_pham <= 6 AND sanpham_img.url LIKE '%_1.png';";
        return $this->product->getAll($sql); 
       }


    }
      
        
