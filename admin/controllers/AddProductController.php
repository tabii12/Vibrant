<?php
class AddProductController {
    public $addproduct;
    public $data = [];

    public function __construct(){
        $this->addproduct = new AddProductModel();
    }

    public function RenderAddProduct($data){
        require_once('views/AddProduct/AddProduct.php');
    }

    public function AddProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $sale_price = $_POST['sale_price'];
            $description = $_POST['description'];

            // Xử lý upload ảnh (có thể sử dụng thư viện như `move_uploaded_file` để lưu ảnh)
            $image1 = $this->uploadImage($_FILES['image1']);
            $image2 = $this->uploadImage($_FILES['image2']);
            $image3 = $this->uploadImage($_FILES['image3']);
            $image4 = $this->uploadImage($_FILES['image4']);

            // Gọi phương thức addProduct từ model để lưu sản phẩm vào cơ sở dữ liệu
            $this->addproduct->addProduct($name, $category, $price, $quantity, $sale_price, $description, $image1, $image2, $image3, $image4);

            // Chuyển hướng hoặc thông báo thành công
            header('Location: success_page.php');
        }
        
        // Render form nếu không phải là POST request
        $this->RenderAddProduct($this->data);
    }

    // Phương thức để xử lý việc upload ảnh
    private function uploadImage($file){
        // Kiểm tra lỗi và di chuyển ảnh đến thư mục cần thiết
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_file);
        return $target_file;
    }
}
?>
