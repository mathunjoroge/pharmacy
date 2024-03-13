<?php
ini_set("display_errors", "On");
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$batch = $_POST['batch'];
$c = $_POST['quantity'];
$w = $_POST['pt'];
if (empty($_POST['pc'])) {
    $_POST['pc'] = 0;
} else {
    // $_POST['pc'] is already set and non-empty, no action needed
}
$disc = $_POST['pc'];
$date = date('Y-m-d');
$discounted_price=$_POST['pr'] - ($_POST['pr'] * ($disc));

$result = $db->prepare("SELECT o_price,qty,product_id FROM products WHERE product_id= :product_id");
$result->bindParam(':product_id', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$p=$discounted_price-$row['o_price'];
$bal = $row['qty'];
$pid=$row['product_id'];
$m =$_SESSION['SESS_FIRST_NAME'];
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

$d=$discounted_price*$c;
$profit=$p*$c;
// query
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,price,profit,date,discount,batch) VALUES (:a,:b,:c,:d,:f,:h,:k,:disc,:bt)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$discounted_price,':h'=>$profit,':k'=>$date,':disc'=>$disc,
	':bt'=>$batch));

header("location: sales.php?id=cash&invoice=$a");


?>