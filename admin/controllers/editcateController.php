<?php 

class editcateController {

    private $cate;
    private $data = [];

    public function __construct() {
        $this->cate = new editcateModel();
    }

    public function renderView($data) {
        require_once('views/editDanhmuc/editDanhmuc.php');
    }

    public function editCate() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "ID không hợp lệ!";
            return;
        }

        
        $this->data['danh_muc'] = $this->cate->getcate($id);
        $this->renderView($this->data);

       
        if (isset($_POST['ten_danh_muc']) && !empty($_POST['ten_danh_muc'])) {
            $ten_danh_muc = $_POST['ten_danh_muc']; 

            $result = $this->cate->updateCate($id, $ten_danh_muc);

            if ($result) {
                header("Location: index.php?page=cate"); 
                exit();
            } else {
                echo "Cập nhật thất bại!";
            }
        }
    }
}
