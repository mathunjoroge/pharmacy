<?php
ini_set("display_errors", "On");
session_start();
include('../connect.php');

// Constants
$percent = 0.01;

// Fetching data from POST
$invoice_id = $_POST['invoice'];
$product_id = $_POST['product'];
$quantity = $_POST['qty'];
$price = $_POST['price'];
$date = date('Y-m-d');
$cashier=$_SESSION['SESS_FIRST_NAME'];

// Fetch product details
$product_query = $db->prepare("SELECT * FROM products WHERE product_id = :product_id");
$product_query->bindParam(':product_id', $product_id);
$product_query->execute();
while ($row = $product_query->fetch()) {
    $total_price = $price * $quantity;
    $product_id = $row['product_id'];

    // Update product quantity
    $update_sql = "UPDATE products SET qty = qty + ? WHERE product_id = ?";
    $update_query = $db->prepare($update_sql);
    $update_query->execute(array($quantity, $product_id));
    
    // Insert into returns table
    $insert_sql = "INSERT INTO returns (invoice, product, qty, amount, date,price,cashier) VALUES (?, ?, ?, ?, ?,?,?)";
    $insert_query = $db->prepare($insert_sql);
    $insert_query->execute(array($invoice_id, $product_id, $quantity, $total_price, $date,$price,$cashier));
}

// Redirect
header("location: returns.php?id=$w&invoice=$invoice_id");
?>
