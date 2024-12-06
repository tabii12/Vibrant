<?php
    class editPwUserModel{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function updatePw($data, $id){
            $sql = "
            UPDATE nguoidung
            SET mat_khau = ?
            WHERE id = ?
            ";
            $param = [
                $data['np'],
                $id
            ];
            $this->db->insert($sql, $param);
        }
    }
?>