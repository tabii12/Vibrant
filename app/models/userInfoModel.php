<?php
    class userInfoModel{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getuserInfo($user_id){
            $sql = "
            SELECT * FROM nguoidung WHERE id = ?
            ";
            return $this->db->getAll($sql, [$user_id]);
        }
    }
?>