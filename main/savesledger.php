<?php
session_start();
include('../connect.php');
$Today = date('m/d/20y',time());

$a = $Today;
$b = $_POST['name'];
$e = $_POST['amount2'];
$f = $_POST['type'];
$g = $_POST['confnumber'];



$results = $db->prepare("SELECT sum(amount2) FROM payments WHERE name= :a");
$results->bindParam(':a', $b);
$results->execute();
for($i=0; $rows = $results->fetch(); $i++){
$sdsdd=$rows['sum(amount2)'];
if($sdsdd==''){
$dsdsd=0;
}
if($sdsdd!=''){
$dsdsd=$rows['sum(amount2)'];
}
}				


$sql = "INSERT INTO payments (date2,name,amount2,type,confirm) VALUES (:a,:b,:e,:f,:g)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':e'=>$e,':f'=>$f,':g'=>$g));


header("location: suplier_ledger.php?cname=$b");



?>