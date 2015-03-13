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
    //(category, productCode, productName, listPrice) : my placeholder
    $stm = $db->prepare($query);
    $stm->bindParam(':cat', $category, PDO::PARAM_STR, 50);
    $stm->bindParam(':code', $code, PDO::PARAM_STR, 50);
    $stm->bindParam(':name', $name, PDO::PARAM_STR, 200);
    $stm->bindParam(':price', $price, PDO::PARAM_INT);
    $stm->execute();

    $category = "brass";
    $code = "newcode";
    $name ="namesde";
    $price = 599;

    $stm->execute();
    // Display the Product List page
    header('location: index2.php');
}
?>