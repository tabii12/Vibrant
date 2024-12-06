<?php
    require_once 'models/DataBase.php';

    class CustomerModel{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getCustomer(){
            $sql ="
            SELECT * FROM nguoidung WHERE role = 'customer'
            ";
        return $this->db->getAll($sql);

        }

        public function deleteCustomer($id_khach_hang) {
            $sql = "DELETE FROM nguoidung WHERE id = ?";
            return $this->db->query($sql, [$id_khach_hang]);
        }
    }

?>