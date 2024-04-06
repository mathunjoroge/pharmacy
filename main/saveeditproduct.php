<?php
// Configuration
ini_set("display_errors", "On");
include('../connect.php');

// Check if POST data is set
// Check if any POST data is missing
// Check if any POST data is missing or empty
if (
    empty($_POST['id']) || 
    empty($_POST['code']) || 
    empty($_POST['gen']) || 
    empty($_POST['name']) || 
    empty($_POST['o_price']) || 
    empty($_POST['s_price']) || 
    empty($_POST['sold']) || 
    empty($_POST['markup']) || 
    empty($_POST['level']) || 
    empty($_POST['qty'])
) {
    // Redirect with error message
    header("location: products.php?error=Some POST data is missing or empty");
    exit();
}



// Assign POST data to variables
$id = $_POST['id'];
$a = $_POST['code'];
$z = $_POST['gen'];
$b = $_POST['name'];
$g = $_POST['o_price'];
$price = $_POST['s_price'];
$j = $_POST['sold'];
$k = $_POST['markup'];
$m = $_POST['level'];
$qty = $_POST['qty'];

// Query to update product
$sql = "UPDATE products 
        SET product_code=?, gen_name=?, product_name=?,  o_price=?, price=?, level=?, markup=?, qty=?
        WHERE product_id=?";
$q = $db->prepare($sql);

// Execute update query
if (!$q->execute(array($a, $z, $a, $g, $price, $m, $k, $qty, $id))) {
    // Redirect with error message
    header("location: products.php?error=Failed to update product");
    exit();
}

// Query to update batch number quantity
$sql = "UPDATE batch 
        SET quantity=?
        WHERE product_id=?";
$q = $db->prepare($sql);

// Execute update query
if (!$q->execute(array($qty, $id))) {
    // Redirect with error message
    header("location: products.php?error=Failed to update batch quantity");
    exit();
}

// Redirect to products.php on successful update
header("location: products.php");
exit();
?>
