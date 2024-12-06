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
            
            // Gọi model để xóa khách hàng
            $result = $this->customer->deleteCustomer($id_khach_hang);
            
            if ($result) {
                // Xóa thành công, chuyển hướng lại danh sách khách hàng
                header("Location: index.php?page=customer");
            }

        }
    }
}

?>