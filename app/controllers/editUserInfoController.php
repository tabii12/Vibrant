<?php
    class editUserInfoController{
        public $editUserInfo;
        public $data = [];

        public function __construct(){
            $this->editUserInfo = new editUserInfoModel();
        }
        public function RendereditUserInfo($data){
            require_once('views/editUserInfo/edit_userInfo.php');
        }
        public function editUserInfo(){
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?page=login');
                exit();
            }

            $user_id = $_SESSION['user']['id'];

            $this->data['user_info'] = $this->editUserInfo->geteditUserInfo($user_id);
            $this->RendereditUserInfo($this->data);
        }

    }

?>