<?php
ini_set("display_errors", "On");

session_start(); 
include('../connect.php');

$drug_ids = $_POST['drug_id'];
$qtys = $_POST['qty'];
$buying_prices = $_POST['buying_price'];
$selling_prices = $_POST['selling_price'];

//making an array of values
$combined_arrays = array();

for ($i = 0; $i < count($drug_ids); $i++) {
    array_push($combined_arrays, array(
        'drug_id' => $drug_ids[$i],
        'buying_price' => $buying_prices[$i],
        'selling_price' => $selling_prices[$i],
        'qty' => $qtys[$i]
    ));
}

foreach ($combined_arrays as $row) {
    $markup = (1 + (($row['selling_price'] - $row['buying_price']) / $row['buying_price']));
    $sql = "UPDATE products 
            SET 
                o_price = :buying_price,
                price = :selling_price,
                markup = :markup, 
                qty = :qty 
            WHERE 
                product_id = :product_id";
    
    $result = $db->prepare($sql);
    $result->execute(array(
        ':buying_price' => $row['buying_price'],
        ':selling_price' => $row['selling_price'],
        ':markup' => $markup,
        ':qty' => $row['qty'],      
        ':product_id' => $row['drug_id']
    ));
}
header("location: stock_take.php?message=1");
?>
