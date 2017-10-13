<?php
session_start();//edit qty

include('../connect.php');
$a = $_SESSION['iv'];
$b = $_POST['date'];
$dd = $_POST['ptype'];
$d = $_SESSION['remarks'];
$supp = $_POST['supplier']; 
$cos=$_SESSION['cost'];
$result = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :a");
$result->bindParam(':a', $a);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$cos;
}
//edit qty in purchases item


//edit qty

$sql = "INSERT INTO purchases (invoice_number,date,supplier,ptype,remarks,cost) VALUES (:a,:b,:supp,:dd,:d,:cos)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':supp'=>$supp,':dd'=>$dd,':d'=>$d,':cos'=>$cos));
//delete previous empty record
$query = "SELECT invoice_number FROM purchases WHERE invoice_number = " . $a AND cost<0 ;
$row = mysqli_fetch_assoc(mysqli_query($con, $query));
$request_date = $row['invoice_number'];

$sql = "DELETE FROM purchases WHERE invoice_number=".$a AND cost<0 ;



header("location: success.php?");


?>
