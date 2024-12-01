<?php   
    class HomeController {
        private $product;
        private $user;
        private $data = [];

        public function __construct() {
            $this->product = new ProductModel();
            $this->user = new UserModel();
        }

        public function renderPage($data, $page) {
            require_once 'views/'.$page.'/'.$page.'.php';
        }

        public function homePage() {
            $this->data['product'] = $this->product->getProduct();
            $this->data['BCTT'] = $this->product->getBCTT();
            $this->data['productDB'] = $this->product->getProductDB();
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

            $this->renderPage($this->data, "product");
        }

        public function cartPage(){
            if(isset($_POST['submit'])){
                $product_id = $_POST['product_id'];
                $this->data['product'] = $this->product->get1Product1Anh($product_id);

                $product_name = $this->data['product']['ten_san_pham'];
                $product_price = $this->data['product']['gia'];
                $product_url = $this->data['product']['url'];


                if (isset($_SESSION['cart'][$product_id])) {
                    // Nếu tồn tại, tăng số lượng
                    $_SESSION['cart'][$product_id]['quantity']++;
                } else {
                    // Nếu chưa, thêm sản phẩm mới
                    $_SESSION['cart'][$product_id] = [
                        'id' => $product_id,
                        'ten_san_pham' => $product_name,
                        'gia' => $product_price,
                        'url' => $product_url,
                        'quantity' => 1
                    ];
                }

                

            }
            require_once 'views/cart/cart.php';
        }
    }
    