<?php
    class KhuyenMaiModel{
        private $db;

        public function __construct(){
            $this->db = new DataBase();
        }

        public function getKhuyenMai(){
            $sql = 'SELECT * FROM khuyenmai;';
            return $this->db->getAll($sql);
        }

        public function insertKhuyenMai($data) {
            $sql_check_redemCode = "SELECT COUNT(*) FROM khuyenmai WHERE ma_nhap = ?";
            $result_redemCode = $this->db->query($sql_check_redemCode, [$data['ma_nhap']])->fetchColumn();
        
            if ($result_redemCode > 0) {
                return false; 
            }
        
            $sql = "INSERT INTO khuyenmai (ma_nhap, phan_tram_giam, ngay_bat_dau, ngay_ket_thuc) 
                    VALUES (?, ?, ?, ?)";
        
            $params = [
                $data['ma_nhap'],
                $data['phan_tram_giam'],
                $data['ngay_bat_dau'],
                $data['ngay_ket_thuc']
            ];
        
            return $this->db->insert($sql, $params); 
        }
        
        public function deleteKhuyenMai($id) {
            $sql = "DELETE FROM khuyenmai WHERE id = ?";
            $params = [$id];
        
            return $this->db->query($sql, $params);
        }
        
    }