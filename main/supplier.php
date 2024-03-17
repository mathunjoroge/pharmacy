<?php
ini_set("display_errors", "On");
require_once('auth.php');
include('../connect.php');
$title='suppliers';
include('../main/navfixed.php');

?>

<div class="container-fluid">
      

			<i class="icon-group"></i> Suppliers
	
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Suppliers</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
			<div style="text-align:center;">
			<?php
include('../connect.php');

// Query to count total suppliers
$result = $db->query("SELECT COUNT(*) AS total_suppliers FROM supliers");
$row = $result->fetch(PDO::FETCH_ASSOC);

// Check if there's a result
if ($row) {
    $totalSuppliers = $row['total_suppliers'];
    echo "Total Number of Suppliers: <font color='green' style='font:bold 22px;'>$totalSuppliers</font>";
} else {
    echo "Error fetching total number of suppliers.";
}
?></div>
</div>
<input type="text" name="filter" style="height:35px; margin-top: -1px;" value="" id="filter" placeholder="Search Supplier..." autocomplete="off" />
<a rel="facebox" href="addsupplier.php"><button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" ><i class="icon-plus-sign icon-large"></i> Add Supplier</button></a>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th> Supplier </th>			
			<th> Address </th>
			<th> Contact Person </th>
			<th> Contact No.</th>			
			<th width="120"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['suplier_name']; ?></td>			
			<td><?php echo $row['suplier_address']; ?></td>
			<td><?php echo $row['suplier_contact']; ?></td>			
			<td><?php echo $row['contact_person']; ?></td>
			
			<td><a rel="facebox" href="editsupplier.php?id=<?php echo $row['suplier_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a>
			<a href="#" id="<?php echo $row['suplier_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  
</body>
<?php include('footer.php');?>

</html>