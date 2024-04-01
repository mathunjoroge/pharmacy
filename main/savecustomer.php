<?php
ini_set("display_errors", "On");
session_start();
include('../connect.php');

$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];

$fields_to_remove = ['membership_number', 'prod_name', 'expected_date', 'note'];

foreach ($fields_to_remove as $field) {
    $query = $db->query("SHOW COLUMNS FROM customer LIKE '$field'");
    $field_exists = $query->fetch(PDO::FETCH_ASSOC);

    if ($field_exists) {
        $sql = "ALTER TABLE `customer` DROP COLUMN `$field`";
        $q = $db->prepare($sql);
        $q->execute();
    }
}

$query = $db->query("SHOW INDEX FROM customer WHERE Key_name = 'PRIMARY'");
$primary_key = $query->fetch(PDO::FETCH_ASSOC);

if (!$primary_key) {
    $sql = "ALTER TABLE `customer` MODIFY `customer_id` INT(11) NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`customer_id`)";
    $q = $db->prepare($sql);
    $q->execute();
}

$sql = "INSERT INTO customer (customer_name, address, contact) VALUES (:a, :b, :c)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b, ':c' => $c));

header("location: customer.php");
?>
