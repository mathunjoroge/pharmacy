<?php
session_start();
include('../connect.php');
$a = $_POST['iv'];
$b = $_POST['date'];
$dd = $_POST['purchase_type'];
$d = $_POST['remarks'];
$supp = $_POST['supplier'];

// query
$sql = "INSERT INTO purchases (invoice_number,date,supplier,ptype,remarks) VALUES (:a,:b,:supp,:d,:dd)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':supp'=>$supp,':d'=>$d,':dd'=>$dd));

header("location: purchasesportal.php?iv=$a");


?>