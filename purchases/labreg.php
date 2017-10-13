<?php
// configuration
include('../connect.php');

// new data
$a = $_POST['date'];
$b = $_POST['name'];
$c = $_POST['sex'];
$d = $_POST['age'];
$e = $_POST['num'];
$f = $_POST['mal'];
$g = $_POST['wid'];
$h = $_POST['pg'];
$i = $_POST['rbs'];
$j = $_POST['fbs'];
$k = $_POST['pbs'];
$l = $_POST['oc'];
$s = $_POST['sat'];
// query
$sql = "INSERT INTO lab (date,name,sex,age,number,mps,widal,pregnancy,rbs,fbs,pbs,others,sat) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:s)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':s'=>$s));
header("location: products.php?");

?>