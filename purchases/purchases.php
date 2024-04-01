<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='record purchase';
include('../main/navfixed.php');
?>
<div class="container" >
<i class="icon-money"></i> purchases

<ul class="breadcrumb">
<a href="../main/index.php"><li>Dashboard</li></a> /
<li class="active">purchases</li>
</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="../main/index.php"><button class="btn btn-success btn-large" style="float: none;" ><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<?php 
$result = $db->prepare("SELECT * FROM products where qty < level ORDER BY product_id DESC");
$result->execute();
$rowcount123 = $result->rowcount();

?><div style="text-align:center;"><font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';"><?php echo $rowcount123; ?></font><a rel="facebox" href="../main/level.php">  <button class="btn btn-primary">Low running products</button></a>
</div></div>
<div class="container">
<form action="incoming.php" method="post" >
<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<select autofocus name="product" style="width:500px; "class="chzn-select" required >
<option></option>
<?php

$result = $db->prepare("SELECT * FROM products");
$result->execute();
for($i=0; $row = $result->fetch();
$i++){
?>
<option value="<?php echo $row['product_id'];?>"><?php echo $row['product_code']; ?> - <?php echo $row['gen_name']; ?>  </option>
<?php
}

?>
</select>
<input type="number" name="qty"  min="1" placeholder="Qty" autocomplete="off" style="width: 65px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="number" name="cost" placeholder="cost" autocomplete="off" style="width: 72px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="text" name="bno"   placeholder="batch No" autocomplete="off" style="width: 65px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="text" name="edate" class="tcal" placeholder="exp date" autocomplete="off" style="width: 72px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date("d/m/20y"); ?>" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large" ></i> Add</button>
</form>
<div id="printableArea">
<table class="table table-bordered" id="resultTable" data-responsive="table">
<thead>
<tr>
<th> Product Name </th>
<th> Generic Name </th>
<th> Price </th>
<th> Qty </th>
<th> cost </th>
<th> Action </th>
</tr>
</thead>
<tbody>

<?php
$id=$_GET['invoice'];

$result = $db->prepare("SELECT transaction_id,gen_name,product_code,pending.price AS price,discount,amount,pending.qty AS qty FROM pending JOIN products ON products.product_id=pending.product  WHERE invoice= :invoice");
$result->bindParam(':invoice', $id);
$result->execute();
for($i=1; $row = $result->fetch(); $i++){
?>
<tr class="record">
<td hidden><?php echo $row['product']; ?></td>
<td><?php echo $row['product_code']; ?></td>
<td><?php echo $row['gen_name']; ?></td>

<td>
<?php
$ppp=$row['price'];
echo formatMoney($ppp, true);
?>
</td>
<td><?php echo $row['qty']; ?></td>
<td>
<?php
$dfdf=$row['amount'];
echo formatMoney($dfdf, true);
?>
</td>

</td>
<td width="90"><a rel="facebox" href="editspurchase.php?id=<?php echo $row['transaction_id']; ?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> edit </button></a>

<a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a>
</tr>
<?php
}
?>
<tr>
<th> </th>
<th>  </th>
<th>  </th>
<th>  </th>
<th>  </th>
<td> Total Amount: </td>

<th>  </th>
</tr>
<tr>
<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
<td colspan="1"><strong style="font-size: 12px; color: #222222;">
<?php
function formatMoney($number, $fractional=false) {
if ($fractional) {
$number = sprintf('%.2f', $number);
}
while (true) {
$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
if ($replaced != $number) {
	$number = $replaced;
} else {
	break;
}
}
return $number;
}
$sdsd=$_GET['invoice'];
$resultas = $db->prepare("SELECT sum(amount) FROM pending WHERE invoice= :a");
$resultas->bindParam(':a', $sdsd);
$resultas->execute();
for($i=0; $rowas = $resultas->fetch(); $i++){
$fgfg=$rowas['sum(amount)'];
echo formatMoney($fgfg, true);
}
?>

<th></th>
</tr>

</tbody>
</table><br>
<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo '' ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>"><button class="btn btn-success btn-large btn-block" ><i class="icon icon-save icon-large" accesskey="s"></i> SAVE</button></a>
<div class="clearfix"></div>
</div>
</div>
</div></div>
</body>
<?php include('../main/footer.php');?>
</html>