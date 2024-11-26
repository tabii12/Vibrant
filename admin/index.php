<?php
    ob_start();
    session_start();

    require_once 'controllers/AdminController.php';

    require_once 'models/Database.php';
    require_once 'models/khuyenMaiModel.php';

    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){
            case 'khuyenMai':
                $admin = new AdminController();
                $admin->khuyenMaiPage();
                break;
                
        }
    }else{
    }

    ob_end_flush();