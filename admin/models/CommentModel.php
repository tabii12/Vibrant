<?php
    require_once 'models/DataBase.php';

    class CommentModel{
        private $db;

        public function __construct(){
            $this->db = new DataBase();
        }

        public function getComments(){
            $sql ="
                SELECT 
                    b.id AS comment_id,
                    u.ten_nguoi_dung AS user_name,
                    b.ngay_binh_luan AS comment_date,
                    b.noi_dung AS comment_content,
                    b.rating AS rating
                FROM 
                    binhluan b
                JOIN 
                    nguoidung u ON b.id_nguoi_dung = u.id
                ORDER BY 
                    b.ngay_binh_luan DESC;

            " ;
            return $this->db->getAll($sql);
        }
    }

?>