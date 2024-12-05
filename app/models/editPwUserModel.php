<?php
    class editPwUserModel{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function geteditPwUser($user_id){
            $sql = "
            SELECT * FROM nguoidung WHERE id = ?
            ";
            return $this->db->getAll($sql, [$user_id]);
        }
    }
?>