<?php  

class addcateController {

    private $cate;
    private $data = [];

    public function __construct() {
        $this->cate = new cateModel();
    }

    public function renderView() {
        require_once('views/themdanhmuc/themdanhmuc.php');
    }
    
    public function addCate() {
        if (isset($_POST['them_cate'])) {
            $data_cate = [];
            $data_cate['ten_danh_muc'] = isset($_POST['ten_danh_muc']) ? trim($_POST['ten_danh_muc']) : '';

            if (empty($data_cate['ten_danh_muc'])) {
                echo "<script>alert('Tên danh mục không được để trống!');</script>";
                header("Location: index.php?page=addcate");
            }

            if ($this->cate->addcate($data_cate)) {
                header("Location: index.php?page=cate");
            } else {
                echo "Lỗi khi thêm danh mục.";
            }
            exit();
        }

        $this->renderView();
    }
}
