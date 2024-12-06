<?php
    class userInfoModel{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getUser($id){
            $sql = "
            SELECT * FROM nguoidung WHERE id = ?
            ";
            return $this->db->getAll($sql, [$id]);
        }

        public function getOrder($id){
            $sql = "
            SELECT * FROM donhang WHERE id_nguoi_dung = ?
            ";
            return $this->db->getAll($sql, [$id]);
        }
    }
?>