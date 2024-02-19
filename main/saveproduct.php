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
$sql = "INSERT INTO products (product_code,product_name,price,qty,o_price,profit,gen_name,expiry_date,instock,level,markup) VALUES (:a,:b,:c,:e,:f,:g,:h,:i,:j,:k,:l)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l));
//add a product into batch table
$date=$new;
$sql = "INSERT INTO batch (date,product_id,batch_no,expirydate,quantity) VALUES (:date,:pid,:bn,:edate,:c)";
$q = $db->prepare($sql);
$q->execute(array(':date'=>$date,':pid'=>$bn,':bn'=>$bn,':edate'=>$i,':c'=>$e));

header("location: products.php");
?>