<?php
    class userInfoController{
        public $userInfo;
        public $data = [];

        public function __construct(){
            $this->userInfo = new userInfoModel();
        }
        public function RenderuserInfo($data){
            require_once('views/userInfo/user_info.php');
        }
        public function userInfo(){
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?page=login');
                exit();
            }

            $user_id = $_SESSION['user']['id'];

            $this->data['user_info'] = $this->userInfo->getuserInfo($user_id);
            $this->RenderuserInfo($this->data);
        }

    }

?>