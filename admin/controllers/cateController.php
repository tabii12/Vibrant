<?php 

    class cateController {

        private $cate;
        private $data = [];
    
        public function __construct() {
            $this->cate = new cateModel();
        }
    

        public function renderView($data) {
            require_once('views/danhmuc/danh_muc.php');
        }

        public function Cate() {
            $this->data['cate'] = $this->cate->getcate();
            $this->renderView($this->data);
            
            if (isset($_GET['id_danh_muc'])) {
                $cateid = $_GET['id_danh_muc'];
                if (is_numeric($cateid)) { 
                    $this->cate->deletecate($cateid);
                    header("Location: index.php?page=cate"); 
                    exit();
                } else {
                    echo "ID danh mục không hợp lệ!";
                }
            }
        }
        
        
      

}