<?php
session_start(); 
include('../connect.php');

// Enable error display
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get values from POST
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['telephone'];
$slogan = $_POST['slogan'];
$email = $_POST['email'];   

// Update pharmacy details in the database
$sql = "UPDATE pharmacy_details
        SET  pharmacy_name=?,
             location=?,
             contact=?,
             slogan=?,
             email=?";
$q = $db->prepare($sql);
if (!$q) {
    $error = $db->errorInfo()[2]; // Get error message if query preparation fails
    echo "Error preparing query: $error"; // Echo error message
    exit(); // Stop script execution
}

if (!$q->execute(array($name, $address, $phone, $slogan, $email))) {
    $error = $q->errorInfo()[2]; // Get error message if query execution fails
    echo "Error executing query: $error"; // Echo error message
    exit(); // Stop script execution
}

// Redirect to index.php after updating
header("location: index.php");
exit();
?>
