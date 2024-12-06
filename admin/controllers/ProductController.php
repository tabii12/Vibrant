<?php
    class ProductController{
        public $product;
        public $data = [];

        public function __construct(){
            $this->product = new ProductModel();
        }
        public function RenderProduct($data){
            require_once('views/Product/product.php');
        }

        public function Product(){
            $this->data['product_info'] = $this->product->getProducts();

            $this->RenderProduct($this->data);

           
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->product->deleteProductImages($id);
                $this->product->deleteProductById($id);
        
                // Sau khi xóa xong, điều hướng về trang danh sách sản phẩm
                header('Location: index.php?page=product');
                exit();
            }
            
        }
    }
?>