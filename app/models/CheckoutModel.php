<?php
    class  CheckoutModel{
        private $db;

        public function __construct(){
            $this->db = new DataBase();
        }

        public function createOrder($data){
            $sql = '
            INSERT INTO donhang 
            (id_nguoi_dung, ngay_dat_hang, tong_gia, trang_thai, dia_chi, nguoi_nhan, phuong_thuc_thanh_toan, id_khuyen_mai, sdt) 
            VALUES 
            (?, CURRENT_DATE, ?, "chưa thanh toán", ?, ?, ?, ?, ?);
            ';
            $param = [
                $_SESSION['user']['id'], 
                $data['tong_gia'],       
                $data['dia_chi'],        
                $data['nguoi_nhan'], 
                $data['phuong_thuc_thanh_toan'], 
                $data['id_khuyen_mai'] ?? null,
                $data['sdt']
            ];

            $result = $this->db->insert($sql, $param);

            

            return $result;
        }

        public function addOrderDetails($orderId, $products) {
            $sql = '
                INSERT INTO ct_donhang (id_don_hang, id_san_pham, so_luong, gia) 
                VALUES (?, ?, ?, ?);
            ';
            
            foreach ($products as $product) {
                $params = [
                    $orderId,               
                    $product['id'], 
                    $product['quantity'],     
                    $product['gia'],       
                ];
        
                $this->db->insert($sql, $params);
            }
        }

       
    }


