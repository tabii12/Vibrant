<?php

class OderListModel{
    public $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function getOder(){
        // $sql ="SELECT * FROM product";
        $sql ="SELECT * FROM donhang" ;
    return $this->db->getAll($sql);   
   } 

   public function getOderDetail($id_don_hang){
    // $sql ="SELECT * FROM product";
        $sql ="SELECT * FROM ct_donhang WHERE id_don_hang = $id_don_hang" ;
    return $this->db->getAll($sql);   
    }


}