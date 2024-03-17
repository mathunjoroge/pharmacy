<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='see product movement';
include('../main/navfixed.php');

?>


<div class="container">
<i class="icon-money"></i> product report

<ul class="breadcrumb">
<a href="../main/index.php"><li>Dashboard</li></a> /
<li class="active">product report</li>
</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="../main/index.php"><button class="btn btn-success btn-large" style="float: none;" ><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a><?php 

$result = $db->prepare("SELECT * FROM products where qty < level ORDER BY product_id DESC");
$result->execute();
$rowcount123 = $result->rowcount();

?><div style="text-align:center;"><font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';"><?php echo $rowcount123; ?></font><a rel="facebox" href="../main/level.php">  <button class="btn btn-primary">Low running products</button></a>
</div></div>
<div class="container">
<form action="bincard.php" method="GET" >
<select autofocus name="product_id" style="width:500px; "class="chzn-select" required >
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
<strong> <input type="text" name="d1" class="tcal" placeholder="from" required autocomplete="off" />  <input type="text" placeholder="to" name="d2" class="tcal" autocomplete="off" required />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large" ></i>submit</button>
</form>
<?php
if (isset($_GET['product_id'])) {
	$d1=date(('Y-m-d'),strtotime($_GET['d1']));
	$d2=date(('Y-m-d'),strtotime($_GET['d2']));
?>
<div id="printableArea">
<table class="table table-bordered" id="resultTable" data-responsive="table">
<thead>
<tr>
	<th> date </th>
<th> Product Name </th>
<th> Generic Name </th>
<th> Price </th>
<th> Qty </th>
<th> amount </th>
</tr>
</thead>
<tbody>

<?php
$id=$_GET['product_id'];
$result = $db->prepare("SELECT transaction_id,gen_name,product_code,sales_order.price AS price,sales_order.date AS date,amount,sales_order.qty AS qty FROM sales_order JOIN products ON products.product_id=sales_order.product  WHERE product_id= :product_id AND sales_order.date >=:a AND sales_order.date<=:b");
$result->bindParam(':product_id', $id);
$result->bindParam(':a', $d1);
$result->bindParam(':b', $d2);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
?>
<tr class="record">
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['product_code']; ?></td>
<td><?php echo $row['gen_name']; ?></td>
<td>
<?php
$price=$row['price'];
echo formatMoney($price, true);
?>
</td>
<td><?php echo $row['qty']; ?></td>
<td>
<?php
$amount=$row['amount'];
echo formatMoney($amount, true);
?>
</td>
</tr>
<?php
}
?>
<tr>
<th>TOTAL</th>
<th style="text-align: right;">TOTAL</th>
</tr>
</tbody>
</table>
</div>
<?php } ?>
<button  style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</button></a>

</div></div>
</body>
<?php include('../main/footer.php');?>
</html>