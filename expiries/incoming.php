<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$batch = $_POST['batch'];
$b = $_POST['product'];
$c = $_POST['quantity'];
$w = $_POST['pt'];
$disc = $_POST['pc'];
$date = $_POST['date'];
$asasa=$_POST['pr'] - ($_POST['pr'] * ($disc*0.01));

$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){

$code=$row['product_code'];
$gen=$row['gen_name'];
$name=$row['product_name'];
$p=$asasa-$row['o_price'];
$pp=$row['o_price'];
$bal = $row['qty'];
$balance = $bal-$c;
}


//edit qty in batch
$sql = "UPDATE batch 
        SET quantity=quantity-?
		WHERE product_id=? AND batch_no=?";
		$q = $db->prepare($sql);
$q->execute(array($c,$b,$batch ));

//edit qty
$sql = "UPDATE products 
        SET qty=qty-?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));

$d=$pp*$c;
$profit=$p*$c;
$exp='expiry';
// query
$sql = "INSERT INTO expiries (invoice,product,qty,amount,name,price,profit,product_code,gen_name,date,discount,batch) VALUES (:a,:b,:c,:d,:e,:f,:h,:i,:j,:k,:disc,:bt)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':h'=>$profit,':i'=>$code,':j'=>$gen,':k'=>$date,':disc'=>$disc,
	':bt'=>$batch));
// prepare for bincard
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,profit,product_code,gen_name,date,discount,batch,balance) VALUES (:a,:b,:c,:d,:e,:f,:h,:i,:j,:k,:disc,:bt,:bal)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':h'=>$profit,':i'=>$code,':j'=>$gen,':k'=>$date,':disc'=>$exp,
	':bt'=>$batch,':bal'=>$balance));

header("location: sales.php?id=cash&invoice=$a");


?>
