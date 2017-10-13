<html>
<head>
<?php
	require_once('auth.php');
?>
<title>
Customer Purchases And Payments
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
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</head>
<body style="text-transform:capitalize;">
<?php
	include('navfixed.php');
?>
	
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
                   <ul class="nav nav-list">
              <li><a href="#"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
				<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>							</li>
				<li class="active"><a href="collection.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Collection Report</a>                     </li>
				<li><a href="accountreceivables.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Accounts Receivable Report</a>    </li>
				<li><a rel="facebox" href="select_customer.php"><i class="icon-user icon-2x"></i> Customer Ledger</a>                   </li>
				<li><a href="products.php"><i class="icon-table icon-2x"></i> Products</a>                                              </li>
				<li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                             </li>
				<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                             </li>
				<li><a href="purchaseslist.php"><i class="icon-inbox icon-2x"></i> Purchases</a></li>
				</ul>           
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Supplier statement
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Supplier statement</li>
			</ul>
		<form class="ui-widget" action="pur.php" method="get">select supplier:
			<select name="term" ><option></option>
			<?php
	include('../connect.php');
	$term=$_GET['term'];
	$term=$row['suplier_name'];
	$result = $db->prepare("SELECT * FROM supliers");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['suplier_name'];?>"><?php echo $row['suplier_name']; ?>  </option>
	<?php
				}
			?>
</select>
			
			
	
	<button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;" type="submit"><i class="icon icon-search icon-large"></i> Submit</button>


</form>
Total purchases made from <?php echo $_GET['term'] ?>
<div class="content" id="content">
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			
			<th width="33%"> Date </th>
			
			<th width="33%"> Invoice Number </th>
						
			<th width="33%"> Amount </th>
			
			
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				
				$c='credit';
				$d='paid';
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);}
				$result = $db->prepare("SELECT * FROM purchases WHERE remarks=:c AND cost>0 AND supplier LIKE '%".$term."%'  ORDER BY `date` ASC");
				$d='paid';
				$result->bindParam(':c', $c);
				
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
				<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['invoice_number']; ?></td>		
			<td><?php echo $row['cost']; ?></td>

			
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="2" style="border-top:1px solid #999999"> Total : </th><th colspan="1" style="border-top:1px solid #999999"> 
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
				
				$c='credit';
				$results = $db->prepare("SELECT sum(cost) FROM purchases WHERE remarks=:c  AND supplier LIKE '%".$term."%' ORDER BY `date` ASC");
				
				$results->bindParam(':c', $c);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(cost)'];
				echo formatMoney($dsdsd, true);
				}
				?>
			</th>
		</tr>
	</thead>
</table>

</div>

<div class="content" id="content">
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	
<hr>
</div><p>Payments: </p>

<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
	<?php
				include('../connect.php');?>
				
				<?php if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);}?>

				<?php $result = $db->prepare("SELECT * FROM payments WHERE name LIKE '%".$term."%'  ORDER BY `date2` ASC");			
$date1 = $row['date2'];
$inv = $row['invoice_number'];
$dsdsdd = $row['amount2'];
				?>

</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr><th width="50%"> Date </th>			
			
			
			<th width="50%"> Amount </th>
		

			
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');?>
				<?php $c='credit';
				$d='paid';
				$c='credit';
				$date1 = 'date2';
                   $inv = 'invoice_number2';
                  $dsdsdd = 'amount2';
                  ?>
				
				<?php if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);}

				$result = $db->prepare("SELECT * FROM payments WHERE  name LIKE '%".$term."%'  ORDER BY `date2` ASC");
				
				$result->execute();
				$date1 = $row['date2'];
                   
                  $dsdsdd = $row['amount2'];
				
				for($i=0; $row = $result->fetch(); $i++){
					$date1 = $row['date2'];
                   
					
			?>
			<tr class="record">
			<td><?php echo $row['date2']; ?></td>
			
			
		
			<td><?php
			$dsdsdd=$row['amount2'];
			echo formatMoney($dsdsdd, true);
			?></td>

			
			</tr>
				
		
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="1" style="border-top:1px solid #999999"> Total payments: </th>
			<th colspan="1" style="border-top:1px solid #999999">  
				 
			<?php
				
				
				$results = $db->prepare("SELECT sum(amount2) FROM payments WHERE name LIKE '%".$term."%' ORDER BY `date2`");
				
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsdd=$rows['sum(amount2)'];
				echo formatMoney($dsdsdd, true);
				}
				?>
			</th>
		</tr>
	</thead>
	<th colspan="1" style="border-top:1px solid #999999"> Total Balance: </th>
			<th colspan="1" style="border-top:1px solid #999999"><?php $dsdsd-$dsdsdd; echo  formatMoney($dsdsd-$dsdsdd, true);?>
</table>
</div>
<button  style="width: 123px; height:35px; margin-top:-2px; float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"><i class="icon icon-print icon-large"></i> Print</a></button>
<div class="clearfix"></div>
</div>
</body>
<?php include('footer.php');?>

</html>