<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function getAdmins() {
        $sql = "SELECT * FROM nguoidung WHERE role = 'admin'"; 
        return $this->db->getAll($sql);
    }

    public function deleteAdmin($id) {
        $this->db->getConnection()->beginTransaction();

        try {
            $deleteOrdersSql = "DELETE FROM donhang WHERE id_nguoi_dung = :id";
            $stmt = $this->db->getConnection()->prepare($deleteOrdersSql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $deleteAdminSql = "DELETE FROM nguoidung WHERE id = :id";
            $stmt = $this->db->getConnection()->prepare($deleteAdminSql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $this->db->getConnection()->commit();
            return true;
        } catch (Exception $e) {
            $this->db->getConnection()->rollBack();
            return false;
        }
    }
}


?>
