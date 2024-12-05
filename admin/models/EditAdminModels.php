<?php
class EditAdminModels {
    private $db;

    public function __construct(){
        $this->db = new DataBase();
    }

    public function getEditAdmins($id){
        $sql = "SELECT * FROM `nguoidung` WHERE role = 'admin' AND id = :id";     
        $ad = $this->db->getConnection()->prepare($sql);
        $ad->bindParam(':id', $id, PDO::PARAM_INT);
        $ad->execute();
        return $ad->fetch(PDO::FETCH_ASSOC); 
    }

    public function updateAdmin($id, $name, $email, $phone, $position, $gender, $username, $oldPassword, $newPassword) {
        $sql = "SELECT mat_khau FROM nguoidung WHERE id = :id"; 
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($admin && $oldPassword === $admin['mat_khau']) {
            $newPassword = $newPassword ? $newPassword : $oldPassword;
    
            $updateSql = "UPDATE nguoidung SET 
                            ten_nguoi_dung = :name, 
                            email = :email, 
                            sdt = :phone, 
                            role = :position, 
                            gioi_tinh = :gender, 
                            ten_dang_nhap = :username, 
                            mat_khau = :password  
                          WHERE id = :id";
            $updateStmt = $this->db->getConnection()->prepare($updateSql);
            $updateStmt->bindParam(':name', $name);
            $updateStmt->bindParam(':email', $email);
            $updateStmt->bindParam(':phone', $phone);
            $updateStmt->bindParam(':position', $position);
            $updateStmt->bindParam(':gender', $gender);
            $updateStmt->bindParam(':username', $username);
            $updateStmt->bindParam(':password', $newPassword);
            $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $updateStmt->execute();
        } else {
            return false;
        }
    }
    
    
}


?>