<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title = 'list of expenses';
include('../main/navfixed.php');
?>

<div class="container">
    <div class="container">
        <div class="container">
            <p>&nbsp;</p>
            <i class="icon-list"></i> Customer Ledger
        </div>
        <ul class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li> /
            <li class="active">Customer Ledger</li>
        </ul>

        <script language="javascript">
            function Clickheretoprint() {
                var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
                disp_setting += "scrollbars=yes,width=700, height=400, left=100, top=25";
                var content_value = document.getElementById("content").innerHTML;

                var docprint = window.open("", "", disp_setting);
                docprint.document.open();
                docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');
                docprint.document.write(content_value);
                docprint.document.close();
                docprint.focus();
            }
        </script>

        <div style="margin-top: -19px; margin-bottom: 21px;">
            <a href="statementslist.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
            <?php
            $position = $_SESSION['SESS_LAST_NAME'];
            if ($position == 'cashier') {
                ?>
                <a href="cashier.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
            <?php } ?>
        </div>

        <div class="content" id="content">
            <?php
            $customer = $_GET['cname'];
            $results = $db->prepare("SELECT * FROM sales WHERE name= :a");
            $results->bindParam(':a', $customer);
            $results->execute();
            $row = $results->fetch();
            $name = $row['name'];
            $amount = $row['amount'];

            $stm_customer = $db->prepare("SELECT * FROM customer WHERE customer_name= :b");
            $stm_customer->bindParam(':b', $name);
            $stm_customer->execute();
            $row_customer = $stm_customer->fetch();
            echo 'Name : ' . $row_customer['customer_name'] . '<br>';
            echo 'Address : ' . $row_customer['address'] . '<br>';
            echo 'Contact : ' . $row_customer['contact'] . '<br>';
            $balcal = $row_customer['customer_name'];
            ?>
            <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
                <thead>
                    <tr>
                        <th> Date </th>
                        <th> Type </th>
                        <th> Confirm/Check No</th>
                        <th> Payment amount </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="record">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong><?php echo $row['amount2']; ?></strong></td>
                    </tr>
                    <?php
                    $customer = $_GET['cname'];
                    $result = $db->prepare("SELECT * FROM collection WHERE name= :userid ORDER BY transaction_id DESC Limit 10");
                    $result->bindParam(':userid', $customer);
                    $result->execute();
                    while ($row = $result->fetch()) {
                    ?>
                        <tr class="record">
                            <td><?php
                                $date = $row['date2'];
                                $d112 = strtotime($date);
                                $d112 = date('j/m/Y', $d112);
                                echo $d112;
                                ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['confirm']; ?></td>
                            <td><?php echo formatMoney($row['amount2'], true); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <th colspan="3" style="border-top:1px solid #999999"> Total payments: </th>
                        <th colspan="1" style="border-top:1px solid #999999">
                            <?php
                            $customer = $_GET['cname'];
                            $results = $db->prepare("SELECT sum(amount2) FROM collection WHERE name LIKE '%" . $customer . "%' ORDER BY `date2`");
                            $results->execute();
                            $row = $results->fetch();
                            $payments = $row['sum(amount2)'];
                            echo formatMoney($payments, true);
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3" style="border-top:1px solid #999999"> balance: </th>
                        <th colspan="1" style="border-top:1px solid #999999">
                            <?php
                            $customer = $_GET['cname'];
                            $c = 'credit';
                            $results = $db->prepare("SELECT sum(amount) FROM sales WHERE type LIKE '%" . $c . "%' AND name LIKE '%" . $customer . "%'");
                            $results->execute();
                            $row = $results->fetch();
                            $salec = $row['sum(amount)'];
                            echo formatMoney($salec - $payments, true);
                            ?>
                        </th>
                    </tr>
                </tbody>
            </table>
            <div>
                <a rel="facebox" href="addledger.php?invoice=<?php echo $_GET['cname']; ?>&amount=<?php echo $row['amount2']; ?>" style="margin-top: 10px;"><button class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add cash Payment</button></a>
                <a rel="facebox" href="mpesa1.php?invoice=<?php echo $_GET['cname']; ?>&amount=<?php echo $row['amount2']; ?>" style="margin-top: 10px;"><button class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add Mpesa Payment</button></a>
                <a rel="facebox" href="bank1.php?invoice=<?php echo $_GET['cname']; ?>&amount=<?php echo $row['amount2']; ?>" style="margin-top: 10px;"><button class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add bank Payment</button></a><br><br>
            </div>
        </div>
        <button style="width: 123px; height:35px; margin-top:-2px; float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"><i class="icon icon-print icon-large"></i> Print</a></button>
        <div class="clearfix"></div>
    </div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
