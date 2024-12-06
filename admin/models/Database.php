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
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    public function query($sql, $param = []) {
        try {
            $this->stmt = $this->conn->prepare($sql);
            if (!empty($param)) {
                foreach ($param as $key => $value) {
                    $this->stmt->bindValue($key + 1, $value); 
                }
            }
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            echo 'Query error: ' . $e->getMessage();
        }
    }

  
    public function getAll($sql, $param = []) {        $statement = $this->query($sql, $param);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($sql, $param = []) {
        try {
            $this->stmt = $this->conn->prepare($sql);
            if (!empty($param)) {
                foreach ($param as $key => $value) {
                    $this->stmt->bindValue($key + 1, $value);
                }
            }
            
            $this->stmt->execute();
            
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

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
