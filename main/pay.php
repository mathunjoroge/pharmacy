<?php 
ini_set("display_errors", "On");
include('../connect.php');
?>
<form action="savepay.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> pay employee</h4></center>
<hr>
	
<div id="ac">
<span> </span><input type="hidden" style="width:265px; height:30px;" name="dt" value="<?php echo date('d/m/Y'); ?>" Required/><br>


<select  style="width:265px; height:30px;"  name="exp"><option></option>
			<?php
	
	
	$result = $db->prepare("SELECT * FROM employees");
	
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['name'];?>"><?php echo $row['name']; ?>  </option>
	<?php
				}
			?><br>

<span>amount </span><input type="number" style="width:265px; height:30px;" name="amt" placeholder="amount"/><br>
<input type="text" style="width:265px; height:30px;" name="rmk" placeholder="remarks"/><br>
<div style="float:left;">
<button class="btn btn-success btn-block btn-large" style="width:250px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>