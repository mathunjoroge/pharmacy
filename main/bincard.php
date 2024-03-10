<?php
require_once('auth.php');
include('../connect.php');
include('../main/navfixed.php');
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

?>
<!DOCTYPE html>
<html>
<head>
<!-- js -->			
<link href="../main/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../main/lib/jquery.js" type="text/javascript"></script>
<script src="../main/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : '../main/src/loading.gif',
      closeImage   : '../main/src/closelabel.png'
    })
  })
</script>
<title>
product movement
</title>
<link href="../main/vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="../main/css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../main/css/DT_bootstrap.css">

<link rel="stylesheet" href="../main/css/font-awesome.min.css">

<link href="../main/css/bootstrap-responsive.css" rel="stylesheet">

<!-- combosearch box-->	

<script src="../main/vendors/jquery-1.7.2.min.js"></script>
<script src="../main/vendors/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="../main/tcal.css" />
<script type="text/javascript" src="../main/tcal.js"></script>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

</head>
<?php
function createRandomPassword() {
$chars = "003232303232023232023456789";
srand((double)microtime()*1000000);
$i = 0;
$pass = '' ;
while ($i <= 7) {

$num = rand() % 33;

$tmp = substr($chars, $num, 1);

$pass = $pass . $tmp;

$i++;

}
return $pass;
}
$finalcode='INV-'.createRandomPassword();
?>
<body style="text-transform:capitalize;">

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
<strong>From : <input type="text" name="d1" class="tcal" autocomplete="off" /> To: <input type="text"  name="d2" class="tcal" autocomplete="off" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large" ></i>submit</button>
</form>
<?php
if (isset($_GET['product_id'])) {
	$d1=$_GET['d1'];
	$d2=$_GET['d2'];
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