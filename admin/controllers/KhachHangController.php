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
        }

    }

?>