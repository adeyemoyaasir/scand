<?php
include_once("dbh.php");
include_once("config.php");

$db = new DatabaseConnection();
$conn = $db->getConnection();

// Process form data
$sku = isset($_POST["sku"]) ? $_POST["sku"] : '';
$name = isset($_POST["name"]) ? $_POST["name"] : '';
$price = isset($_POST["price"]) ? $_POST["price"] : '';
$type = isset($_POST["type"]) ? $_POST["type"] : '';

$weight = null;
$size = null;
$height = null;
$width = null;
$length = null;

if ($type == "book") {
    $weight = isset($_POST["weight"]) ? $_POST["weight"] : null;
} else if ($type == "DVD") {
    $size = isset($_POST["size"]) ? $_POST["size"] : null;
} else if ($type == "Furniture") {
    $height = isset($_POST["height"]) ? $_POST["height"] : null;
    $width = isset($_POST["width"]) ? $_POST["width"] : null;
    $length = isset($_POST["length"]) ? $_POST["length"] : null;
}

// Prepare the statement
$stmt = $conn->prepare("INSERT INTO products (name, price, type, weight, size, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");


// Bind the parameters
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $price);
$stmt->bindParam(3, $type);
$stmt->bindParam(4, $weight);
$stmt->bindParam(5, $size);
$stmt->bindParam(6, $height);
$stmt->bindParam(7, $width);
$stmt->bindParam(8, $length);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}

// Close the statement and connection
$stmt->closeCursor();
$conn = null;
?>
