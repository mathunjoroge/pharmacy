<?php
ini_set("display_errors", "On");
require_once('auth.php');
include('../connect.php');
$title = 'record purchase';
include('../main/navfixed.php');

// Fetch low running products
$result = $db->prepare("SELECT * FROM products WHERE qty < level ORDER BY product_id DESC");
$result->execute();
$rowcount123 = $result->rowCount();

?>
<div class="container">
    <i class="icon-money"></i>wholesale
    <ul class="breadcrumb">
        <a href="../main/index.php"><li>Dashboard</li></a> /
        <li class="active">wholesale</li>
    </ul>
    <div style="margin-top: -19px; margin-bottom: 21px;">
        <a href="../main/index.php">
            <button class="btn btn-success btn-large" style="float: none;">
                <i class="icon icon-circle-arrow-left icon-large"></i> Back
            </button>
        </a>
    </div>
    <div style="text-align:center;">
        <font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';"><?php echo $rowcount123; ?></font>
        <a rel="facebox" href="level.php">
            <button class="btn btn-primary">Low running products</button>
        </a>
    </div>
</div>
<div class="container">
    <form action="incoming.php" method="post">
        <input type="hidden" name="pt" value="<?= $_GET['id']; ?>" />
        <input type="hidden" name="invoice" value="<?= $_GET['invoice']; ?>" />
        <select autofocus name="product" style="width:430px;font-size:0.8em;" class="chzn-select" id="mySelect">
            <option></option>
            <?php
            include '../connect.php';
            $result = $db->prepare("SELECT * FROM products RIGHT OUTER JOIN batch ON batch.product_id=products.product_id WHERE quantity >= 1 ORDER BY expirydate ASC");
            $result->execute();
            foreach ($result as $row):
            ?>
                <option value="<?= $row['product_id']; ?>" data-qty="<?= $row['quantity']; ?>" data-pr="<?= round($row['o_price'] * $row['markup']); ?>" data-exp="<?= $row['expirydate']; ?>" data-batch="<?= $row['batch_no']; ?>" data-maxdisc="<?= $row['maxdiscws']; ?>" data-maxdiscpc="<?= $row['maxdiscwsp']; ?>">
                    <?= $row['gen_name']; ?> - <?= $row['product_code']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <span id="price" contenteditable="true" name="price"></span>
        <script>
            $('#mySelect').on('change', function (event) {
                var selectedOptionIndex = event.currentTarget.options.selectedIndex;
                var price = event.currentTarget.value;
                var quantity = event.currentTarget.options[selectedOptionIndex].dataset.qty;
                var price = event.currentTarget.options[selectedOptionIndex].dataset.pr;
                var exp = event.currentTarget.options[selectedOptionIndex].dataset.exp;
                var batch = event.currentTarget.options[selectedOptionIndex].dataset.batch;
                var discountmax = event.currentTarget.options[selectedOptionIndex].dataset.maxdiscpc;
                var minprice = event.currentTarget.options[selectedOptionIndex].dataset.maxdisc;
                $('[name=qty]').val(quantity);
                $('[name=pr]').val(price);
                $('[name=exp]').val(exp);
                $('[name=batch]').val(batch);
                document.getElementById('qtyy').max = quantity;
                document.getElementById('fpr').min = price * minprice;
                document.getElementById('disc').max = discountmax;
            });
        </script>
        <input type="hidden" name="batch" placeholder="batch" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;">
        <input type="number" name="quantity" min="1" max="" placeholder="qty" id="qtyy" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" required>
        <input name="qty" min="1" placeholder="in stock" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" readonly />
        <input name="exp" placeholder="expiry" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" readonly />
        <input type="number" name="pr" min="" placeholder="price" id="fpr" step=".00001" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;">
        <input type="" name="pc" max="" placeholder="disc" id="disc" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
        <input type="hidden" name="date" value="<?= date('Y-m-d'); ?>" />
        <button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;">
            <i class="icon-plus-sign icon-large"></i> Add
        </button>
    </form>
    <table class="table table-bordered" id="resultTable" data-responsive="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Generic Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Amount</th>
                <th>Discount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = $_GET['invoice'];
            $result = $db->prepare("SELECT transaction_id, gen_name, product_code, sales_order.price AS price, discount, amount, sales_order.qty AS qty FROM sales_order JOIN products ON products.product_id=sales_order.product WHERE invoice= :invoice AND amount != ''");
            $result->bindParam(':invoice', $id);
            $result->execute();
            foreach ($result as $row):
            ?>
                <tr class="record">
                    <td hidden><?= $row['product']; ?></td>
                    <td><?= $row['product_code']; ?></td>
                    <td><?= $row['gen_name']; ?></td>
                    <td>
                        <?php
                        $price = ($row['price'] / (100 - $row['discount']));
                        $endprice = $price * (100);
                        echo $endprice;
                        ?>
                    </td>
                    <td><?= $row['qty']; ?></td>
                    <td><?= $row['amount']; ?></td>
                    <td><?= $row['discount']; ?></td>
                    <td width="90">
                        <a rel="facebox" href="editsales.php?id=<?= $row['transaction_id']; ?>"><button class="btn btn-mini btn-warning"><i class="icon icon-edit"></i> edit </button></a>
                        <a href="delete.php?id=<?= $row['transaction_id']; ?>&invoice=<?= $_GET['invoice']; ?>&dle=<?= $_GET['id']; ?>&qty=<?= $row['qty']; ?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <td>sub-total:</td>
                <?php
                $id = $_GET['invoice'];
                $totals_stm = $db->prepare("SELECT SUM(amount), SUM(profit) FROM sales_order WHERE invoice= :a");
                $totals_stm->bindParam(':a', $id);
                $totals_stm->execute();
                foreach ($totals_stm as $rowas) {
                    $total = $rowas['SUM(amount)'];
                    $profit = $rowas['SUM(profit)'];
                    echo formatMoney($total, true);
                ?>
                    <td><?= formatMoney($total, true); ?></td>
                <?php } ?>
                <th></th>
            </tr>
            <tr>
                <th colspan="5"><strong style="font-size: 12px; color: #222222;"></strong></th>
                <td colspan="1"><strong style="font-size: 12px; color: #222222;">grand-Total:</strong></td>
                <td colspan="1"><strong style="font-size: 12px; color: #222222;"><?= formatMoney($total, true); ?></strong></td>
                <th></th>
            </tr>
        </tbody>
    </table>
    <br>
    <a rel="facebox" href="checkout.php?pt=<?= $_GET['id'] ?>&invoice=<?= $_GET['invoice'] ?>&total=<?= $total ?>&totalprof=<?= $profit ?>&cashier=<?= $_SESSION['SESS_FIRST_NAME'] ?>">
        <button class="btn btn-success btn-large btn-block" accesskey="s">
            <i class="icon icon-save icon-large" accesskey="s"></i> SAVE
        </button>
    </a>
    <div class="clearfix"></div>
</div>
</div>
<?php include '../main/footer.php'; ?>
</html>
