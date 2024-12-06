<?php
    class editPwUserController{
        public $editPwUser;
        public $data = [];

        public function __construct(){
            $this->editPwUser = new editPwUserModel();
        }
        public function editPwUser(){
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?page=login');
                exit();
            }
            require_once 'views/editPwUser/editPwUser.php';

            if(isset($_POST['submit'])){
                $data = [];
                $data['cp'] = $_POST['cp'];
                $data['np'] = $_POST['np'];
                $data['cnp'] = $_POST['cnp'];

                $id = $_SESSION['user']['id'];
                
                if($data['cp'] === $_SESSION['user']['mat_khau']){
                    if($data['np'] === $data['cnp']){
                        $this->editPwUser->updatePw($data, $id);
                        header('Location: index.php?page=userInfo');
                    }else{
                        echo "Mật khẩu mới không khớp!";
                    }
                }else{
                    echo "Sai mật khẩu!";
                }
            }
        }

    }

?>