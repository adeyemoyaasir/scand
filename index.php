 <?php

// include_once("crud.php");
// include_once("book.php");
// include_once("furniture.php");
// include_once("dvd.php");

// $crud = new CRUD();
// $result = $crud->readAll();
// $objects = [];

// foreach ($result as $row) {
//   $type = $row["type"];
//   $product = new $type();
//   $product->setAttributes($row);
//   array_push($objects, $product);
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet" />
  <title>Product Add</title>
  <link rel="stylesheet" href="productlist.css" />
</head>

<body>
  <nav>
    <ul>
      <li>
        <h1>Product List</h1>
      </li>
      <li>
       <!-- <a href="./add.php"><button>ADD</button></a> -->
       <button><a href="./add.php">ADD</a></button>

      </li>
      <li><button type="submit" form="items-form">MASS DELETE</button></li>
    </ul>
  </nav>
  
  <script src="./delete.js"></script>
</body>

</html>
