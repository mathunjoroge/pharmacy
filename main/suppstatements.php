<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='purchases and payments';
include('../main/navfixed.php');

?>
<?php
// Check if $_GET['d1'] is set and not empty
if(isset($_GET['d1']) && !empty($_GET['d1'])) {
    $d1 = date('Y-m-d', strtotime($_GET['d1']));
} else {
    // Handle error: d1 not set or empty
    // You can choose to set a default value, redirect, or display an error message
    $d1 = null; // Setting a default value to null in this example
}

// Check if $_GET['d2'] is set and not empty
if(isset($_GET['d2']) && !empty($_GET['d2'])) {
    $d2 = date('Y-m-d', strtotime($_GET['d2']));
} else {
    // Handle error: d2 not set or empty
    // You can choose to set a default value, redirect, or display an error message
    $d2 = null; // Setting a default value to null in this example
}
?>

<div class="container">
      <div class="container">
			

	<div class="container">
		<p>&nbsp;</p>

<i class="icon-bar-chart"></i> purchases and payments
</div>
<div class="container" ><ul class="breadcrumb">
<a  href="statementslist.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<li class="active">purchases and payments Report</li>
</ul>
<form class="ui-widget" action="suppstatements.php" method="get">

<select name="term" placeholder="select supplier" required><option></option>
<?php
$result = $db->prepare("SELECT * FROM supliers");

$result->execute();
for ($i = 0; ($row = $result->fetch()); $i++) {
?>
<option value="<?php echo $row["suplier_id"] ; ?>"><?php echo $row["suplier_name"]; ?>  </option>
<?php }
?>
</select>			
<strong>From : <input type="text"  name="d1" class="tcal" autocomplete="off" /> To: <input type="text"  name="d2" class="tcal" autocomplete="off"/>
<button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;" type="submit"><i class="icon icon-search icon-large"></i> Submit</button>
</form>
</div>
<div class="content" id="content">
<div class="container">
<p class="center">purchases and payments report</p>
<p class="center">From: <?php echo $d1; ?> to: From <?php echo $d2; ?></p>

<?php
if(isset($_GET['term'])) {
$supplier_id = $_GET['term'];
// Query to get the total credit purchases made from the selected supplier
$query = $db->prepare("SELECT SUM(amount) AS total_purchases FROM purchases2 WHERE name = :supplier_id AND type = 'Credit'");
$query->bindParam(':supplier_id', $supplier_id);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

// Display the result
$total_purchases = $result['total_purchases'];
$supplier_name = ""; // Initialize this variable to hold the supplier name
if($total_purchases !== null) {
// Fetch the name of the selected supplier
$supplier_query = $db->prepare("SELECT suplier_name FROM supliers WHERE suplier_id = :supplier_id");
$supplier_query->bindParam(':supplier_id', $supplier_id);
$supplier_query->execute();
$supplier_result = $supplier_query->fetch(PDO::FETCH_ASSOC);
$supplier_name = $supplier_result['suplier_name'];

echo '<p class="center">'.$supplier_name.'</p>';
} else {
echo "No credit purchases found for $supplier_name.";
}
} ?>
</div>

<table class="table table-bordered" data-responsive="table" style="text-align: left;">
<thead>
<tr>

<th width="15%"> Date </th>

<th width="20%"> Invoice Number </th>


<th width="15%" style="text-align:right;"> Amount Due </th>


</tr>
</thead>
<tbody>

<?php
$c = "Credit";  

$result = $db->prepare(
"SELECT date,invoicesupp,amount  FROM purchases2 WHERE type=:c  AND name=:supplier AND date>=:a AND date<=:b"
);
$result->bindParam(":supplier", $term);
$result->bindParam(":a", $d1);
$result->bindParam(":b", $d2);
$result->bindParam(":c", $c);

$result->execute();
for ($i = 0; ($row = $result->fetch()); $i++) { ?>
<tr class="record">
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["invoicesupp"]; ?></td>
<td style="text-align:right;"><?php
$credit = $row["amount"];
echo formatMoney($credit, true);
?></td>


</tr>
<?php }
?>

</tbody>
<thead>
<tr>
<th>total for the period:</th>	
<th></th>
<th style="text-align:right;">

<?php
$c = "Credit";
$results = $db->prepare(
"SELECT sum(amount) FROM purchases2 WHERE type=:c  AND name=:supplier AND date>=:a AND date<=:b"
);
$results->bindParam(":supplier", $term);
$results->bindParam(":a", $d1);
$results->bindParam(":b", $d2);
$results->bindParam(":c", $c);
$results->execute();
for ($i = 0; ($rows = $results->fetch()); $i++) {
$totalcredit = $rows["sum(amount)"];
if (isset($totalcredit) && $totalcredit !== null) {
// Value is set and not null
echo $totalcredit;
} else {
// Value is not set or null
echo 0;
}
}
?>

</th>
</tr>
</thead>
</table>

<div class="container">
Total cash purchases made
<div class="content" id="content">
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
<thead>
<tr>

<th width="15%"> Date </th>

<th width="20%"> Invoice Number </th>


<th width="15%" style="text-align:right;"> Amount paid </th>


</tr>
</thead>
<tbody>

<?php
$c = "cash";  

$result = $db->prepare(
"SELECT * FROM purchases2 WHERE type=:c  AND name=:supplier AND date>=:a AND date<=:b"
);
$result->bindParam(":supplier", $term);
$result->bindParam(":a", $d1);
$result->bindParam(":b", $d2);
$result->bindParam(":c", $c);

$result->execute();
for ($i = 0; ($row = $result->fetch()); $i++) { ?>
<tr class="record">
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["invoicesupp"]; ?></td>			

<td style="text-align:right;"><?php
$cash = $row["amount"];
echo formatMoney($cash, true);
?></td>


</tr>
<?php }
?>

</tbody>
<thead>
<tr>
<th>total for the period:</th>	
<th></th>
<th style="text-align:right;">

<?php


$c = "cash";

$results = $db->prepare(
"SELECT sum(amount) FROM purchases2 WHERE type=:c  AND name=:supplier AND date>=:a AND date<=:b"
);
$results->bindParam(":supplier", $term);
$results->bindParam(":a", $d1);
$results->bindParam(":b", $d2);
$results->bindParam(":c", $c);
$results->execute();
for ($i = 0; ($rows = $results->fetch()); $i++) {
$totalcash = $rows["sum(amount)"];

if (isset($totalcash) && $totalcash !== null) {
// Value is set and not null
echo $totalcash;
} else {
// Value is not set or null
echo 0;
}
}
?>

</th>
</tr>
</thead>
</table>
</div>

<!---payments for the period------>

<div class="container">
<p>Payments: </p>
<table class="table table-bordered"  data-responsive="table" style="text-align: left;">
<thead>
<tr><th width="50%"> Date </th>			

<th width="50%" style="text-align: right;"> Amount </th>				
</tr>
</thead>
<?php
$results = $db->prepare(
"SELECT amount2,date FROM payments WHERE name=:supplier AND date>=:a AND date<=:b"
);
$results->bindParam(":supplier", $term);
$results->bindParam(":a", $d1);
$results->bindParam(":b", $d2);
$results->execute();
for ($i = 0; ($rows = $results->fetch()); $i++) { ?>
<tr>
<td><?php echo $rows['date'];  ?></td>

<td style="text-align: right;"><?php echo $rows['amount2'];  ?></td>
</tr>	
<?php } ?>
<tr>
<th > Total payments: </th>
<th style="text-align: right;">  

<?php
$results = $db->prepare(
"SELECT sum(amount2) FROM payments WHERE name=:supplier AND date>=:a AND date<=:b"
);
$results->bindParam(":supplier", $term);
$results->bindParam(":a", $d1);
$results->bindParam(":b", $d2);
$results->execute();
for ($i = 0; ($rows = $results->fetch()); $i++) {
$payments = $rows["sum(amount2)"];

if (isset($payments) && $payments !== null) {
// Value is set and not null
echo $payments;
} else {
// Value is not set or null
echo 0;
}
}
?>
</th>

</tr>

</thead>

<th > Total Balance: </th>
<th style="text-align: right;"><?php
$totalcredit - $payments;
echo formatMoney($totalcredit - $payments, true);
?></th>

</table>
</div>
</div>
</div>
<!---printable div ends ------>
<button  style="width: 123px; height:35px; margin-top:-2px; float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"><i class="icon icon-print icon-large"></i> Print</a></button>
<div class="clearfix"></div>
</div>
</body>
<?php include "footer.php"; ?>

</html>