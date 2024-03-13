<html>
<?php
	$Today = date('m/d/Y',time());
	$new = date('m/d/Y', strtotime($Today));
	echo $new;
	?>
<head>
<title>Checkout</title>

</head>
<body onLoad="document.getElementById('country').focus();">
<form action="savesales.php" method="post">
<div id="ac">
<center><h4><i class="icon icon-money icon-large"></i> Cash</h4></center><hr>
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="amount" value="<?php echo $_GET['total']; ?>" />
<input type="hidden" name="ptype" value="<?php echo $_GET['pt']; ?>" />
<input type="hidden" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
<input type="hidden" name="profit" value="<?php echo $_GET['totalprof']; ?>" />
<input type="hidden" name="age" value="<?php echo $_GET['age']; ?>" />
<input type="hidden" name="sex" value="<?php echo $_GET['sex']; ?>" />
<center>
    
      <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
<?php
$asas=$_GET['pt'];
if($asas=='credit') {
?>Due Date: <input type="date" name="due" placeholder="Due Date" style="width: 268px; height:30px; margin-bottom: 15px;" /><br>
<?php
}
if($asas=='cash') {
?>

<input type="hidden" name="cash" placeholder="Cash" value="0" style="width: 268px; height:30px;  margin-bottom: 15px;"><br>
<input type="hidden" name="reset" placeholder="Cash" value="0" style="width: 268px; height:30px;  margin-bottom: 15px;"><br>
<?php
}
?><button class="btn btn-success btn-block btn-large" id="save" style="width:267px;"><i class="icon icon-save icon-large" ></i> Save</button>
<script type="text/javascript"> document.getElementById('save').click(); </script>
</center>
</div>
</form>
</body>
</html>