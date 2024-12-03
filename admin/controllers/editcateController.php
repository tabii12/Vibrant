<?php 

class editcateController {

    private $cate;
    private $data = [];

    public function __construct() {
        // Giả sử KhuyenMaiModel là lớp xử lý database
        $this->cate = new editcateModel();
    }

    // Phương thức hiển thị view thêm danh mục
    public function renderView($data) {
        require_once('views/editDanhmuc/editDanhmuc.php');
    }

    public function editCate() {
        // Kiểm tra và lấy giá trị ID từ URL
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "ID không hợp lệ!";
            return;
        }

        // Lấy dữ liệu danh mục từ cơ sở dữ liệu
        $this->data['danh_muc'] = $this->cate->getcate($id);
        $this->renderView($this->data);

        // Xử lý form khi người dùng submit
        if (isset($_POST['ten_danh_muc']) && !empty($_POST['ten_danh_muc'])) {
            $ten_danh_muc = $_POST['ten_danh_muc']; // Lấy giá trị từ form và xử lý

            // Gọi phương thức updateCate
            $result = $this->cate->updateCate($id, $ten_danh_muc);

            if ($result) {
                header("Location: index.php?page=cate"); // Chuyển hướng sau khi thành công
                exit();
            } else {
                echo "Cập nhật thất bại!";
            }
        }
    }
}
