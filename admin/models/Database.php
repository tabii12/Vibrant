<?php
class DataBase {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "vibrant";
    private $conn;
    private $stmt;
    private $result;

    public function __construct() {
        try {
            // Kết nối tới cơ sở dữ liệu bằng PDO
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            // Đặt chế độ lỗi của PDO thành ngoại lệ
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    // Phương thức thực hiện câu truy vấn SQL chung
    public function query($sql, $param = []) {
        try {
            // Chuẩn bị câu truy vấn
            $this->stmt = $this->conn->prepare($sql);
            // Nếu có tham số, thực hiện gắn giá trị vào
            if (!empty($param)) {
                foreach ($param as $key => $value) {
                    $this->stmt->bindValue($key + 1, $value); // PDO parameters bắt đầu từ 1
                }
            }
            // Thực thi câu truy vấn
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            echo 'Query error: ' . $e->getMessage();
        }
    }

    // Phương thức lấy tất cả dữ liệu từ một câu truy vấn SQL
    public function getAll($sql, $param = []) {
        // Thực hiện câu truy vấn và trả về tất cả các kết quả
        $statement = $this->query($sql, $param);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($sql, $param = []) {
        try {
            // Chuẩn bị câu truy vấn SQL
            $this->stmt = $this->conn->prepare($sql);
            
            // Gắn giá trị cho các tham số nếu có
            if (!empty($param)) {
                foreach ($param as $key => $value) {
                    $this->stmt->bindValue($key + 1, $value); // PDO parameters bắt đầu từ 1
                }
            }
            
            // Thực thi câu truy vấn
            $this->stmt->execute();
            
            // Trả về một bản ghi duy nhất dưới dạng mảng kết hợp
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Phương thức thực hiện câu lệnh INSERT và trả về ID của bản ghi mới
    public function insert($sql, $param) {
        $this->query($sql, $param);
        return $this->conn->lastInsertId();
    }

    public function delete($sql, $param) {
        $this->query($sql, $param);  
    }
    

    public function getConnection() {
        return $this->conn;
    }
}
?>
