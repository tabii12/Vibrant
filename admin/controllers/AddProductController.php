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
        $this->data['brand'] = $this->addproduct->getBrand();
        $this->renderAddProduct($this->data);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            $data['name'] = $_POST['ten_san_pham'];
            $data['category'] = $_POST['id_danh_muc'];
            $data['brand'] = $_POST['id_thuong_hieu'];
            $data['price'] = $_POST['gia'];
            $data['quantity'] = $_POST['so_luong'];
            $data['sale_price'] = $_POST['gia_sale'];
            $data['description'] = $_POST['mo_ta'];
            $files = $_FILES['images'];
            $error_message = '';
            $error_image_message = '';

            $category = '';
            $brand = '';

            if($data['category'] == 1){
                $category = 'MAN';
            }elseif($data['category'] == 2){
                $category = 'WOMEN';
            }elseif($data['category'] == 3){
                $category = 'SPORT';
            }else{
                $category = 'SPECIAL';
            }

            if($data['brand'] == 1){
                $brand = 'NIKE';
            }elseif($data['brand'] == 2){
                $brand = 'ADIDAS';
            }elseif($data['brand'] == 3){
                $brand = 'CONVERES';
            }else{
                $brand = 'PUMA';
            }

            if(count($files['name']) != 4){
                $error_image_message = 'Chỉ được thên 4 ảnh!';
                exit;
            }

            $id_sp = $this->addproduct->addProduct($data);

            if($id_sp){
                for($i = 0; $i < 4; $i++){
                    // Tạo đường dẫn URL cho từng ảnh trong vòng lặp
                    $url = $brand.'/'.$category.'/'.$files['name'][$i];
                    $result = $this->addproduct->addImages($id_sp, $url);
                    
                    if($result){
                        $allowedTypes = ['jpg', 'png'];
                        
                        // Sử dụng vòng lặp duyệt qua từng file
                        if($files['error'][$i] != 0){
                            $error_message = "Có lỗi xảy ra với file: " . $files['name'][$i] . "<br>";
                        }
                
                        $fileName = basename($files['name'][$i]);
                        $targetFile = '../public/image/'.$url;  // Đảm bảo rằng URL đúng cho mỗi ảnh
                        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                        $fileTmpName = $files['tmp_name'][$i];
                
                        // Kiểm tra loại file
                        if (!in_array($fileType, $allowedTypes)) {
                            $error_message = "File không hợp lệ: " . $fileName . "<br>";
                        }
                
                        // Di chuyển file
                        if (move_uploaded_file($fileTmpName, $targetFile)) {
                            // Có thể thêm logic nếu cần, ví dụ: ghi vào log, thông báo thành công...
                        } else {
                            $error_message = "Lỗi khi di chuyển file '$fileName'.<br>";
                        }
                    } else {
                        $error_message = 'Có lỗi xảy ra khi thêm ảnh!';
                    }
                }
                
                header('Location: index.php?page=product');
            }else{
                $error_message = 'có lỗi xảy ra khi thêm sản phẩm!';
            }
            
            
        }
    }
}
