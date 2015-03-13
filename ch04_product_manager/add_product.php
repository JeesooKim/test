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
                 (categoryID, productCode, productName, listPrice)
              VALUES
                 ('$category', '$code', '$name', '$price')";
    $db->exec($query);

    // Display the Product List page
    header('location: index.php');
}
?>