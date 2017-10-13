<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['code'];
$z = $_POST['gen'];
$b = $_POST['name'];
$e = $_POST['supplier'];
$g = $_POST['o_price'];
$j = $_POST['sold'];
$k = $_POST['markup'];
$m = $_POST['level'];
$d = $g*$k;
$h = $d-$g;
// query
$sql = "UPDATE products 
        SET product_code=?, gen_name=?, product_name=?,supplier=?,  o_price=?,  level=?,markup=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$z,$b,$e,$g,$m,$k,$id));
header("location: products.php?");

?>
