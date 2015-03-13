<?php
// Get the product data
$category = $_POST['category'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];

// Validate inputs
if (empty($code) || empty($name) || empty($price) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO mproducts
                 (category, productCode, productName, listPrice)
              VALUES
                 (:cat, :code, :name, :price)";
    $stm = $db->prepare($query);
    $stm->bindValue(':cat', $category, PDO::PARAM_STR);
    $stm->bindValue(':code', $code, PDO::PARAM_STR);
    $stm->bindValue(':name', $name, PDO::PARAM_STR);
    $stm->bindValue(':price', $price, PDO::PARAM_INT);
    //$stm->execute();
    
    $v = $stm->execute();
    echo "added " . $v;
    
    
    // Display the Product List page
    header('location: index2.php');
}
?>