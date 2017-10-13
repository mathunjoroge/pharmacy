<?php
// configuration
include('../connect.php');

// new data
$a = $_POST['date'];
$b = $_POST['name'];
$c = $_POST['sex'];
$d = $_POST['age'];
$e = $_POST['num'];
$f = $_POST['sys'];
$g = $_POST['dys'];
$h = $_POST['hr'];
$i = $_POST['rbs'];
$j = $_POST['fbs'];
$k = $_POST['pbs'];
$l = $_POST['temp'];
$m = $_POST['br'];
$n = $_POST['oc'];

// query
$sql = "INSERT INTO nurse (date,name,sex,age,number,systolic,diastolic,rate,rbs,fbs,pbs,temperature,br,oc) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n));
header("location: products.php?");

?>
