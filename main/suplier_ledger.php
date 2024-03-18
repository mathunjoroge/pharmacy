<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='list supplier ledger';
include('../main/navfixed.php');

?>
<div class="container">
      <div class="container">
			

	<div class="container">
		<p>&nbsp;</p>

			<i class="icon-list"></i> Supplier Legder
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Supplier Legder</li>
			</ul>

<div id="maintable">
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="statementslist.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<?php
include('../connect.php');
$supplier=$_GET['cname'];

$resultas = $db->prepare("SELECT * FROM supliers WHERE suplier_id= :b");
$resultas->bindParam(':b', $supplier);
$resultas->execute();
for($i=0; $rowas = $resultas->fetch(); $i++){
echo 'Name : '.$rowas['suplier_name'].'<br>';
echo 'Address : '.$rowas['suplier_address'].'<br>';
echo 'Contact person: '.$rowas['suplier_contact'].'<br>';
echo 'Contact  '.$rowas['contact_person'].'<br>';
}
?>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			
			<th> Date </th>
			<th> type </th>			
			<th> confirm/check No</th>			
			<th> Payment amount </th>
			
		</tr>
	</thead>
	<tbody>
		
			
			<?php
				$supplier=$_GET['cname'];
				$result = $db->prepare("SELECT * FROM payments WHERE name= :userid ORDER BY paymentid DESC Limit 10");
				$result->bindParam(':userid', $supplier);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['date2']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['confirm']; ?></td>
			<td><?php echo $row['amount2']; ?></td>
			
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<a rel="facebox" href="addsledger.php?invoice=<?php echo $_GET['cname']; ?>&amount=<?php echo $rowa['amount2']; ?>" style="margin-top: 10px;"><button class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add cash Payment</button></a><a rel="facebox" href="mpesa.php?invoice=<?php echo $_GET['cname']; ?>&amount=<?php echo $rowa['amount2']; ?>" style="margin-top: 10px;"><button class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add Mpesa Payment</button></a><a rel="facebox" href="bank.php?invoice=<?php echo $_GET['cname']; ?>&amount=<?php echo $rowa['amount2']; ?>" style="margin-top: 10px;"><button class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add  bank Payment</button></a><br><br>
<div class="clearfix"></div>
</div>
</body>
<?php include('footer.php');?>


</html>