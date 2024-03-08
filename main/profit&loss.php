<?php
require_once('auth.php');
include('../connect.php');
$d1=$_GET['d1'];
$d2=$_GET['d2'];	
function formatMoney($number, $fractional=false) {
if ($fractional) {
$number = sprintf('%.2f', $number);
}
while (true) {
$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
if ($replaced != $number) {
$number = $replaced;
} else {
break;
}
}
return $number;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>
trading, profit and loss
</title>
<link href="css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
var content_vlue = document.getElementById("content").innerHTML; 

var docprint=window.open("","",disp_setting); 
docprint.document.open(); 
docprint.document.write('</head><h3 align="center"><?php

$result = $db->prepare("SELECT *  FROM pharmacy_details");
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
echo $row['pharmacy_name']; }
?></h3><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
docprint.document.write(content_vlue); 
docprint.document.close(); 
docprint.focus(); 
}
</script>
</head>
<body>
<?php include('navfixed.php');?>
<div class="container">
<i class="icon-bar-chart"></i> profit and loss

<a  href="statementslist.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<form action="profit&loss.php" method="get">
<center><strong>From : <input type="text"  name="d1" class="tcal" autocomplete="off" /> To: <input type="text"  name="d2" class="tcal"autocomplete="off" />
<button class="btn btn-success" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> submit</button>
</strong></center>
</form><div class="container" id="content">

<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
	<p>trading, profit and loss account</p>
	<p>for the period</p> 
	<p><?php echo date('d-m-Y',strtotime($_GET['d1'])); ?>&nbsp;to&nbsp;<?php echo date('d-m-Y',strtotime($_GET['d2'])); ?></p>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
<thead>
<tr>
<th width="13%"> &nbsp;</th>
<th width="13%"> &nbsp; </th>			

<th width="16%"> &nbsp; </th>
<th width="18%"> total sales </th>
<th width="13%"> gross Profit </th>
</tr>

<tr>
<th colspan="3" style="border-top:1px solid #999999"> Total: </th>
<th colspan="1" style="border-top:1px solid #999999"> 
<?php
$results = $db->prepare("SELECT sum(amount) AS amount, sum(profit) AS profit FROM sales WHERE date >= :a AND date<=:b ");
$results->bindParam(':a', $d1);
$results->bindParam(':b', $d2);
$results->execute();
for($i=0; $row = $results->fetch(); $i++){
$amount=$row['amount'];
$profit=$row['profit'];
echo formatMoney($amount, true);
?>
</th>
<th colspan="1" style="border-top:1px solid #999999">
<?php
echo formatMoney($profit, true);
}
?>

</th>
</tr>
</thead>
</table>
</div><h4>expenses</h4>
<div><table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
<thead>
<tr>
<th width="13%"> Transaction Date </th>
<th width="13%"> expense </th>
<th width="16%"> entered by </th>
<th width="18%"> Amount </th>
</tr>
</thead>
<tbody>
<?php
$date1=date('d/m/Y',strtotime($d1));
$date2=date('d/m/Y',strtotime($d2));
$result = $db->prepare("SELECT name,recorded,amount,date,sum(amount) AS total_exp FROM expenses WHERE date >= :a AND date<=:b ORDER by id DESC ");
$result->bindParam(':a', $date1);
$result->bindParam(':b', $date2);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
	$amount=$row['amount'];
	$total_exp=$row['total_exp'];
?>
<tr class="record">
<td><?php 
$date = $row['date'];
echo date('d/m/Y',strtotime($date));
 ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['recorded']; ?></td>
<td><?php
echo formatMoney($amount, true);
?></td>

</tr>


</tbody>
<thead>
<tr>
<th colspan="3" style="border-top:1px solid #999999"> Total expenses: </th>
<th colspan="1" style="border-top:1px solid #999999"> 
<?php

echo formatMoney($total_exp, true);

?>
<?php
}
?>
</th>

</tr>
</thead>
</table></div><h4>salaries</h4><div><table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
<thead>
<tr>
<th width="13%"> Transaction Date </th>
<th width="13%"> employee </th>		
<th width="18%"> Amount </th>
<th width="16%"> remarks </th>			
</tr>
</thead>
<tbody>

<?php


$result = $db->prepare("SELECT sum(amount) AS total_sal,amount,date,employee,amount,rmks FROM salaries WHERE date >= :a AND date<=:b ORDER by id DESC ");
$result->bindParam(':a', $date1);
$result->bindParam(':b', $date2);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
	$salary=$row['amount'];
	$total_salary=$row['total_sal'];
?>
<tr class="record">
<td><?php echo date('d/m/Y',strtotime($row['date']));
?></td>
<td><?php echo $row['employee']; ?></td>
<td><?php

echo formatMoney($salary, true);
?></td>
<td><?php echo $row['rmks']; ?></td>

</tr>


</tbody>
<thead>
<tr>
<th colspan="3" style="border-top:1px solid #999999"> Total salaries paid: </th>
<th colspan="1" style="border-top:1px solid #999999"> 

<?php

echo formatMoney($total_salary, true);

?>
<?php
}
?><?php $texp=$total_salary+$total_exp; 
$netprofit=$profit-$texp;  ?>
</th>

</tr>
</thead>
<thead>
<tr>
<th colspan="3" style="border-top:1px solid #999999"> net profit </th>
 

<?php

if ($netprofit < 1) {
    $color = "red";
} else {
    $color = "green"; 
}
?>
<th colspan="1" style="border-top:1px solid #999999;color: <?php echo $color; ?>">
<?php
echo formatMoney($netprofit, true);

?>
</th>

</tr>
</thead>
</table></div></div></div>

<div class="container"><button  style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</button></a></div>

</body>
<script src="js/jquery.js"></script>

<?php include('footer.php');?>
</html>