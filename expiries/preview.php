<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title = 'print Expiries record';
include('../main/navfixed.php');
?>

<script language="javascript">
    function printContent() {
        var printWindow = window.open('', '', 'toolbar=yes,location=no,directories=yes,menubar=yes,scrollbars=yes,width=800,height=400,left=100,top=25');
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print</title></head><body>');
        printWindow.document.write('<div style="width: 800px; font-size: 13px; font-family: Arial;">');
        printWindow.document.write(document.getElementById('content').innerHTML);
        printWindow.document.write('</div></body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

<?php
$invoiceNumber = $_GET['invoice'];
$expiryResult = $db->prepare("SELECT * FROM expiriestt WHERE invoice_number= :invoice");
$expiryResult->bindParam(':invoice', $invoiceNumber);
$expiryResult->execute();
while ($expiryRow = $expiryResult->fetch()) {
    $invoiceNumber = $expiryRow['invoice_number'];
    $date = date('d-m-Y');
    $amount = $expiryRow['amount'];
}
?>
<div class="container">

<a href="../main/index.php"><button class="btn btn-success"><i class="icon-arrow-left"></i> Home</button></a></div>

<div class="container" id="content">  
                <center>
                 
                        <?php
                        $pharmacyResult = $db->prepare("SELECT *  FROM pharmacy_details");
                        $pharmacyResult->execute();
                        while ($pharmacyRow = $pharmacyResult->fetch()) {
                        ?>
                            <div  class="container">
                                <div class="container"><?php echo $pharmacyRow["pharmacy_name"]; ?> </div>
                                <div class="container"><?php echo $pharmacyRow["location"]; ?> </div>
                                <div class="container"><?php echo $pharmacyRow["contact"]; ?> </div>
                                <div class="container"><?php echo $pharmacyRow["email"]; ?> </div>
                                <div class="container">Expiries Record</div>
                            </div>
                        <?php
                        }
                        ?>
                  
                </center>
             
                    <?php
                    $customerResult = $db->prepare("SELECT * FROM customer WHERE customer_name= :customer");
                    $customerResult->bindParam(':customer', $customerName);
                    $customerResult->execute();
                    while ($customerRow = $customerResult->fetch()) {
                        $address = $customerRow['address'];
                        $contact = $customerRow['contact'];
                    }
                    ?>
         
                <table>
                    <tr>
                        <td>INV:</td>
                        <td><?php echo $invoiceNumber ?></td>
                    </tr>
                    <tr>
                        <td>Date :</td>
                        <td><?php echo $date; ?></td>
                    </tr>
                </table>
         
            <table border="1" cellpadding="4" cellspacing="0" style="font-family: Arial; font-size: 12px; text-align: left;" width="100%">
                <thead>
                    <tr>
                        <th>Brand Name</th>
                        <th>Generic Name</th>
                        <th>Qty</th>
                        <th>Cost</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $invoiceID = $_GET['invoice'];
                    $expiryProductResult = $db->prepare("SELECT transaction_id, gen_name, product_code, expiries.price AS price, discount, amount, expiries.qty AS qty FROM expiries JOIN products ON products.product_id=expiries.product WHERE invoice= :invoiceID");
                    $expiryProductResult->bindParam(':invoiceID', $invoiceID);
                    $expiryProductResult->execute();
                    while ($expiryProductRow = $expiryProductResult->fetch()) {
                    ?>
                       <tr class="record">
    <td><?php echo isset($expiryProductRow['gen_name']) ? $expiryProductRow['gen_name'] : $expiryProductRow['product_code']; ?></td>
    <td><?php echo isset($expiryProductRow['product_code']) ? $expiryProductRow['product_code'] : $expiryProductRow['gen_name']; ?></td>
    <td><?php echo $expiryProductRow['qty']; ?></td>
    <td><?php echo formatMoney($expiryProductRow['price'], true); ?></td>
    <td><?php echo formatMoney($expiryProductRow['amount'], true); ?></td>
</tr>

                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="4" style="text-align: right;"><strong style="font-size: 12px;">Cost: &nbsp;</strong></td>
                        <td colspan="2"><strong style="font-size: 12px;">
                                <?php
                                $invoiceID = $_GET['invoice'];
                                $totalAmountResult = $db->prepare("SELECT SUM(amount) FROM expiries WHERE invoice= :invoiceID");
                                $totalAmountResult->bindParam(':invoiceID', $invoiceID);
                                $totalAmountResult->execute();
                                while ($totalAmountRow = $totalAmountResult->fetch()) {
                                    echo formatMoney($totalAmountRow['SUM(amount)'], true);
                                }
                                ?>
                            </strong></td>
                    </tr>
                </tbody>
            </table>
            <div class="container"><p>&nbsp;</p></div>
            <td>Recorded By:</td>
            <td><?php echo $_SESSION['SESS_FIRST_NAME']; ?></td>
        </div>
    </div>
</div>
<div class="pull-right" style="margin-right:100px;">
    <button class="btn btn-success btn-large" onclick="printContent()"><i class="icon-print"></i> Print</button>
</div>
<?php include'../main/footer.php';
?>