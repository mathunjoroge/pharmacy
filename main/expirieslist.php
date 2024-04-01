<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title = 'Expiries Report';
include('../main/navfixed.php');

// Check if d1 and d2 are set
$start_date = isset($_GET['d1']) ? date('Y-m-d', strtotime($_GET['d1'])) : date('Y-m-d');
$end_date = isset($_GET['d2']) ? date('Y-m-d', strtotime($_GET['d2'])) : date('Y-m-d');
?>

<div class="container">
    <div class="contentheader">
        <i class="icon-bar-chart"></i> Record of Expired Drugs
    </div>
    <ul class="breadcrumb">
        <li><p>&nbsp;</p></li>
        <li class="active">&nbsp;</li>
    </ul>

    <div style="margin-top: -19px; margin-bottom: 21px;">
        <a href="admin.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
    </div>

    <form action="expirieslist.php" method="get">
        <center><strong>From : <input type="text" autocomplete="off" name="d1" class="tcal" value="<?php echo $start_date; ?>" /> To: <input type="text" autocomplete="off" name="d2" class="tcal" value="<?php echo $end_date; ?>" />
                <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
            </strong></center>
    </form>

    <div class="content" id="content">
        <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
            Expiries Report from&nbsp;<?php echo $start_date; ?>&nbsp;to&nbsp;<?php echo $end_date; ?>
        </div>
        <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
            <thead>
                <tr>
                    <th width="">Date</th>
                    <th width="">Product</th>
                    <th width="">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $result = $db->prepare("SELECT transaction_id, gen_name, product_code, expiries.price AS price, expiries.date as date,discount, amount, expiries.qty AS qty FROM expiries JOIN products ON products.product_id=expiries.product WHERE expiries.date BETWEEN :start_date AND :end_date ORDER by transaction_id DESC ");
                    $result->bindParam(':start_date', $start_date);
                    $result->bindParam(':end_date', $end_date);
                    $result->execute();

                    while ($row = $result->fetch()) {
                ?>
                        <tr class="record">
                            <td><?php $date = strtotime($row['date']); echo date('j/m/Y', $date); ?></td>
                            <td><?php echo $row['product_code'] . ' - ' . $row['gen_name']; ?></td>
                            <td><?php echo formatMoney($row['amount'], true); ?></td>
                        </tr>
                    <?php
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </tbody>
            <thead>
                <tr>
                    <th colspan="2" style="border-top:1px solid #999999">Total:</th>
                    <th colspan="1" style="border-top:1px solid #999999">
                        <?php
                        try {
                            $total_result = $db->prepare("SELECT sum(amount) FROM expiries WHERE date BETWEEN :start_date AND :end_date");
                            $total_result->bindParam(':start_date', $start_date);
                            $total_result->bindParam(':end_date', $end_date);
                            $total_result->execute();
                            $total_amount = $total_result->fetchColumn();
                            echo formatMoney($total_amount, true);
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <button style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()">Print</button></a>
    <div class="clearfix"></div>
</div>
</div>
</div>

<?php include('footer.php'); ?>
</html>
