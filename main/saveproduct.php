<?php
$Today = date('y-m-d',time());
                $new = date('d/m/y', strtotime($Today));
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = $_POST['name'];
$l = $_POST['selling']/$_POST['o_price'];
$c = $_POST['o_price']*$l;
$e = $_POST['qty'];
$f = $_POST['o_price'];
$g = $c-$f;
$h = $_POST['gen']; 
$i= date('m-Y', strtotime('+2 years'));
$j=$e;
$k = $_POST['level'];  
$bn='entry batch';
// query
$sql = "INSERT INTO products (product_code,product_name,price,qty,o_price,gen_name,expiry_date,instock,level,markup) VALUES (:a,:b,:c,:e,:f,:h,:i,:j,:k,:l)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':e'=>$e,':f'=>$f,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l));
//add a product into batch table
$date=$new;
//update batch no
$result = $db->prepare("SELECT product_id FROM products order by product_id DESC limit 1");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
	$pid= $row['product_id'];
	$edate= date('m-Y', strtotime('+2 years'));
$sql = "INSERT INTO batch (date,product_id,batch_no,expirydate,quantity) VALUES (:date,:pid,:bn,:edate,:c)";
$q = $db->prepare($sql);
$q->execute(array(':date'=>$date,':pid'=>$pid,':bn'=>$bn,':edate'=>$edate,':c'=>$e));
}

header("location: products.php");
?>