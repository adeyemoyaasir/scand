<?php
include_once ('dbh.php');
class Database {
    private $conn;

    public function __construct(DatabaseConnection $databaseConnection) {
        $this->conn = $databaseConnection->getConnection();
    }

    public function insertData($sku, $name, $price, $weight, $size, $height, $width, $length) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM products WHERE sku = :sku");
        $stmt->bindParam(':sku', $sku);
        if (!$stmt->execute()) {
            throw new Exception("Trying to save sku: " . $stmt->errorInfo()[2]);
        }
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            throw new Exception("SKU already exists in database.");
        }
        
        $dimensions = "{$height}x{$width}x{$length}";
        
        try {
            $stmt = $this->conn->prepare("INSERT INTO products (sku, name, price, weight, size, dimension) VALUES (:sku, :name, :price, :weight, :size, :dimension)");
            $stmt->bindParam(":sku", $sku);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":weight_kg", $weight);
            $stmt->bindParam(":size_mb", $size);
            $stmt->bindParam(":dimension", $dimensions);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getData() {
        $stmt = $this->conn->prepare("SELECT * FROM products");
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array('status' => 'success', 'data' => $result);
        } else {
            $error = $stmt->errorInfo();
            return array('status' => 'error', 'message' => $error[2]);
        }
    }
}
