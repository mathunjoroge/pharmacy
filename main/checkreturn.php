<html>
<?php
// Enable error display
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	
	?>


<form action="savereturns.php" method="post">
<div id="ac">
<center>save returns</center><hr>
<input type="" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="" name="amount" value="<?php echo $_GET['total']; ?>" />
<input type="" name="ptype" value="cash">
<select name="cname" placeholder="select customer"><option></option><?php
	include('../connect.php');	
	$result = $db->prepare("SELECT * FROM customer");

		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['customer_name'];?>"><?php echo $row['customer_name']; ?>  </option>
	<?php
				}
			?>

<input type="" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
<input type="" name="profit" value="<?php echo $_GET['totalprof']; ?>" />
<input type="" name="cash" placeholder="Cash" value="0" style="width: 268px; height:30px;  margin-bottom: 15px;"><br>
<input type="" name="reset" placeholder="Cash" value="0" style="width: 268px; height:30px;  margin-bottom: 15px;"><br>


<center>
    
      <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
<button class="btn btn-success btn-block btn-large" style="width:267px;float: left;" ><i class="icon icon-save icon-large" ></i> save</button>
</center>
</div>
</form>
</body>
</html>