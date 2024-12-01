<?php
class EditAdminModels {
    private $db;

    public function __construct(){
        $this->db = new DataBase();
    }

    public function getEditAdmins($id){
        $sql = "SELECT * FROM `nguoidung` WHERE role = 'admin' AND id = :id";     
        $ad = $this->db->getConnection()->prepare($sql);
        
        // Liên kết tham số :id với giá trị ID
        $ad->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Thực thi câu lệnh SQL
        $ad->execute();

        // Lấy dữ liệu kết quả
        return $ad->fetch(PDO::FETCH_ASSOC); // Chỉ lấy một admin
    }
    
}

?>