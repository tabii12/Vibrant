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

            if(isset($_POST['submit'])){
                $data = [];
                $data['id'] = $_SESSION['user']['id'];
                $data['ten_nguoi_dung'] = $_POST['name'];
                $data['email'] = $_POST['email'];
                $data['sdt'] = $_POST['sdt'];
                $data['gioi_tinh'] = $_POST['gender'];
                $data['ngay_sinh'] = $_POST['birth_date'];

                $this->editUserInfo->updateUserInfo($data);
                header('Location: index.php?page=userInfo');
            }
        }

    }

?>