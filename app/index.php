<?php
    ob_start();
    session_start();
    require_once 'controllers/HomeController.php';
    require_once 'controllers/Product_detail_controller.php';
    require_once 'controllers/userInfoController.php';
    require_once 'controllers/editUserInfoController.php';
    require_once 'controllers/editPwUserController.php';

    require_once 'models/Database.php';
    require_once 'models/ProductModel.php';
    require_once 'models/UserModel.php';
    require_once 'models/detailModel.php';
    require_once 'models/CheckoutModel.php';
    require_once 'models/userInfoModel.php';
    require_once 'models/editUserInfoModel.php';
    require_once 'models/editPwUserModel.php';
    
    require_once 'views/header/header.php';

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }


    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){

            case 'detail' : 
                $detail = new DetailController();
                $detail->detail();   
                break;      
            case 'register':
                $home = new HomeController();
                $home->registerPage();
                break;
            case 'login';
                $home = new HomeController();
                $home->loginPage();
                break;
            case 'logout':
                require_once 'views/logout.php';
                break;
            case 'product':
                $home = new HomeController();
                $home->productPage();
                break;
            case 'cart':
                $home = new HomeController();
                $home->cartPage();
                break;
            case 'checkout':
                $home = new HomeController();
                $home->checkoutPage();
                break;
            case 'userInfo':
                $home = new userInfoController();
                $home->userInfo();
                break;
            case 'edituserinfo':
                $home = new editUserInfoController();
                $home->editUserInfo();
                break;
            case 'editpwuser':
                $home = new editPwUserController();
                $home->editPwUser();
                break;
            default:
                $home = new HomeController();
                $home->homePage();
        }
    }else{
        $home = new HomeController();
        $home->homePage();
    }

    require_once 'views/footer/footer.php';
    ob_end_flush();
    