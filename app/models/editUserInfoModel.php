<?php
    class editUserInfoModel{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function geteditUserInfo($user_id){
            $sql = "
            SELECT * FROM nguoidung WHERE id = ?
            ";
            return $this->db->getAll($sql, [$user_id]);
        }

        public function updateUserInfo($data){
            $sql = "
            UPDATE nguoidung 
            SET ten_nguoi_dung = ?, 
                email = ?, 
                sdt = ?, 
                gioi_tinh = ?, 
                ngay_sinh = ?
            WHERE id = ?
            ";

            $param = [
                $data['ten_nguoi_dung'],
                $data['email'],
                $data['sdt'],
                $data['gioi_tinh'],
                $data['ngay_sinh'],
                $data['id']
            ];

        }
    }
?>