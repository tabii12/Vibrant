<?php  

class addcateController {

    private $cate;
    private $data = [];

    public function __construct() {
        // Giả sử KhuyenMaiModel là lớp xử lý database
        $this->cate = new cateModel();
    }

    // Phương thức hiển thị view thêm danh mục
    public function renderView() {
        require_once('views/themdanhmuc/themdanhmuc.php');
    }
    
    // Phương thức thêm danh mục
    public function addCate() {
        if (isset($_POST['them_cate'])) {
            // Lấy dữ liệu từ form
            $data_cate = [];
            $data_cate['ten_danh_muc'] = isset($_POST['ten_danh_muc']) ? trim($_POST['ten_danh_muc']) : '';

            // Kiểm tra tên danh mục
            if (empty($data_cate['ten_danh_muc'])) {
                echo "<script>alert('Tên danh mục không được để trống!');</script>";
                header("Location: index.php?page=addcate");
            }

            // Gọi phương thức addcate trong model để thêm dữ liệu
            if ($this->cate->addcate($data_cate)) {
                header("Location: index.php?page=cate");
            } else {
                echo "Lỗi khi thêm danh mục.";
            }
            exit();
        }

        // Nếu không có POST, hiển thị form
        $this->renderView();
    }
}
