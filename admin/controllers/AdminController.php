<?php   
    class AdminController{
        private $khuyenMai;
        private $data = [];

        public function __construct() {
            $this->khuyenMai = new KhuyenMaiModel();
        }

        public function renderPage($data, $page) {
            require_once 'views/'.$page.'/'.$page.'.php';
        }

        public function khuyenMaiPage() {
            $this->data['khuyenMai'] = $this->khuyenMai->getKhuyenMai();
        
            // Xử lý khi form thêm mới được gửi
            if (isset($_POST['submit'])) {
                $data = [];
                $data['ma_nhap'] = $_POST['promoCode'];
                $data['phan_tram_giam'] = $_POST['discount'];
                $data['ngay_bat_dau'] = $_POST['startDate'];
                $data['ngay_ket_thuc'] = $_POST['endDate'];
        
                $this->khuyenMai->insertKhuyenMai($data);
                echo '<script>location.href="index.php?page=khuyenMai"</script>';
                exit();
            }
        
            // Xử lý khi nút "Xóa" được nhấn
            if (isset($_POST['delete_submit'])) {
                $deleteId = $_POST['delete_id'];
                $this->khuyenMai->deleteKhuyenMai($deleteId);
                echo '<script>location.href="index.php?page=khuyenMai"</script>';
                exit();
            }
        
            $this->renderPage($this->data, "khuyenMai");
        }
    }