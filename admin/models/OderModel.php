<?php

class OderModel{
    public $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function getOder(){
        $sql ="SELECT 
                    donhang.*, 
                    nguoidung.ten_nguoi_dung
                FROM 
                    donhang
                JOIN 
                    nguoidung ON nguoidung.id = donhang.id_nguoi_dung;" ;
    return $this->db->getAll($sql);   
   } 

   public function getOderDetail($id_don_hang){
        $sql ="SELECT 
                ct_donhang.*, 
                sanpham.ten_san_pham,
                sanpham.id_danh_muc, 
                danhmuc.ten_danh_muc,
                donhang.*
            FROM 
                ct_donhang 
            JOIN 
                sanpham 
            ON 
                ct_donhang.id_san_pham = sanpham.id 
            JOIN 
                danhmuc 
            ON 
                sanpham.id_danh_muc = danhmuc.id
            JOIN 
            donhang
            ON
             ct_donhang.id_don_hang =donhang.id
            WHERE 
                ct_donhang.id_don_hang = $id_don_hang;";
    return $this->db->getAll($sql);
    }


}