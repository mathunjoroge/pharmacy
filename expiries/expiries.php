<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='record expiries';
include('../main/navfixed.php');
?>
<div class="container" >
	<p>&nbsp;</p>
<i class="icon-money"></i>expiries

<ul class="breadcrumb">
<a href="../main/index.php"><li>Dashboard</li></a> /
<li class="active">expiries</li>
		
			
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="../main/index.php"><button class="btn btn-success btn-large" style="float: none;" ><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>	<div style="text-align:center;">
	<?php 
$result = $db->prepare("SELECT * FROM products where qty < level ORDER BY product_id DESC");
$result->execute();
$rowcount123 = $result->rowcount();

?>
			<font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';"><?php echo $rowcount123; ?></font><a rel="facebox" href="../main/level.php">  <button class="btn btn-primary">Low running products</button></a>
			</div>
</div>
<div class="container">

<form action="incoming.php" method="post" >

<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
      <select autofocus name="product" style="width:430px;font-size:0.8em;" class="chzn-select" id="mySelect">
<option></option>
<?php include '../connect.php';
$result = $db->prepare("SELECT* FROM products RIGHT OUTER JOIN batch ON batch.product_id=products.product_id WHERE quantity>=1 ORDER BY expirydate  ASC");
$result->execute();
?>
    <?php for ($i = 0; $row = $result->fetch(); $i++): ?>
    <option value="<?php echo $row['product_id']; ?>" data-qty="<?=$row['quantity'];?>" data-pr="<?=round($row['o_price']*$row['markup']);?>" data-exp="<?=$row['expirydate'];?>" data-batch="<?=$row['batch_no'];?>" data-maxdisc="<?=$row['maxdiscre'];?>" data-maxdiscpc="<?=$row['maxdiscpr'];?>">
        <?=$row['gen_name'];?> -
            <?=$row['product_code'];?>
    </option>
<?php endfor;?>
</select>

<span id="price" contenteditable="true" name="price"></span>
<script>
$('#mySelect').on('change', function (event) {
    var selectedOptionIndex = event.currentTarget.options.selectedIndex;
    var price = event.currentTarget.value;
    var quantity = event.currentTarget.options[selectedOptionIndex].dataset.qty;
    var price = event.currentTarget.options[selectedOptionIndex].dataset.pr;
    var exp = event.currentTarget.options[selectedOptionIndex].dataset.exp;
    var batch = event.currentTarget.options[selectedOptionIndex].dataset.batch;
    var discountmax = event.currentTarget.options[selectedOptionIndex].dataset.maxdiscpc;
    var minprice = event.currentTarget.options[selectedOptionIndex].dataset.maxdisc;
$('[name=qty]').val(quantity);
$('[name=pr]').val(price);
$('[name=exp]').val(exp);
$('[name=batch]').val(batch);
document.getElementById('qtyy').max =quantity;
document.getElementById('fpr').min =price*minprice;
document.getElementById('disc').max =discountmax;
});
</script>
<input type="hidden" name="batch"  placeholder="batch" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;">
<input type="number" name="quantity" min="1" max="" placeholder="qty" id="qtyy" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" required>
<input  name="qty" min="1" placeholder="in stock" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" readonly />
<input  name="exp" placeholder="expiry" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" readonly />
<input type="number" name="pr" min="1" placeholder="price" id="fpr" step=".00001" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;">

<input type="hidden" name="pc" max="" placeholder="disc" id="disc" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date('m/d/y'); ?>" />

<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large" ></i> Add</button>
</form>
<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Product Name </th>
			<th> Generic Name </th>
		
			<th> Price </th>
			<th> Qty </th>
			<th> Amount </th>

			<th> Action </th>
		</tr>
	</thead>
	<tbody>

			<?php
$id = $_GET['invoice'];
$result = $db->prepare("SELECT transaction_id,gen_name,product_code,sales_order.price AS price,discount,amount,sales_order.qty AS qty FROM sales_order JOIN products ON products.product_id=sales_order.product WHERE invoice= :userid AND amount!= ''");
$result->bindParam(':userid', $id);
$result->execute();
for ($i = 1; $row = $result->fetch(); $i++) {
	?>
			<tr class="record">
			<td hidden><?php echo $row['product']; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
		
			<td>
			<?php

echo  ($row['price']);
	?>
			</td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
$dfdf = $row['amount'];
	echo $dfdf;
	?>
			</td>
		
			<td width="90"><a rel="facebox" href="editsales.php?id=<?php echo $row['transaction_id']; ?>"><button class="btn btn-mini btn-warning"><i class="icon icon-edit"></i> edit </button></a>
			<a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty']; ?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a>

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
			<td>  </td>
			<th>  </th>
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php
function formatMoney($number, $fractional = false) {
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
$sdsd = $_GET['invoice'];
$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
$resultas->bindParam(':a', $sdsd);
$resultas->execute();
for ($i = 0; $rowas = $resultas->fetch(); $i++) {
	$fgfg = $rowas['sum(amount)'];
	echo formatMoney($fgfg, true);
}
?>
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
			<?php
$resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
$resulta->bindParam(':b', $sdsd);
$resulta->execute();
for ($i = 0; $qwe = $resulta->fetch(); $i++) {
	$asd = $qwe['sum(profit)'];

}
?>

				</td>
				<th></th>
			</tr>

	</tbody>
</table><br>
<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id'] ?>&invoice=<?php echo $_GET['invoice'] ?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME'] ?>"><button class="btn btn-success btn-large btn-block" accesskey="s"><i class="icon icon-save icon-large" accesskey="s"></i> SAVE</button></a>
<div class="clearfix"></div>
</div>
</div>


</body>
<?php include '../main/footer.php';?>
</html>