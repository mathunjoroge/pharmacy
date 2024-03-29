<?php
ini_set("display_errors", "On");
session_start();
include('../connect.php');

$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];

// Check if membership_number field exists
$query = $db->query("SHOW COLUMNS FROM customer LIKE 'membership_number'");
$field_exists = $query->fetch(PDO::FETCH_ASSOC);

if ($field_exists) {
    // If membership_number field exists, delete it from the table
    $sql = "ALTER TABLE `customer` DROP COLUMN `membership_number`";
    $q = $db->prepare($sql);
    $q->execute();
}
// Check if prod_name field exists
$query = $db->query("SHOW COLUMNS FROM customer LIKE 'prod_name'");
$field_exists = $query->fetch(PDO::FETCH_ASSOC);

if ($field_exists) {
    // If membership_number field exists, delete it from the table
    $sql = "ALTER TABLE `customer` DROP COLUMN `prod_name`";
    $q = $db->prepare($sql);
    $q->execute();
}
// Check if expected_date field exists
$query = $db->query("SHOW COLUMNS FROM customer LIKE 'expected_date'");
$field_exists = $query->fetch(PDO::FETCH_ASSOC);

if ($field_exists) {
    // If membership_number field exists, delete it from the table
    $sql = "ALTER TABLE `customer` DROP COLUMN `expected_date`";
    $q = $db->prepare($sql);
    $q->execute();
}
// Check if note field exists
$query = $db->query("SHOW COLUMNS FROM customer LIKE 'note'");
$field_exists = $query->fetch(PDO::FETCH_ASSOC);

if ($field_exists) {
    // If membership_number field exists, delete it from the table
    $sql = "ALTER TABLE `customer` DROP COLUMN `note`";
    $q = $db->prepare($sql);
    $q->execute();
}
// Check if customer_id is set as primary key with auto-increment
$query = $db->query("SHOW INDEX FROM customer WHERE Key_name = 'PRIMARY'");
$primary_key = $query->fetch(PDO::FETCH_ASSOC);

if (!$primary_key) {
    // If customer_id is not set as primary key with auto-increment, alter the table
    $sql = "ALTER TABLE `customer` MODIFY `customer_id` INT(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`customer_id`)";
    $q = $db->prepare($sql);
    $q->execute();
}

// Insert the data into the customer table
$sql = "INSERT INTO customer (customer_name, address, contact) VALUES (:a, :b, :c)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b, ':c' => $c));

header("location: customer.php");
?>
