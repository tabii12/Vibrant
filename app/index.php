<?php
    ob_start();
    session_start();

    require_once 'controllers/HomeController.php';

    require_once 'models/Database.php';
    require_once 'models/ProductModel.php';
    require_once 'models/UserModel.php';

    require_once 'views/header/header.php';
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){
            case 'register':
                $home = new HomeController();
                $home->registerPage();
                break;
            case 'login';
                $home = new HomeController();
                $home->loginPage();
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