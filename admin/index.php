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
    require_once 'controllers/KhachHangController.php';
    require_once 'controllers/AddProductController.php';
    require_once 'controllers/EditProductController.php';
    require_once 'controllers/OderlistController.php';
    require_once 'controllers/OderDetailController.php';
    require_once 'controllers/cateController.php';
    require_once 'controllers/AddcateController.php';
    require_once 'controllers/editcateController.php';

    require_once 'models/Database.php';
    require_once 'models/khuyenMaiModel.php';
    require_once 'models/UserModel.php';
    require_once 'models/EditAdminModels.php';
    require_once 'models/AddAdminModels.php';
    require_once 'models/ProductModel.php';
    require_once 'models/CommentModel.php';
    require_once 'models/KhachHangModel.php';
    require_once 'models/AddProductModel.php';
    require_once 'models/EditproductModel.php'; 
    require_once 'models/OderModel.php';
    require_once 'models/CateModel.php';
    require_once 'models/editcateModel.php';
    
   

    
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
            case 'customer':
                $admin = new CustomerController();
                $admin->Customer();
                break;
            case 'addproduct':
                $admin = new AddProductController();
                $admin->addProduct();
                break;
            case 'editproduct':
                $admin = new EditProductController();
                $admin->EditProduct();
                break;
            case 'oder':
                $oder = new OderController();
                $oder->Oder();
                break;
            case 'oderdetail':
                $oderdetail = new OderdetailController();
                $oderdetail->Oder_detail();
                break;
            case 'cate':
                $cate = new cateController();
                $cate->Cate();
                break;
            case 'addcate':
                $addcate = new addcateController();
                $addcate->addCate();
                break;
            case 'editcate':
                $editcate = new editcateController();
                $editcate->editCate();
                break;

            default:
                echo "Trang không tồn tại!";
                break;
        }
    } else {
        echo "Trang chủ";
    }
    

    ob_end_flush();