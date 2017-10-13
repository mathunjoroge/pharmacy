<?php
session_start();
include('../connect.php');
$a = date("mm/dd/yyyy");
$b = $_POST['name'];
$c = $_POST['invoice'];
$d = $_POST['tot'];
$e = $_POST['amount2'];
$f = $_POST['remarks'];


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
$b1=$d-$dsdsd;
$balance=$b1-$e;

$sql = "INSERT INTO payments (date2,name,amount2) VALUES (:k,:l,:m,:n,:o,:p)";
$q = $db->prepare($sql);
$q->execute(array(':k'=>$a,':l'=>$b,':m'=>$c,':n'=>$e,':o'=>$f,':p'=>$balance));

$sqla = "UPDATE sales 
        SET balance=?, due_date=?
		WHERE invoice_number=?";
$qa = $db->prepare($sqla);
$qa->execute(array($balance,$f,$b));
header("location: customer_ledger.php?cname=$b");



?>