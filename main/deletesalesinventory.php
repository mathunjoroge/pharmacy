<?php
include('../connect.php');

// Get the ID of the transaction to delete
$id = $_POST['id'];

// Log the received transaction ID for debugging
error_log("Received transaction ID: " . $id);

// Retrieve the quantity from the sales order
$result = $db->prepare("SELECT * FROM sales_order WHERE transaction_id = :id");
$result->bindParam(':id', $id);
$result->execute();
$row = $result->fetch();
$qty = $row['qty'];
$product_id=$row['product'];

// Log the retrieved quantity for debugging
error_log("Retrieved quantity: " . $qty);

// Delete the sales order
$result = $db->prepare("DELETE FROM sales_order WHERE transaction_id = :id");
$result->bindParam(':id', $id);
$result->execute();

// Log the result of the delete operation for debugging
$errorInfo = $result->errorInfo();
if ($errorInfo[0] !== '00000') {
    error_log("Error deleting sales order: " . $errorInfo[2]);
} else {
    error_log("Sales order deleted successfully");
}

// Update the product quantity
$sql = "UPDATE products 
        SET qty = qty + :qty
        WHERE product_id = :product_id";
$result = $db->prepare($sql);
$result->bindParam(':qty', $qty);
$result->bindParam(':product_id', $product_id);
$result->execute();

// Log the result of the update operation for debugging
$errorInfo = $result->errorInfo();
if ($errorInfo[0] !== '00000') {
    error_log("Error updating product quantity: " . $errorInfo[2]);
} else {
    error_log("Product quantity updated successfully");
}

// Redirect back to the sales inventory page
header("location: sales_inventory.php");

?>

