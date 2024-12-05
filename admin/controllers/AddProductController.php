<?php
class AddProductController {
    private $addproduct;
    private $data = [];

    public function __construct() {
        
        $this->addproduct = new AddProductModel();
    }

    public function renderAddProduct($data) {
        
        require_once 'views/AddProduct/AddProduct.php';
    }

    public function addProduct() {
        $this->data['cate'] = $this->addproduct->getCate();
        $this->renderAddProduct($this->data);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $name = $_POST['ten_san_pham'];
            $category = $_POST['id_danh_muc'];
            $price = $_POST['gia'];
            $quantity = $_POST['so_luong'];
            $sale_price = $_POST['gia_sale'];
            $description = $_POST['mo_ta'];
    
            // Upload ảnh
            $images = [];
            for ($i = 1; $i <= 4; $i++) {
                if (isset($_FILES["image$i"]) && $_FILES["image$i"]['error'] === UPLOAD_ERR_OK) {
                    $images[] = $this->uploadImage($_FILES["image$i"]);
                }
            }
    
            // Gọi model để thêm sản phẩm và hình ảnh
            $this->addproduct->addProduct($name, $category, $price, $quantity, $sale_price, $description, $images);
    
            // Chuyển hướng hoặc hiển thị thông báo thành công
            header('Location:index.php?page=product');
            exit();
        }
    }

    private function uploadImage($file) {
        // Kiểm tra xem file có hợp lệ không
        if (isset($file['name']) && $file['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../public/image/";
            $target_file = $target_dir . basename($file["name"]);
            
            // Di chuyển file tới thư mục đích
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $target_file; // Trả về đường dẫn file đã upload
            }
        }
        return null; // Trả về null nếu không upload được
    }
  
    
    
    
}
