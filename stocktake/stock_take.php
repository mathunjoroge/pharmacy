<?php
require_once('../main/auth.php');
include('../connect.php');
include('../main/navfixed.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- js -->         
<link href="../main/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../main/lib/jquery.js" type="text/javascript"></script>
<script src="../main/src/facebox.js" type="text/javascript"></script>
<title>
stock take
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

</head>

<body>
<!--  setting selling price not less than buying price -->
<style>
    .warning {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 20px;
        border: 1px solid transparent;
        border-radius: .25rem;
    }
</style>
<script>
function minValue(){
let buying_price = document.getElementById("buying_price").value;
let selling_price = document.getElementById("selling_price").value;
if (selling_price < buying_price) {
document.getElementById("field2").value = buying_price;
alert("Value for selling_price cannot be lower than buying_price!");
}
}
document.getElementById("selling_price").onchange = minValue;
</script>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../main/index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">stock take</li>
    </ol>
  </nav>
</div>
<div class="warning alert alert-danger" role="alert">
    Are you done with stock take. you can save and continue next time?
</div>
<?php if (isset($_GET['message'])) {
?>
<div class="container success">
<p class="text text-success">drugs have been updated!</p>
</div>
<?php     // code...
} ?>
<div class="container">
<input type="text" id="search" onkeyup="myFunction()" placeholder="filter any column.." title="Type in a drug">
<form action="save_s_take.php" method="POST">
<table class="table table-bordered" id="products_table" >
<thead class="bg-primary">
<tr>
<th>generic name</th>
<th>brand name</th>
<th>qty available</th>
<th>buying price</th>
<th>selling price</th>
<th>mark up</th>
</tr>
</thead>
<?php
$result = $db->prepare("SELECT product_id,o_price AS buying_price,  gen_name, product_name,price AS selling_price, qty,  markup FROM products");
$result->execute();
for($i=0; $row = $result->fetch(); $i++){     
$markup = $row['markup'];
$drug = $row['gen_name'];
$brand = $row['product_name'];
$drug_id= $row['product_id'];
$qty= $row['qty'];
$buying_price= $row['buying_price'];
$selling_price= round($row['selling_price']);

?>
<tbody>
<tr>
<td><?php if (isset($drug) || !empty($row['gen_name'])) {
    echo $drug;
} 
else{
    echo $brand;
} ?></td>
<td><?php if (isset($brand) || !empty($row['product_name'])) {
    echo $brand;
} 
else{
    echo $drug;
} ?></td>
<input type="hidden" name="drug_id[]" value="<?php echo $drug_id; ?>" >
<td ><input style="width: 5rem;" type="number" name="qty[]" value="<?php echo $qty; ?>" contenteditable="true" ></td>
<td ><input type="number" name="buying_price[]" id="buying_price" value="<?php echo round($buying_price); ?>" style="width: 5rem;" contenteditable="true"></td>
<td ><input type="number" name="selling_price[]" id="selling_price" value="<?php echo round($selling_price); ?>" style="width: 5rem;" contenteditable="true"></td>
<td ><input type="number" name="markup[]" id="markup" value="<?php echo ($markup); ?>" style="width: 5rem;" readonly></td>
<?php }?>
</tr>
<tr> 
</tbody>
</table>
<button class="btn btn-success"><i class="icon icon-save icon-large"></i>save</button></span> 
</form>

</br> 
<script>
var $rows = $('#products_table tbody tr');
$('#search').keyup(function() {

var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
reg = RegExp(val, 'i'),
text;

$rows.show().filter(function() {
text = $(this).text().replace(/\s+/g, ' ');
return !reg.test(text);
}).hide();
});
</script>
<script>
$(document).ready(function(){
    // When any link is clicked
    $('a').click(function(event){
        // Prevent the link from navigating immediately
        event.preventDefault();
        // Show the warning message
        $('.warning').fadeIn();
        // After 2 seconds, hide the warning message
        setTimeout(function(){
            $('.warning').fadeOut();
            // Then navigate to the link's destination
            window.location = $(event.currentTarget).attr('href');
        }, 2000);
    });
});
</script>
<?php include "../main/footer.php"; ?>
</div>
</body>
</html>