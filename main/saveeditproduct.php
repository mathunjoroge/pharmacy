<?php
// configuration
include('../connect.php');
// new data
$id = $_POST['memi'];
$a = $_POST['code'];
$z = $_POST['gen'];
$b = $_POST['name'];
$e = "default supplier";
$g = $_POST['o_price'];
$price = $_POST['s_price'];
$j = $_POST['sold'];
$k = $_POST['markup'];
$m = $_POST['level'];
$qty=$_POST['qty'];
$d = $g*$k;
$h = $d-$g;
// query
$sql = "UPDATE products 
SET product_code=?, gen_name=?, product_name=?,  o_price=?, price=?,   level=?,markup=?,qty=?
WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$a,$g,$price,$m,$k,$qty,$id));
header("location: products.php?");
?>
