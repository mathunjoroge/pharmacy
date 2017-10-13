<?php include('../connect.php');
$result = $db->prepare("SELECT product_id FROM products ORDER BY product_id DESC limit 1");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
		$id=$row['product_id']+1; ?>
		<?php } ?>
		<?php
$Today = date('y:m:d',time());
                $new = date('d/m/y', strtotime($Today));
                echo $new;
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = $_POST['name'];
$c = $_POST['o_price']*$_POST['markup'];
$d = $_POST['supplier'];
$e = $_POST['qty'];
$f = $_POST['o_price'];
$g = $c-$f;
$h = $_POST['gen']; 
$i = $_POST['exdate']; 
$j=$e;
$k = $_POST['level'];   
$l = $_POST['markup'];
$bn='entry batch';


// query
$sql = "INSERT INTO products (product_code,product_name,price,supplier,qty,o_price,profit,gen_name,expiry_date,instock,level,markup) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l));
//add a product into batch table
$date=$new;
$sql = "INSERT INTO batch (date,product_id,batch_no,expirydate,quantity) VALUES (:date,:pid,:bn,:edate,:c)";
$q = $db->prepare($sql);
$q->execute(array(':date'=>$date,':pid'=>$id,':bn'=>$bn,':edate'=>$i,':c'=>$e));

header("location: products.php");
?>