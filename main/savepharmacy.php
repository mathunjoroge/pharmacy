<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c= $_POST['telephone'];
$d= $_POST['email'];
$e= $_POST['slogan'];
$sql = "INSERT INTO pharmacy_details (pharmacy_name,location,contact,email,slogan) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
header("location: index.php?"); 
?>

