<?php
session_start();
include('../connect.php');
$a = $_POST['dt'];
$b = $_POST['exp'];
$c = $_POST['amt'];
$d = $_SESSION['SESS_FIRST_NAME'];
$e = $_POST['rmk'];



// query
$sql = "INSERT INTO salaries (date,employee,amount,paidby,rmks) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
header("location: salaries.php");


?>