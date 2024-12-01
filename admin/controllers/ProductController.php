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
        }
    }
?>