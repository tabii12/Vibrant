<?php
    ob_start();
    session_start();
    require_once 'controllers/HomeController.php';
    require_once 'controllers/Product_detail_controller.php';
    require_once 'controllers/thanh_toan_controller.php';

    require_once 'models/Database.php';
    require_once 'models/ProductModel.php';
    require_once 'models/UserModel.php';
    require_once 'models/detailModel.php';
    require_once 'models/thanh_toan_model.php';
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
            case 'thanhtoan':
                $donhang = new ThanhToanController();
                $donhang->donhang();  
                        
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
    