<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];
$cname = $_POST['cname'];
$h = $_POST['opdno'];
$age = $_POST['age'];
$sex = $_POST['sex'];
if($d=='credit') {
$f = $_POST['due'];
$sql = "INSERT INTO expiriestt (invoice_number,cashier,date,type,amount,profit,due_date,) VALUES (:a,:b,:c,:d,:e,:z,:f)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f));
header("location: preview.php?invoice=$a");
exit();
}
if($d=='cash') {
$f = $_POST['cash'];
$sql = "INSERT INTO expiriestt (invoice_number,cashier,date,type,amount,profit,cashtendered) VALUES (:a,:b,:c,:d,:e,:z,:f)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f));
header("location: preview.php?invoice=$a");
exit();
}
// query



?>
