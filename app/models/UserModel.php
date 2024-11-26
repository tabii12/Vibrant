<?php   
    class UserModel {
        private $db;
    
        public function __construct() {
            $this->db = new DataBase();
        }
    
        public function register($data) {
            // Kiểm tra tên đăng nhập đã tồn tại trong cơ sở dữ liệu
            $sql_check_username = "SELECT COUNT(*) FROM nguoidung WHERE ten_dang_nhap = ?";
            $result_username = $this->db->query($sql_check_username, [$data['ten_dang_nhap']])->fetchColumn();
        
            if ($result_username > 0) {
                return false; // Tài khoản đã tồn tại
            }
        
            // Kiểm tra email đã tồn tại
            $sql_check_email = "SELECT COUNT(*) FROM nguoidung WHERE email = ?";
            $result_email = $this->db->query($sql_check_email, [$data['email']])->fetchColumn();
        
            if ($result_email > 0) {
                return false;
            }
        
            // Kiểm tra số điện thoại đã tồn tại
            $sql_check_sdt = "SELECT COUNT(*) FROM nguoidung WHERE sdt = ?";
            $result_sdt = $this->db->query($sql_check_sdt, [$data['sdt']])->fetchColumn();
        
            if ($result_sdt > 0) {
                return false;
            }
        
            // Thêm người dùng vào cơ sở dữ liệu
            $sql = "INSERT INTO nguoidung (ten_dang_nhap, email, sdt, mat_khau, role) 
                    VALUES (?, ?, ?, ?, 'customer')";
        
            $params = [
                $data['ten_dang_nhap'],
                $data['email'],
                $data['sdt'],
                $data['mat_khau']
            ];
        
            return $this->db->insert($sql, $params);
        }
        
        
        public function getUserByUsername($ten_dang_nhap) {
            $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap = ?";
            $params = [$ten_dang_nhap];
            return $this->db->getOne($sql, $params); // Trả về một dòng dữ liệu của người dùng
        }
        
    }
    