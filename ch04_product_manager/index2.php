<?php
    require_once('database.php');

    

    // Get products for selected category
    $query = "SELECT * FROM mproducts
              ORDER BY productID";
    $products = $db->query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Product Manager</h1>
    </div>

    <div id="main">

        <div id="content">
            <!-- display a table of products -->
            <h2>Product list</h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th class="right">Price</th>
                    <th>Category</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td class="right"><?php echo $product['listPrice']; ?></td>
                    <td><?php echo $product['category']; ?></td>
                    <td><form action="delete_product.php" method="post"
                              id="delete_product_form">
                        <input type="hidden" name="product_id"
                               value="<?php echo $product['productID']; ?>" />
                        
                        <input type="submit" value="Delete" />
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <p><a href="add_product_form.php">Add Product</a></p>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>