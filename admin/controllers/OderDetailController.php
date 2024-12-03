<?php
    class OderdetailController {
        public $Oder;
        private $data;
    
        public function __construct() {
            $this->Oder = new OderListModel();
        }
    
        public function renderView($data) {
            require_once 'views/chitietdonhang/chitietdohang.php';
        }
    
        public function Oder_detail() {
            if(isset($id_don_hang)){
                $id_dong_hang = $_GET['id_don_hang'];
           
            $this->data['Oder_Infor'] = $this->Oder->getOderDetail($id_dong_hang);  
            
            $this->renderView($this->data); }
           
        }
    }
    