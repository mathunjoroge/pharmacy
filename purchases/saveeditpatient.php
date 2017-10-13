<?php
// configuration
include('../connect.php');

// new data
$a = $_POST['date'];
$b = $_POST['name'];
$c = $_POST['sex'];
$d = $_POST['age'];
$e = $_POST['num'];
$f = $_POST['history'];
$g = $_POST['examination'];
$h = $_POST['requests'];
$i = $_POST['assessment'];
$j = $_POST['reports'];
$k = $_POST['plan'];


// query
$sql = "INSERT INTO clinician (date,name,sex,age,number,history,examination,requests,assessment,reports,plan) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k));
header("location: products.php?");

?>
