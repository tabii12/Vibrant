<?php   
    class HomeController {
        private $product;
        private $user;
        private $checkout;
        private $data = [];

        public function __construct() {
            $this->product = new ProductModel();
            $this->user = new UserModel();
            $this->checkout = new CheckoutModel();
        }

        public function renderPage($data, $page) {
            require_once 'views/'.$page.'/'.$page.'.php';
        }

        public function homePage() {
            $this->data['product'] = $this->product->getProduct();
            $this->data['BCTT'] = $this->product->getBCTT();
            $this->data['productDB'] = $this->product->getProductDB();
            $this->data['productNewGN'] = $this->product->getProduct1AnhNewGN();
            $this->data['productNewGNw'] = $this->product->getProduct1AnhNewGNw();
            $this->data['productNewTT'] = $this->product->getProduct1AnhNewTT();
            $this->data['productNewDB'] = $this->product->getProduct1AnhNewDB();
            $this->renderPage($this->data, 'home');
        }

        public function registerPage() {
            $error_message = ""; // Khởi tạo biến để lưu thông báo lỗi
        
            if (isset($_POST['submit'])) {
                $data = [];
                $data['ten_dang_nhap'] = $_POST['ten_dang_nhap'];
                $data['email'] = $_POST['email'];
                $data['sdt'] = $_POST['sdt'];
                $data['mat_khau'] = $_POST['mat_khau'];
                $data['xac_nhan_mat_khau'] = $_POST['xac_nhan_mat_khau'];
        
                // Kiểm tra xác nhận mật khẩu
                if ($data['mat_khau'] !== $data['xac_nhan_mat_khau']) {
                    $error_message = "Xác nhận mật khẩu không khớp!";
                } else {
                    // Gọi phương thức model để đăng ký
                    $register_result = $this->user->register($data);
        
                    if (!$register_result) {
                        // Nếu đăng ký thất bại
                        $error_message = "Tài khoản đã tồn tại!"; 
                    } else {
                        // Chuyển hướng đến trang login nếu đăng ký thành công
                        echo '<script>location.href="index.php?page=login"</script>';
                        exit();
                    }
                }
            }
        
            require_once 'views/register/register.php';
        }
        
        public function loginPage(){

            $error_message = '';
            if(isset($_POST['submit'])){
                $data = [];
                $data['ten_dang_nhap'] = $_POST['ten_dang_nhap'];
                $data['mat_khau'] = $_POST['mat_khau'];

                $login_result = $this->user->getUserByUsername($data['ten_dang_nhap']);

                if ($login_result === null) {
                    $error_message = "Tên đăng nhập không tồn tại!";
                } elseif (!isset($data['mat_khau']) || $data['mat_khau'] === '') {
                    $error_message = "Chưa nhập mật khẩu!";
                } elseif ($data['mat_khau'] !== $login_result['mat_khau']) {
                    $error_message = "Mật khẩu không đúng!";
                } else {
                    // Đăng nhập thành công
                    $_SESSION['user'] = $login_result;
                    echo 'hi';
                
                    if ($login_result['role'] == "admin") {
                        header('Location: ../admin/index.php');
                        exit();
                    } else {
                        echo '<script>location.href="index.php?page=home";</script>';
                        exit();
                    }
                }
            } 
            
            require_once 'views/login/login.php';
        }

        public function productPage(){
            $this->data['products'] = $this->product->getProduct1Anh();
            $this->data['brands'] = $this->product->getBrand();
            $this->data['BCTT'] = $this->product->getBCTT();

            if(isset($_GET['danh_muc'])){
                $danh_muc = $_GET['danh_muc'];

                switch($danh_muc){
                    case '1':
                        $this->data['products'] = $this->product->getProduct1AnhTheoDanhMuc('1');
                        if(isset($_POST['filter1'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('1', '1000000', '2000000');
                        }
                        if(isset($_POST['filter2'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('1', '2000000', '3000000');
                        }
                        if(isset($_POST['filter3'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('1', '3000000', '10000000');
                        }
                        if(isset($_POST['brand1'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('1', '1');
                        }
                        if(isset($_POST['brand2'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('1', '2');
                        }
                        if(isset($_POST['brand3'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('1', '3');
                        }
                        if(isset($_POST['brand4'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('1', '4');
                        }
                        break;
                    case '2':
                        $this->data['products'] = $this->product->getProduct1AnhTheoDanhMuc('2');
                        if(isset($_POST['filter1'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('2', '1000000', '2000000');
                        }
                        if(isset($_POST['filter2'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('2', '2000000', '3000000');
                        }
                        if(isset($_POST['filter3'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('2', '3000000', '10000000');
                        }
                        if(isset($_POST['brand1'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('2', '1');
                        }
                        if(isset($_POST['brand2'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('2', '2');
                        }
                        if(isset($_POST['brand3'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('2', '3');
                        }
                        if(isset($_POST['brand4'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('2', '4');
                        }
                        break;
                    case '3':
                        $this->data['products'] = $this->product->getProduct1AnhTheoDanhMuc('3');
                        if(isset($_POST['filter1'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('3', '1000000', '2000000');
                        }
                        if(isset($_POST['filter2'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('3', '2000000', '3000000');
                        }
                        if(isset($_POST['filter3'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('3', '3000000', '10000000');
                        }
                        if(isset($_POST['brand1'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('3', '1');
                        }
                        if(isset($_POST['brand2'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('3', '2');
                        }
                        if(isset($_POST['brand3'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('3', '3');
                        }
                        if(isset($_POST['brand4'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('3', '4');
                        }
                        break;
                    case '4':
                        $this->data['products'] = $this->product->getProduct1AnhTheoDanhMuc('4');
                        if(isset($_POST['filter1'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('4', '1000000', '2000000');
                        }
                        if(isset($_POST['filter2'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('4', '2000000', '3000000');
                        }
                        if(isset($_POST['filter3'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucfilter('4', '3000000', '10000000');
                        }
                        if(isset($_POST['brand1'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('4', '1');
                        }
                        if(isset($_POST['brand2'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('4', '2');
                        }
                        if(isset($_POST['brand3'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('4', '3');
                        }
                        if(isset($_POST['brand4'])){
                            $this->data['products'] = $this->product->getProduct1AnhTheoDanhMucbrand('4', '4');
                        }
                        break;
                }


            }

            $this->renderPage($this->data, "product");
        }

        public function cartPage(){
            $this->data['BCTT'] = $this->product->getBCTT();
            if(isset($_POST['submit'])){
                $product_id = $_POST['product_id'];
                $this->data['product'] = $this->product->get1Product1Anh($product_id);

                $product_name = $this->data['product']['ten_san_pham'];
                $product_price = $this->data['product']['gia'];
                $product_url = $this->data['product']['url'];


                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]['quantity'] += 1;
                } else {
                    $_SESSION['cart'][$product_id] = [
                        'id' => $product_id,
                        'ten_san_pham' => $product_name,
                        'gia' => $product_price,
                        'url' => $product_url,
                        'quantity' => 1
                    ];
                }
            }
            if(isset($_POST['delProduct'])){
                $product_id = $_POST['product_id'];
                
                unset($_SESSION['cart'][$product_id]);
            }
            $this->renderPage($this->data, "cart");
        }

        public function checkoutPage(){
            $this->data['products'] = $this->product->getProduct1Anh();
            if(isset($_POST['buyNow'])){
                $product_id = $_POST['product_id'];
                $this->data['product'] = $this->product->get1Product1Anh($product_id);

                $product_name = $this->data['product']['ten_san_pham'];
                $product_price = $this->data['product']['gia'];
                $product_url = $this->data['product']['url'];


                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]['quantity'] += 1;
                } else {
                    $_SESSION['cart'][$product_id] = [
                        'id' => $product_id,
                        'ten_san_pham' => $product_name,
                        'gia' => $product_price,
                        'url' => $product_url,
                        'quantity' => 1
                    ];
                }
            }
            if(isset($_SESSION['cart']) && isset($_SESSION['user'])){
                if(isset($_POST['km'])){
                    $makm = $_POST['ma_nhap'];
                    $km = $this->product->getKM();
                    $count = 0;
                    foreach($km as $ma){
                        if($ma['ma_nhap'] == $makm){
                            $discount = $ma['phan_tram_giam'];
                            $idDiscount = $ma['id'];
                        }
                        $count++;
                    }
                    if (isset($discount)) {
                        $true_message = 'Bạn đã được giảm ' . $discount . '%';
                    } else {
                        $error_message = "Mã không hợp lệ hoặc đã hết hạng!";
                    }                  
                }

                if(isset($_POST['submit'])){
                    $data = [];
                    $data['phuong_thuc_thanh_toan'] = $_POST['payment_method'];
                    $data['nguoi_nhan'] = $_POST['ten_nguoi_nhan'];
                    $data['dia_chi'] = $_POST['dia_chi'];
                    $data['sdt'] = $_POST['sdt'];
                    $data['tong_gia'] = $_POST['tong_gia'];
                    if (empty($_POST['id_khuyen_mai'])) {
                        $data['id_khuyen_mai'] = NULL;
                    } else {
                        $data['id_khuyen_mai'] = $_POST['id_khuyen_mai'];
                    }

                    $oderId = $this->checkout->createOrder($data);

                    if ($oderId) {
                        $products = $_SESSION['cart'];
                        $this->checkout->addOrderDetails($oderId, $products);

                        unset($_SESSION['cart']);

                        header('Location: index.php?page=home');
                        echo '<script>alert("Đơn hàng đã được tạo thành công!");</script>';
                    } else {
                        echo '<script>alert("Đã xảy ra lỗi khi tạo đơn hàng!");</script>';
                    }
                }

            }
            if(!isset($_SESSION['user'])){
                header('Location: index.php?page=login');
                echo 'Vui đăng nhập trước khi thanh toán!';
            }
            require_once 'views/thanhtoan/thanhtoan.php';
        }
    }