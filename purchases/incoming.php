<?php
ini_set("display_errors", "On");
?><?php
session_start();
include('../connect.php');
$percent='0.01';
$m='1.33';
$mn=$_POST['cost'];
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$bn=$_POST['bno'];
$edate = $_POST['edate'];
$date = $_POST['date'];
$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$mn/$c;
$code=$row['product_code'];
$gen=$row['gen_name'];
$name=$row['product_name'];
$pid=$row['product_id'];

}

//edit qty
$sql = "UPDATE products 
        SET  o_price=?, qty=qty+?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($asasa,$c,$b));
$fffffff=$asasa;
$d=$fffffff*$c;
// query
$sql = "INSERT INTO batch (date,product_id,batch_no,expirydate,quantity) VALUES (:date,:pid,:bn,:edate,:c)";
$q = $db->prepare($sql);
$q->execute(array(':date'=>$date,':pid'=>$pid,':bn'=>$bn,':edate'=>$edate,':c'=>$c));

// query
$sql = "INSERT INTO pending (invoice,product,qty,price,amount,date,batch) VALUES (:a,:b,:c,:f,:mn,:k,:batch)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':f'=>$asasa,':mn'=>$mn,':k'=>$date,':batch'=>$bn));
header("location: sales.php?id=$w&invoice=$a");


?>