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
    }

?>