<?php
class UserModel {
    private $db;

    public function __construct() {
        // Khởi tạo đối tượng DataBase
        $this->db = new DataBase();
    }

    // Hàm lấy danh sách admin
    public function getAdmins() {
        // Truy vấn lấy tất cả admin từ bảng nguoidung
        $sql = "SELECT * FROM nguoidung WHERE role = 'admin'"; 
        return $this->db->getAll($sql);
    }

    // Hàm xóa admin theo ID
    public function deleteAdmin($id) {
        // Bắt đầu giao dịch để xóa an toàn
        $this->db->getConnection()->beginTransaction();

        try {
            // Xóa các bản ghi trong bảng donhang có liên quan đến admin
            $deleteOrdersSql = "DELETE FROM donhang WHERE id_nguoi_dung = :id";
            $stmt = $this->db->getConnection()->prepare($deleteOrdersSql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Sau đó xóa admin trong bảng nguoidung
            $deleteAdminSql = "DELETE FROM nguoidung WHERE id = :id";
            $stmt = $this->db->getConnection()->prepare($deleteAdminSql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Nếu tất cả đều thành công, commit giao dịch
            $this->db->getConnection()->commit();
            return true;
        } catch (Exception $e) {
            // Nếu có lỗi, rollback giao dịch
            $this->db->getConnection()->rollBack();
            return false;
        }
    }
}


?>
