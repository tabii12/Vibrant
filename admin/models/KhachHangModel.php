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
            $sql_delete_ct_donhang = "DELETE FROM ct_donhang 
            WHERE id_don_hang IN 
            (SELECT id FROM donhang WHERE id_nguoi_dung = ?)";
            $this->db->query($sql_delete_ct_donhang, [$id_khach_hang]);

            
            $sql_delete_orders = "DELETE FROM donhang WHERE id_nguoi_dung = ?";
            $this->db->query($sql_delete_orders, [$id_khach_hang]);

            
            $sql_delete_customer = "DELETE FROM nguoidung WHERE id = ?";
            return $this->db->query($sql_delete_customer, [$id_khach_hang]);
        }
    }

?>