<?php
    class OderController {
        public $Oder;
        private $data;
    
        public function __construct() {
            $this->Oder = new OderModel();
        }
    
        public function renderView($data) {
            require_once 'views/danhsachdonhang/danhsachdonhang.php';
        }
    
        public function Oder() {
           
            $this->data['Oder'] = $this->Oder->getOder();  
            
            $this->renderView($this->data);
           
        }
    }
    