<?php
$title = "Sales Returns";
include('navfixed.php');
include('../connect.php');
?>

<div class="container">
    <i class="icon-money"></i> Sales Returns


<ul class="breadcrumb">
    <a href="../main/index.php"><li>Dashboard</li></a> /
    <li class="active">Sales Returns</li>
</ul>


    <a href="../main/index.php">
        <button class="btn btn-success btn-large" style="float: none;">
            <i class="icon icon-circle-arrow-left icon-large"></i> Back
        </button>
    </a>
    <?php
    $low_stock_result = $db->prepare("SELECT * FROM products WHERE qty < level ORDER BY product_id DESC");
    $low_stock_result->execute();
    $low_stock_count = $low_stock_result->rowCount();
    ?>
    <div style="text-align: center;">
        <font style="color: rgb(255, 95, 66); font: bold 22px 'Aleo';">
            <?php echo $low_stock_count; ?>
        </font>
        <a rel="facebox" href="../main/level.php">
            <button class="btn btn-primary">Low Running Products</button>
        </a>
    </div>
</div>

<div class="container">
    <form action="returning.php" method="post">
        <input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
        <select autofocus name="product" style="width: 500px;" class="chzn-select" required>
            <option></option>
            <?php
            $product_result = $db->prepare("SELECT * FROM products");
            $product_result->execute();
            while ($row = $product_result->fetch()) {
                ?>
                <option value="<?php echo $row['product_id']; ?>">
                    <?php echo $row['product_code']; ?> - <?php echo $row['gen_name']; ?>
                </option>
            <?php
            }
            ?>
        </select>
        <input type="number" name="qty" min="1" placeholder="Qty" autocomplete="off" style="width: 65px; height: 30px; padding-top: 6px; padding-bottom: 4px; margin-right: 4px; font-size: 15px;" required>
        <input type="text" name="price" placeholder="Price" autocomplete="off" style="width: 65px; height: 30px; padding-top: 6px; padding-bottom: 4px; margin-right: 4px; font-size: 15px;" required>
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <button type="submit" class="btn btn-info" style="width: 123px; height: 35px; margin-top: -5px;">
            <i class="icon-plus-sign icon-large"></i> Add
        </button>
    </form>

    <div id="printableArea">
        <table class="table table-bordered" id="resultTable" data-responsive="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Generic Name</th>
                    <th>Category / Description</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $invoice_id = $_GET['invoice'];
                $return_result = $db->prepare("SELECT transaction_id, product_code, gen_name, product, product_name, o_price, amount, returns.qty AS qty, product_id FROM returns RIGHT OUTER JOIN products ON products.product_id=returns.product WHERE invoice= :userid");
                $return_result->bindParam(':userid', $invoice_id);
                $return_result->execute();
                while ($row = $return_result->fetch()) {
                    ?>
                    <tr class="record">
                        <td hidden><?php echo $row['product']; ?></td>
                        <td><?php echo $row['product_code']; ?></td>
                        <td><?php echo $row['gen_name']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td>
                            <?php
                            $unit_price = $row['amount'] / $row['qty'];
                            echo formatMoney($unit_price, true);
                            ?>
                        </td>
                        <td><?php echo $row['qty']; ?></td>
                        <td>
                            <?php
                            echo formatMoney($row['amount'], true);
                            ?>
                        </td>
                        <td>
                            <a rel="facebox" href="editreturn.php?id=<?php echo $row['transaction_id']; ?>">
                                <button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Edit</button>
                            </a>
                            <a href="deletereturn.php?id=<?php echo $row['transaction_id']; ?>&qty=<?php echo $row['qty']; ?>&product_id=<?php echo $row['product_id']; ?>&invoice=<?php echo $invoice_id; ?>">
                                <button class="delbutton" onclick="return confirm('Are you sure you want to Remove?');"><i class="icon icon-remove"></i> Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <td>Total Amount:</td>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <strong style="font-size: 12px; color: #222222;">Total:</strong>
                    </th>
                    <td colspan="1">
                        <strong style="font-size: 12px; color: #222222;">
                            <?php
                            $invoice_id = $_GET['invoice'];
                            $total_result = $db->prepare("SELECT sum(amount) FROM returns WHERE invoice= :a");
                            $total_result->bindParam(':a', $invoice_id);
                            $total_result->execute();
                            $total_amount = 0;
                            while ($row = $total_result->fetch()) {
                                $total_amount = $row['sum(amount)'];
                            }
                            echo formatMoney($total_amount, true);
                            ?>
                        </strong>
                    </td>
                    <th></th>
                </tr>
            </tbody>
        </table>
        <br>
        <a rel="facebox" href="checkreturn.php?invoice=<?php echo $_GET['invoice']; ?>&total=<?php echo $total_amount; ?>&totalprof=<?php echo ''; ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']; ?>">
            <button class="btn btn-success btn-large btn-block">
                <i class="icon icon-save icon-large" accesskey="s"></i> SAVE
            </button>
        </a>
        <div class="clearfix"></div>
    </div>
</div>

<?php include('footer.php'); ?>

</body>

</html>