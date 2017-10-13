<?php
	require_once('auth.php');
?>
<html>
<head>
<title>
POS
</title>
<?php
	require_once('auth.php');
?>
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
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
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
<?php include('navfixed.php');?>
	
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="active"><a href="#"><i class="icon-dashboard icon-large"></i> Dashboard <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li> 
              <li><a href="customer.php"><i class="icon-group icon-large"></i> Customers <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
              <li><a href="products.php"><i class="icon-table icon-large"></i> Products <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
              <li><a href="supplier.php"><i class="icon-group icon-large"></i> Suppliers <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
              <li><a href="sales.php"><i class="icon-bar-chart icon-large"></i> Sales Report <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
              <li><a href="#"><i class="icon-inbox icon-large"></i> Cash <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
			   <li><a href="user.php"><i class="icon-user icon-large"></i> Users <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<a href="dashboard.php"><li>Dashboard</li></a> /
			<li class="active">Purchase Lists</li>
			</ul>
<div id="maintable">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a><br><br>
<?php
$id=$_GET['iv'];
include('../connect.php');
$resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
$resultaz->bindParam(':xzxz', $id);
$resultaz->execute();
for($i=0; $rowaz = $resultaz->fetch(); $i++){
}
?><?php $supp=$_GET['supplier']=$rowaz['supplier']; 
$re=$_GET['remarks']=$rowaz['remarks'];
?>
<?php $id=$_GET['iv'];


include('../connect.php');
$resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
$resultaz->bindParam(':xzxz', $id);
$resultaz->execute();
for($i=0; $rowaz = $resultaz->fetch(); $i++){

}

?>
<?php $supp=$_GET['supplier'];
include('../connect.php');
$resultaz = $db->prepare("SELECT * FROM purchases WHERE supplier= :supp");
$resultaz->bindParam(':supp', $supp);
$resultaz->execute();
for($i=0; $rowaz = $resultaz->fetch(); $i++){

}

?>
<?php $re=$_GET['remarks'];
include('../connect.php');
$resultaz = $db->prepare("SELECT * FROM purchases WHERE remarks= :re");
$resultaz->bindParam(':re', $re);
$resultaz->execute();
for($i=0; $rowaz = $resultaz->fetch(); $i++){

}

?>
<div class="content" id="content">
<div>
<?php
$id=$_GET['iv']; 
$supp=$_GET['supplier'];
$re=$_GET['remarks'];
include('../connect.php');
$resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
$resultaz->bindParam(':xzxz', $id);
$resultaz->execute();
for($i=0; $rowaz = $resultaz->fetch(); $i++){
echo 'Invoice Number : '.$rowaz['invoice_number'].'<br>';
echo 'Date : '.$rowaz['date'].'<br>';
echo 'Supplier : '.$rowaz['supplier'].'<br>';
echo 'purchase type: '.$rowaz['remarks'].'<br>';
echo 'Remarks : '.$rowaz['ptype'].'<br>';
$_SESSION['supplier']=$rowaz['supplier'];
$_SESSION['remarks']=$rowaz['remarks'];
$_SESSION['date']=$rowaz['date']; 
$_SESSION['iv']=$rowaz['invoice_number'];
}
?>
</div>
<form action="savepurchasesitem.php" method="post" >
<input type="hidden"  name="invoice" value="<?php echo $_GET['iv']; ?>" />
<select name="product" style="width: 600px;">
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM products");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['product_code']; ?>"><?php echo $row['product_code']; ?> - <?php echo $row['gen_name']; ?></option>
	<?php
	}
	?>
</select>
<input type="text" name="qty" value="" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
<input type="text" name="cost" value="" placeholder="cost" autocomplete="off" style="width: 68px; height:30px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus icon-large"></i> Add</button>

</form>


<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="35%"> Brand Name </th>
			<th width="35%"> Generic Name </th>
			<th width="10%"> Qty </th>
			<th width="15%"> Cost </th>
			<th width="12%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$id=$_GET['iv'];
				$result = $db->prepare("SELECT * FROM purchases_item WHERE invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php
			$rrrrrrr=$row['name'];
			$resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
			$resultss->bindParam(':asas', $rrrrrrr);
			$resultss->execute();
			for($i=0; $rowss = $resultss->fetch(); $i++){
			echo $rowss['product_code'];
			
			}
			?></td>
			<td><?php
			$rrrrrrr=$row['name'];
			$resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
			$resultss->bindParam(':asas', $rrrrrrr);
			$resultss->execute();
			for($i=0; $rowss = $resultss->fetch(); $i++){
			echo $rowss['gen_name'];
			
			}
			?></td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
			$dfdf=$row['cost'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			<td><center><a href="deletep.php?id=<?php echo $row['id']; ?>&invoice=<?php echo $_GET['iv']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['name'];?>"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete </button></a></td>
			</center>
			</tr>
			<?php
				}
			?>
			<tr>
				<td colspan="2"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
				<td colspan="2"><strong style="font-size: 12px; color: #222222;">
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
				$sdsd=$_GET['iv'];
				$resultas = $db->prepare("SELECT sum(cost) FROM purchases_item WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(cost)'];
				echo formatMoney($fgfg, true);
				}
				$_SESSION['cost']=$fgfg;
				$_SESSION['iv']=$sdsd;
				
				?>
				</strong></td>
			</tr>
		
	</tbody>
</table></div><br>
<form action="checkout2.php" method="post" >
<input type="hidden"  name="invoice" value="<?php echo $_GET['iv']; ?>" />
<input type="hidden"  name="date" value="<?php echo $_SESSION['date']; ?>" />
<input type="hidden"  name="supplier" value="<?php echo $_SESSION['supplier']; ?>" />
<input type="hidden"  name="ptype" value="<?php echo $_SESSION['remarks']; ?>" />
<input type="hidden"  name="cost" value="<?php echo $fgfg; ?>" /><Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-save icon-large"></i> Save</button>
</form>
<button  style="width: 123px; height:35px; float:right;" class="btn btn-success btn-large">
<a href="javascript:Clickheretoprint()"><i class="icon icon-print icon-large"></i> Print</a></button>
<div class="clearfix">
  </div>
</div>

</body>
</html>