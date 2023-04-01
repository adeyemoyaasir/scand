<?php
class DatabaseConnection {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "product_db";
    
    private $conn;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        
        try {
            $this->conn = new PDO($dsn, $this->user, $this->pwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getConnection() {
        return $this->conn;
    }
}
?>