<?php
ini_set("display_errors", "On");
require_once "auth.php";
include "../connect.php";
function formatMoney($number, $fractional = false)
{
    if ($fractional) {
        $number = sprintf("%.2f", $number);
    }
    while (true) {
        $replaced = preg_replace("/(-?\d+)(\d\d\d)/", '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
?>
<title>
Preview Invoice
</title>


<style type="text/css">
    @media print {
#content{
    border: 1px solid white;
    height: auto !important;
   
    page-break-before: always !important;
    page-break-after: auto;
 }

.paper-size {
    width: 76mm !important;
}}
</style>
<link href="css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

<link rel="stylesheet" href="css/font-awesome.min.css">

<link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<head>

</head>

<body>
<?php include "navfixed.php";  ?>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div  id="content">
<div class="container">
<center>
<?php
$result = $db->prepare("SELECT *  FROM pharmacy_details");
$result->execute();
for ($i = 0; ($row = $result->fetch()); $i++) {
    $slogan = $row["slogan"]; ?>
<div id="logo" class="container">
<div class="container"><?php echo $row["pharmacy_name"]; ?> </div>
<div class="container"><?php echo $row["location"]; ?> </div>
<div class="container"><?php echo $row["contact"]; ?> </div>
<div class="container"><?php echo $row["email"]; ?> </div>

<?php
}
?>


<table class="bill-details">
<tbody>

<th class="center-align" colspan="2"><span class="receipt">Original Receipt</span></th>
</div>
</center>
</tr>
</tbody>
</table>

<table class="table table-bordered">
<thead>
<tr>
<th class="heading name">Brand Name</th>
<th class="heading qty">Qty</th>
<th class="heading rate">price</th>
<th class="heading amount">Amount</th>
</tr>
</thead>
<tbody>
<?php
$id = $_GET["invoice"];
$result = $db->prepare("SELECT transaction_id,gen_name,product_code,sales_order.price AS price,discount,amount,sales_order.qty AS qty FROM sales_order JOIN products ON products.product_id=sales_order.product WHERE invoice= :userid");
$result->bindParam(":userid", $id);
$result->execute();
for ($i = 0; ($row = $result->fetch()); $i++) { ?>
<tr>
<td><?php echo $row["product_code"]; ?></td>
<td><?php echo $row["qty"]; ?></td>
<td class="price"><?php
$ppp = $row["price"];
echo formatMoney($ppp, true);
?></td>
<td class="price"><?php
$dfdf = round($row["amount"]);
echo formatMoney($dfdf, true);
?></td>
</tr>
<?php }
?>

<tr>
                <th colspan="3" class="total text">Total</th>
                <th class="total price"><?php
$invoice = $_GET["invoice"];
$result = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
$result->bindParam(":a", $invoice);
$result->execute();
for ($i = 0; ($row = $result->fetch()); $i++) {
    $total = $row["sum(amount)"];
    echo formatMoney(round($total), true);

?></th>
<?php } ?>
            </tr>


</tbody>
</table>
<section>
<p>
served by: <span><?php echo $_SESSION["SESS_FIRST_NAME"]; ?></span>
</p>
<p style="text-align:center">
Thank you for your visit!
</p>
</section>
<footer style="text-align:center">
<p><?php echo $slogan; ?></p>
</footer>
</div>
</div>
</div>
<div class="pull-right" style="margin-right:100px;">
<button class="btn btn-success btn-large" style="margin-left: 45%;" value="content" id="goback" onclick="javascript:printDiv('content')" >print receipt</button>

 <script type="text/javascript">
function printDiv(content) {
//Get the HTML of div
var divElements = document.getElementById(content).innerHTML;

//Get the HTML of whole page
var oldPage = document.body.innerHTML;

//Reset the page's HTML with div's HTML only

document.body.innerHTML = 
"<html><head><title></title></head><body>" + 
divElements + "</body>";

//Print Page
window.print();

//Restore orignal HTML
document.body.innerHTML = oldPage;          
}
</script>
<div class="container">
<?php include "footer.php"; ?>
</div>
</body>

</html>