<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='select supplier';
include('../main/navfixed.php');

?>
<div class="container">
      <div class="container">
			

	<div class="container">
		<p>&nbsp;</p>

<h4>suppplier Ledger</h4>
<hr><a  href="admin.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i><b> Back</b></button></a>
<p>&nbsp;</p>


<hr>
<form  action="suplier_ledger.php?" method="get">select supplier:<span>
			<select name="cname" required>
				<option></option>
			<?php	
	$result = $db->prepare("SELECT * FROM supliers");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['suplier_name'];?>"><?php echo $row['suplier_name']; ?>  </option>
	<?php
				}
			?>
</select>&nbsp;<button class="btn btn-success"> Submit</button></span><br>
     
      

</div>
</form>
</body>
</html>