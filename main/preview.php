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


<script language="javascript">
function Clickheretoprint()
{ 
var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
var content_vlue = document.getElementById("content").innerHTML; 
var docprint=window.open("","",disp_setting); 
docprint.document.open(); 
docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
docprint.document.write(content_vlue); 
docprint.document.close(); 
docprint.focus(); 
}
</script>
<link href="css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

<link rel="stylesheet" href="css/font-awesome.min.css">

<link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<head>
<style>
body {
margin: 0;
padding: 0;
font-family: 'PT Sans', sans-serif;
}

@page {
size: 2.8in 11in;
margin-top: 0cm;
margin-left: 0cm;
margin-right: 0cm;
}

table {
width: 100%;
}

tr {
width: 100%;

}

h1 {
text-align: center;
vertical-align: middle;
}

#logo {
width: 60%;
text-align: center;
-webkit-align-content: center;
align-content: center;
padding: 5px;
margin: 2px;
display: block;
margin: 0 auto;
}

header {
width: 100%;
text-align: center;
-webkit-align-content: center;
align-content: center;
vertical-align: middle;
}

.items thead {
text-align: center;
}

.center-align {
text-align: center;
}

.bill-details td {
font-size: 12px;
}

.receipt {
font-size: medium;
}

.items .heading {
font-size: 12.5px;
text-transform: uppercase;
border-top:1px solid black;
margin-bottom: 4px;
border-bottom: 1px solid black;
vertical-align: middle;
}

.items thead tr th:first-child,
.items tbody tr td:first-child {
width: 47%;
min-width: 47%;
max-width: 47%;
word-break: break-all;
text-align: left;
}

.items td {
font-size: 12px;
text-align: right;
vertical-align: bottom;
}

.price::before {

font-family: Arial;
text-align: right;
}

.sum-up {
text-align: right !important;
}
.total {
font-size: 13px;
border-top:1px dashed black !important;
border-bottom:1px dashed black !important;
}
.total.text, .total.price {
text-align: right;
}

.line {
border-top:1px solid black !important;
}
.heading.rate {
width: 20%;
}
.heading.amount {
width: 25%;
}
.heading.qty {
width: 5%
}
p {
padding: 1px;
margin: 0;
}
section, footer {
font-size: 12px;
}
</style>
</head>

<body>
<?php include "navfixed.php";  ?>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div  id="content">
<header>
<?php
$result = $db->prepare("SELECT *  FROM pharmacy_details");
$result->execute();
for ($i = 0; ($row = $result->fetch()); $i++) {
    $slogan = $row["slogan"]; ?>
<div id="logo" class="media">
<div class="container"><?php echo $row["pharmacy_name"]; ?> </div>
<div class="container"><?php echo $row["location"]; ?> </div>
<div class="container"><?php echo $row["contact"]; ?> </div>
<div class="container"><?php echo $row["email"]; ?> </div>
</div>
<?php
}
?>
</header>

<table class="bill-details">
<tbody>

<th class="center-align" colspan="2"><span class="receipt">Original Receipt</span></th>
</tr>
</tbody>
</table>

<table class="items">
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
$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
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