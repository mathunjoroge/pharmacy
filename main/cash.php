<?php
require_once('auth.php');
include '../connect.php';
$date1=date('Y-m-d',strtotime($_GET['d1']));
$date2=date('Y-m-d',strtotime($_GET['d2']));
$d1=date('Y-m-d',strtotime($_GET['d1']));
$d2=date('Y-m-d',strtotime($_GET['d2']));

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
Sales Report
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
      disp_setting+="scrollbars=yes,width=700, height=400, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><h4 align="center">Winsor Pharmacy</h4><body align="center" onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='INV-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
<div class="container">
      
	
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Sales Report
			</div>
			<ul class="breadcrumb">
			<li><p>&nbsp;</p></li> 
			<li class="active">&nbsp;</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-home icon-large"></i> Back</button></a>
</div>

<form action="cash.php" method="get">
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
$results = $db->prepare("SELECT sum(amount) AS amount, sum(profit) AS profit FROM sales WHERE date >= :a AND date<=:b");
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
// First prepared statement
$stmt_expenses = $db->prepare("SELECT name, recorded, amount, date
                               FROM expenses
                               WHERE date >= :a AND date <= :b
                               ORDER BY id DESC");
$stmt_expenses->bindParam(':a', $date1);
$stmt_expenses->bindParam(':b', $date2);
$stmt_expenses->execute();

// Second prepared statement
$stmt_total_exp = $db->prepare("SELECT COALESCE(SUM(amount), 0) AS total_exp
                                FROM expenses
                                WHERE date >= :a AND date <= :b");
$stmt_total_exp->bindParam(':a', $date1);
$stmt_total_exp->bindParam(':b', $date2);
$stmt_total_exp->execute();

// Fetch the total expense
$row_total_exp = $stmt_total_exp->fetch();
$total_exp = $row_total_exp['total_exp'];

// Fetch and process each expense
while ($row = $stmt_expenses->fetch()) {
    $amount = $row['amount'];
    $date = $row['date'];
    // Process the fetched data here
    // ...


?>
<tr class="record">
<td><?php 

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
// First prepared statement
$stmt_salaries = $db->prepare("SELECT SUM(amount) AS total_sal, amount, date, employee, rmks
                               FROM salaries
                               WHERE date >= :a AND date <= :b
                               ORDER BY id DESC");
$stmt_salaries->bindParam(':a', $date1);
$stmt_salaries->bindParam(':b', $date2);
$stmt_salaries->execute();

// Fetch the total salary
$row_total_sal = $stmt_salaries->fetch();
$total_salary = $row_total_sal['total_sal'];

// Fetch and process each salary
while ($row = $stmt_salaries->fetch()) {
    $salary = $row['amount'];
    $date = $row['date'];
    // Process the fetched data here
    // ...


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
<th colspan="3" style="border-top:1px solid #999999">cash available</th>

<?php
$cash_available=($amount-$texp);
if ($netprofit < 1) {
    $color = "red";
} else {
    $color = "green"; 
}
?>
<th colspan="1" style="border-top:1px solid #999999;color: <?php echo $color; ?>">
<?php
echo formatMoney($cash_available, true);

?>
</th>
</tr>
</thead>
</table></div></div></div>

<button  style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</button></a>
<div class="clearfix"></div>
</div>
</div>
</div>

</body>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<?php include('footer.php');?>
</html>