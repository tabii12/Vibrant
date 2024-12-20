<?php
class AddAdminModels {
    private $db;

    public function __construct(){
        $this->db = new DataBase();
    }

    public function addAdmin($ten_nguoi_dung, $email, $phone, $position, $gender, $username, $password) {
        try {

            $sql = "INSERT INTO nguoidung (ten_nguoi_dung, email, sdt, role, gioi_tinh, ten_dang_nhap, mat_khau) 
                    VALUES (:ten_nguoi_dung, :email, :sdt, :role, :gioi_tinh, :ten_dang_nhap, :mat_khau)";
    
            $stmt = $this->db->getConnection()->prepare($sql);
    
            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sdt', $phone); 
            $stmt->bindParam(':role', $position);
            $stmt->bindParam(':gioi_tinh', $gender);
            $stmt->bindParam(':ten_dang_nhap', $username); 
            $stmt->bindParam(':mat_khau', $password);
    
            $stmt->execute();
    
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi khi thêm admin: ' . $e->getMessage();
            return false;
        }
    }
}

?>
