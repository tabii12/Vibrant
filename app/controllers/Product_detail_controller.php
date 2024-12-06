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
                $id_san_pham = $_GET['id_san_pham'];
        
                $this->data['Detail_product'] = $this->detail->getURL($id_san_pham);
                $this->data['Infor'] = $this->detail->GetInfor($id_san_pham) ?? [];
                $this->data['BCTT'] = $this->detail->GetBCTT();
                $this->data['comment'] = $this->detail->GetComment($id_san_pham);
        
                
                if (empty($this->data['Infor'])) {
                    echo "Không tìm thấy thông tin sản phẩm!";
                    return;
                }
                 $this->renderView($this->data);
            } else {
                echo "Sản phẩm không tồn tại!";
                return;
            }
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $noi_dung = $_POST['noi_dung'] ?? '';
                $rating = $_POST['rating'] ?? '';
                $ngay_binh_luan = date("Y-m-d");
                if (empty($noi_dung)) {
                    echo "Nội dung bình luận không được để trống!";
                    return;
                }
        
                $id_nguoi_dung = $_SESSION['user']['id'] ?? null;

                $result = $this->detail->addBinhLuan($id_san_pham, $id_nguoi_dung, $noi_dung,$ngay_binh_luan,$rating);
                
                header('location: index.php?page=detail&id_san_pham='.$id_san_pham.'');
            }
        }
    }
    