<?php
    class editPwUserController{
        public $editPwUser;
        public $data = [];

        public function __construct(){
            $this->editPwUser = new editPwUserModel();
        }
        public function RendereditPwUser($data){
            require_once('views/editPwUser/editPwUser.php');
        }
        public function editPwUser(){
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?page=login');
                exit();
            }

            $user_id = $_SESSION['user']['id'];

            $this->data['user_info'] = $this->editPwUser->geteditPwUser($user_id);
            $this->RendereditPwUser($this->data);
        }

    }

?>