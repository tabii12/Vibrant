<?php
    ob_start();
    session_start();
    // require_once 'views/khungAdmin/khungAdmin.php'; 
    require_once 'controllers/AdminController.php';
    require_once 'controllers/ProductController.php';
    require_once 'controllers/AddAdminController.php';
    require_once 'controllers/EditAdminController.php';
    require_once "controllers/UserController.php";
    require_once 'controllers/CommentController.php';
    require_once 'controllers/AddcateController.php';
    require_once 'controllers/OderlistController.php';

    require_once 'models/Database.php';
    require_once 'models/khuyenMaiModel.php';
    require_once 'models/UserModel.php';
    require_once 'models/EditAdminModels.php';
    require_once 'models/AddAdminModels.php';
    require_once 'models/ProductModel.php';
    require_once 'models/CommentModel.php';
    require_once 'models/CateModel.php';
    require_once 'models/OderlistModel.php';

    
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        switch($page) {
            case 'khuyenMai':
                $admin = new AdminController();
                $admin->khuyenMaiPage();
                break;
            case 'user':
                $admin = new UserController();
                $admin->ADmin();
                break;
            case 'edit':
                $admin = new EditAdminController();
                $admin->Edit();
                break;
            case 'add':
                $admin = new AddAdminController();
                $admin->Add();
                break;
            case 'product':
                $admin = new ProductController();
                $admin->Product();
                break;
            case 'comment':
                $admin = new CommentController();
                $admin->Comment();
                break;
            case 'addcate':
                $addcate = new cateController();
                $addcate->addCate();
                break;
            case 'oder':
                $Oder = new OderController();
                $Oder->Oder();
                break;

            default:
                echo "Trang không tồn tại!";
                break;
        }
    } else {
        echo "Trang chủ";
    }
    

    ob_end_flush();