<?php
session_start();
include('../connect.php');
$a = $_POST['date'];
$b = $_POST['name'];
$c = $_POST['age'];
$d = $_POST['sex'];
$e = $_POST['pn'];
$f = $_POST['sdate'];
$g = $_POST['strategy'];
$h = $_POST['vtype'];
$i = $_POST['dept'];
$j = $_POST['hivb'];
$k = $_POST['hivd'];
$l = $_POST['hrst'];
$m = $_POST['etesting'];
$n = $_POST['ereasons'];
$o = $_POST['comments'];


// query
$sql = "INSERT INTO patients (date,name,sex,age,number,sdate,tstrategy,vtype,dept,tbefore,tdate,tresults,etesting,ereasons,comments) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,':o'=>$o));

header("location:redirect.php");


?>