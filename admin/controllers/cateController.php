<?php 

    class cateController {

        private $cate;
        private $data = [];
    
        public function __construct() {
            // Giả sử KhuyenMaiModel là lớp xử lý database
            $this->cate = new cateModel();
        }
    
        // Phương thức hiển thị view thêm danh mục
        public function renderView($data) {
            require_once('views/danhmuc/danh_muc.php');
        }

        public function Cate() {
            $this->data['cate'] = $this->cate->getcate();
            $this->renderView($this->data);
            
            if (isset($_GET['id_danh_muc'])) {
                $cateid = $_GET['id_danh_muc'];
                if (is_numeric($cateid)) { // Kiểm tra dữ liệu đầu vào là số
                    $this->cate->deletecate($cateid);
                    header("Location: index.php?page=cate"); // Chuyển hướng về trang danh mục sau khi xóa thành công
                    exit();
                } else {
                    echo "ID danh mục không hợp lệ!";
                }
            }
        }
        
        
      

}