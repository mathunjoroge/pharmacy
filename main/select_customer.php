<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='list of expenses';
include('../main/navfixed.php');

?>
<div class="container">
      <div class="container">
			

	<div class="container">
		<p>&nbsp;</p>

<h4>Customer Ledger</h4>
<hr><a  href="admin.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i><b> Back</b></button></a>
<p>&nbsp;</p><form action="customer_ledger.php?" method="get">
<span>
<form  action="customer_ledger.php?" method="get">select customer:
<select name="cname" placeholder="select customer" required><option></option>
			<?php
	$result = $db->prepare("SELECT * FROM customer");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['customer_name'];?>"><?php echo $row['customer_name']; ?>  </option>
	<?php
				}
			?>
</select>&nbsp;<button class="btn btn-success" ><i class="icon icon-save icon-large"></i> Submit</button></span><br>
     
      

</form></div>
</body>
</html>