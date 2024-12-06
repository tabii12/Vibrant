<?php
    class CustomerController{
        public $customer;
        public $data = [];

        public function __construct(){
            $this->customer = new CustomerModel();
        }
        public function RenderCustomer($data){
            require_once('views/KhachHang/KhachHang.php');
        }
        public function Customer(){
            $this->data['customer_info'] = $this->customer->getCustomer();

            $this->RenderCustomer($this->data);
       

        if (isset($_GET['id_khach_hang'])) {
            $id_khach_hang = $_GET['id_khach_hang'];
            
         
            $result = $this->customer->deleteCustomer($id_khach_hang);
            if ($result) {
                header("Location: index.php?page=customer");
            }

        }
    }
}

?>