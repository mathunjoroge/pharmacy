<?php
require_once('auth.php');
include('../connect.php');
	$d1=$_GET['d1'];
	$d2=$_GET['d2'];	
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
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
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
<div class="container-fluid">
     
	<div class="container">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> profit and loss
			</div>
			<ul class="breadcrumb">
			
			<li class=""></li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="statementslist.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>


</div>
<form action="profit&loss.php" method="get">
<center><strong>From : <input type="text"  name="d1" class="tcal" value="" /> To: <input type="text"  name="d2" class="tcal" value="" />
 <button class="btn btn-success" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> submit</button>
</strong></center>
</form><div id="content">

<div class="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
profit and loss from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
		<th width="13%"> &nbsp;</th>
			<th width="13%"> &nbsp; </th>			
			
			<th width="16%"> &nbsp; </th>
			<th width="18%"> total sales </th>
			<th width="13%"> gross Profit </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			
				$d1a=$_GET['d1'];
				$d2=$_GET['d2'];
				$date = $d1a;
                $d1 = strtotime ( '-1 day' , strtotime ( $date ) ) ;
                $d1 = date ( 'm/j/Y' , $d1 );
               
				$result = $db->prepare("SELECT * FROM sales WHERE date >= :a AND date<=:b ORDER by transaction_id DESC ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
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
			
				$results = $db->prepare("SELECT sum(amount) FROM sales WHERE date >= :a AND date<=:b ");
				$results->bindParam(':a', $d1);
				$results->bindParam(':b', $d2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amount)'];
				echo formatMoney($dsdsd, true);
				}
				?>
			</th>
				<th colspan="1" style="border-top:1px solid #999999">
			<?php 
				$resultia = $db->prepare("SELECT sum(profit) FROM sales WHERE date >= :c AND date<=:d");
				$resultia->bindParam(':c', $d1);
				$resultia->bindParam(':d', $d2);
				$resultia->execute();
				for($i=0; $ab = $resultia->fetch(); $i++){
				$cd=$ab['sum(profit)'];
				echo formatMoney($cd, true);
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
				
			
				$result = $db->prepare("SELECT * FROM expenses WHERE date >= :a AND date<=:b ORDER by id DESC ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php 
			$date = $row['date'];
                $d11 = strtotime ( $date ) ;
                $d11 = date ( 'j/m/Y' , $d11 );
                echo $d11;
                 ?></td>
			<td><?php echo $row['name']; ?></td>
			
			
			<td><?php echo $row['recorded']; ?></td>
			<td><?php
			$dsdsd=$row['amount'];
			echo formatMoney($dsdsd, true);
			?></td>
			
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total expenses: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
				
			
				$results = $db->prepare("SELECT sum(amount) FROM expenses WHERE date >= :a AND date<=:b");
				$results->bindParam(':a', $d1);
				$results->bindParam(':b', $d2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$ef=$rows['sum(amount)'];
				echo formatMoney($ef, true);
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
				
			
				$result = $db->prepare("SELECT * FROM salaries WHERE date >= :a AND date<=:b ORDER by id DESC ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php $date = $row['date'];
                $d11 = strtotime ( $date ) ;
                $d11 = date ( 'j/m/Y' , $d11 );
                echo $d11; ?></td>
			<td><?php echo $row['employee']; ?></td>
			<td><?php
			$dsdsd=$row['amount'];
			echo formatMoney($dsdsd, true);
			?></td>
			<td><?php echo $row['rmks']; ?></td>
			
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total salaries paid: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 

			<?php
				
			
				$results = $db->prepare("SELECT sum(amount) FROM salaries WHERE date >= :a AND date<=:b");
				$results->bindParam(':a', $d1);
				$results->bindParam(':b', $d2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$gh=$rows['sum(amount)'];
				echo formatMoney($gh, true);
				}
				?><?php $texp=$gh+$ef; $netprofit=$cd-$texp;  ?>
			</th>
				
		</tr>
	</thead>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> net profit </th>
			<th colspan="1" style="border-top:1px solid #999999"> 

			<?php
				
				
				echo formatMoney($netprofit, true);
				
				?>
			</th>
				
		</tr>
	</thead>
</table></div></div></div>

<div class="clearfix"><button  style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</button></a></div>
</div>
</div>
</div></div>

</body>
<script src="js/jquery.js"></script>
 
<?php include('footer.php');?>
</html>