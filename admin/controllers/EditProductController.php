<?php 
    class EditProductController{
        public $editproduct;
        public $data = [];

        public function __construct(){
            $this->editproduct = new EditProductModel();
        }   
        public function RenderEditProduct($data){
            require_once('views/EditProduct/EditProduct.php');
        }

        public function EditProduct() {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            if (!$id) {
                echo "ID KHong Ton Tai";
                return;
            }
            $this->data['editproduct_info'] = $this->editproduct->getEditProduct($id);

            $this->RenderEditProduct($this->data);
        }
    }
?>