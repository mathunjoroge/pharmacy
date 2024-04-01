<?php 
ini_set("display_errors", "On");
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$batch = $_POST['batch'];
$c = $_POST['quantity'];
$disc = $_POST['pc'];
$date = date('Y-m-d');

$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
    $price=$row['o_price'];
    $code=$row['product_code'];
    $gen=$row['gen_name'];
    $name=$row['product_name'];
    $p=$price-$row['o_price'];
    $profit=(0-($row['o_price']*$c));
    $bal = $row['qty'];
    $balance = $bal-$c;
    $d=$c*$row['o_price'];
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

$exp='expiry';
// query

// Check if the product_code column exists
$sql = "SHOW COLUMNS FROM `expiries` LIKE 'product_code'";
$q = $db->prepare($sql);
$q->execute();
$columnExists = $q->fetch();

if ($columnExists) {
    //modify date column
    $sql ="ALTER TABLE `expiries` CHANGE `date` `date` DATE NOT NULL";
      $q = $db->prepare($sql);
    $q->execute();
    // Drop unwanted columns
    $sql = "ALTER TABLE `expiries`
      DROP COLUMN `product_code`,
      DROP COLUMN `gen_name`,
      DROP COLUMN `name`";
    $q = $db->prepare($sql);
    $q->execute();


// Modify column and add primary key
$sql = "ALTER TABLE `expiries` 
  CHANGE `transaction_id` `transaction_id` INT(10) NOT NULL AUTO_INCREMENT, 
  ADD PRIMARY KEY (`transaction_id`)";
$q = $db->prepare($sql);
$q->execute();

}
$sql = "INSERT INTO expiries (invoice,product,qty,amount,price,profit,date,discount,batch) VALUES (:a,:b,:c,:d,:f,:h,:k,:disc,:bt)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$price,':h'=>$profit,':k'=>$date,':disc'=>$disc,
    ':bt'=>$batch));
// prepare for bincard
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,price,profit,date,discount,batch) VALUES (:a,:b,:c,:d,:f,:h,:k,:disc,:bt)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$price,':h'=>$profit,':k'=>$date,':disc'=>$disc,
    ':bt'=>$batch));

header("location: expiries.php?id=cash&invoice=$a");
?>
