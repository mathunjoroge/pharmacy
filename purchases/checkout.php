<?php
ini_set("display_errors", "On");
?><html>
<head>
<title>Checkout</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
	
</head>
<body onLoad="document.getElementById('country').focus();">
<form action="savesales.php" method="post">
<div id="ac">
<center><h4><i class="icon icon-money icon-large"></i> purchase details</h4></center><hr>
<input type="hidden" name="date" value="<?php echo date("d/m/20y"); ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="amount" value="<?php echo $_GET['total']; ?>" />

<input type="hidden" name="cashier" value="<?php echo $_GET['cashier']; ?>" />
<input type="hidden" name="profit" value="<?php echo $_GET['totalprof']; ?>" />

<center>
	<label>select supplier</label>
<select name="supp"  class="selectpicker" style="width:265px; height:30px;">
 
    <?php
  include('../connect.php');
  
  $result = $db->prepare("SELECT * FROM supliers");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
  ?>
    <option></option><option value="<?php echo $row['suplier_id'];?>"><?php echo $row['suplier_name']; ?>  </option>
  <?php
        }
      ?>
      <br>
      <label>enter invoice number</label>
<input  value="" name="invoicesup" type="text" size="25" class="" autocomplete="off" placeholder="Enter Invoice No" style="width: 268px; height:30px;" required/>
<label>enter type of purchase</label>
<select  name="ptype" id="country"><option></option><option>Cash</option><option>Credit</option></select>
         
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large" accesskey="s"></i> Save</button>
</center>
</div>
</form>
</body>
</html>