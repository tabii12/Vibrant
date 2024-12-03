<?php

class OderListModel{
    public $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function getOder(){
        // $sql ="SELECT * FROM product";
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
    // $sql ="SELECT * FROM product";
        $sql ="SELECT * FROM ct_donhang WHERE id_don_hang = $id_don_hang" ;
    return $this->db->getAll($sql);
    }


}