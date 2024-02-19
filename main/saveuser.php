<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = md5(md5($_POST['pass']));
$c = $_POST['cont'];
$e = $_POST['pos'];
$f = $_POST['idno'];

// query
$sql = "INSERT INTO user (username,password,contact,name,position,idno) VALUES (:a,:b,:c,:d,:e,:f)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$a,':e'=>$e,':f'=>$f));
header("location: user.php");


?>