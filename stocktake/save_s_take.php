<?php
// Turn on error display
ini_set("display_errors", "On");

// Start session
session_start();

// Include database connection
include('../connect.php');

// Retrieve data from POST
$drug_ids = $_POST['drug_id'];
$qtys = $_POST['qty'];
$buying_prices = $_POST['buying_price'];
$selling_prices = $_POST['selling_price'];

// Combine arrays
$combined_arrays = array();

for ($i = 0; $i < count($drug_ids); $i++) {
    array_push($combined_arrays, array(
        'drug_id' => $drug_ids[$i],
        'buying_price' => $buying_prices[$i],
        'selling_price' => $selling_prices[$i],
        'qty' => $qtys[$i]
    ));
}

// Update products and reset batches
foreach ($combined_arrays as $row) {
    try {
        // Calculate markup
        $markup = (1 + (($row['selling_price'] - $row['buying_price']) / $row['buying_price']));

        // Update product
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

        // Reset batches
        $quantity = 0;
        $sql = "UPDATE batch
                SET quantity=?
                WHERE product_id=?";
        $q = $db->prepare($sql);
        $q->execute(array($quantity, $row['drug_id']));

        // Update quantity on batch
        $qty_new = $row['qty'];
        $batch_no = "entry_batch_1";
        $date = date('m-Y', strtotime('+2 years'));
        $sql = "UPDATE batch
                SET quantity=?,
                expirydate=?
                WHERE product_id=? AND batch_no=?";
        $q = $db->prepare($sql);
        $q->execute(array($qty_new, $date, $row['drug_id'], $batch_no));
    } catch (PDOException $e) {
        // Handle PDO exceptions (database errors)
        // You might want to log or handle errors appropriately
        echo "Error: " . $e->getMessage();
    }
}

// Redirect with message
header("location: stock_take.php?message=1");
?>

?>
