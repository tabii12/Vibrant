<?php
    class userInfoController{
        public $userInfo;
        public $data = [];

        public function __construct(){
            $this->userInfo = new userInfoModel();
        }

        public function userInfo(){
            $data = [];
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?page=login');
                exit();
            }

            $id = $_SESSION['user']['id'];

            $data['user'] = $this->userInfo->getUser($id);
            $data['orders'] = $this->userInfo->getOrder($id);
            
            require_once 'views/userInfo/userInfo.php';
        }

    }

?>