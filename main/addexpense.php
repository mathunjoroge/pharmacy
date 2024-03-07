<?php
ini_set("display_errors", "On");
	require_once('auth.php');
	include('../connect.php');

?>
<form action="saveexpense.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> record expense</h4></center>
<hr>
		
<div >
<span> </span><input type="hidden" style="width:265px; height:30px;" name="dt" value="<?php echo date('d/m/Y'); ?>" Required/><br>


<select  style="width:265px; height:30px;"  name="exp">
			<?php

	$result = $db->prepare("SELECT * FROM expenselist");
		
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?><option></option>
		<option value="<?php echo $row['name'];?>"><?php echo $row['name']; ?>  </option>
	<?php
				}
			?><br>

<span>amount </span><input type="number" style="width:265px; height:30px;" name="amt" placeholder="amount"/><br>
<div style="float:left;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>