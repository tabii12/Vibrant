<?php
    class DetailController {
        public $detail;
        private $data;
    
        public function __construct() {
            $this->detail = new DetailModel();
        }
    
        public function renderView($data) {
            require_once 'views\chitietsanpham\Product_detail.php';
        }
    
        public function detail() {
            if (isset($_GET['id_san_pham'])) {
                $id_san_pham = $_GET['id_san_pham'];;
                
                
                $this->data['Detail_product'] = $this->detail->getURL($id_san_pham);  
                $this->data['Infor'] = $this->detail->GetInfor($id_san_pham); 
                $this->data['love_product'] = $this->detail-> GetProduct();
                $this->data['comment'] = $this->detail-> GetComment($id_san_pham);
                $this->renderView($this->data);
            } else {
              
                echo "Sản phẩm không tồn tại!";
            }
        }
    }
    