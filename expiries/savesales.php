<?php
session_start();
ini_set("display_errors", "On");
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['amount'];
$e = -$_POST['amount'];
// Alter the table to allow NULL values for 'type' column
$sql = "ALTER TABLE `expiriestt` MODIFY COLUMN `type` VARCHAR(255) DEFAULT NULL";
$q = $db->prepare($sql);
$q->execute();

// Drop the 'type' column
$sql = "ALTER TABLE `expiriestt` DROP COLUMN `type`";
$q = $db->prepare($sql);
$q->execute();

// Drop unnecessary columns
$sql = "ALTER TABLE `expiriestt`
  DROP COLUMN `cashtendered`,
  DROP COLUMN `name`,
  DROP COLUMN `balance`";
$q = $db->prepare($sql);
$q->execute();


$sql = "INSERT INTO expiriestt (invoice_number,cashier,date,amount,profit) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
header("location: preview.php?invoice=$a");

?>
