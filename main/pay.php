<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savepay.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> pay employee</h4></center>
<hr>
<?php
			$leo = date('m/d/20y',mktime());
			$new = date('l, F d, Y', strtotime($leo));
			  


?>
		
<div id="ac">
<span> </span><input type="hidden" style="width:265px; height:30px;" name="dt" value="<?php echo $leo ; ?>" Required/><br>


<select  style="width:265px; height:30px;"  name="exp"><option></option>
			<?php
	include('../connect.php');
	
	$result = $db->prepare("SELECT * FROM employees");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['name'];?>"><?php echo $row['name']; ?>  </option>
	<?php
				}
			?><br>

<span>amount </span><input type="number" style="width:265px; height:30px;" name="amt" placeholder="amount"/><br>
<input type="text" style="width:265px; height:30px;" name="rmk" placeholder="remarks"/><br>
<div style="float:left; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:250px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>