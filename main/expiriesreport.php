<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title = 'expiries report';
include('../main/navfixed.php');

$start_date = date('Y-m-d', strtotime($_GET['d1']));
$end_date = date('Y-m-d', strtotime($_GET['d2']));
?>

<div class="container">
    <script language="javascript">
        function printContent() {
            var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
            disp_setting += "scrollbars=yes,width=700,height=400,left=100,top=25";
            var content_value = document.getElementById("content").innerHTML;

            var printWindow = window.open("", "", disp_setting);
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write('<h4 align="center">Winsor Pharmacy</h4><body onLoad="self.print()" style="width: 700px; font-size: 11px; font-family: Arial; font-weight: normal;">');
            printWindow.document.write(content_value);
            printWindow.document.close();
            printWindow.focus();
        }
    </script>

    <i class="icon-bar-chart"></i> Expiries Report
</div>

<ul class="breadcrumb">
    <li><p>&nbsp;</p></li>
    <li class="active">&nbsp;</li>
</ul>

<div class="container">
    <a href="admin.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>

<form action="expiriesreport.php" method="get">
    <center>
        <strong>From : <input type="text" autocomplete="off" name="d1" class="tcal" value="" /> To: <input type="text" autocomplete="off" name="d2" class="tcal" value="" />
            <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
        </strong>
    </center>
</form>

<div class="container" id="content">
    <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
        Expiries Report from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
    </div>
    <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
        <thead>
            <tr>
                <th width="">Date</th>
                <th width="">Ref Number</th>
                <th width="">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
      
            $result = $db->prepare("SELECT *  FROM expiriestt WHERE date BETWEEN :start_date AND :end_date ORDER by transaction_id DESC ");
            $result->bindParam(':start_date', $start_date);
            $result->bindParam(':end_date', $end_date);
            $result->execute();
            while ($row = $result->fetch()) {
            ?>
                <tr class="record">
                    <td><?php
                        $date = $row['date'];
                        $formatted_date = strtotime($date);
                        $formatted_date = date('j/m/Y', $formatted_date);
                        echo $formatted_date;
                        ?></td>
                    <td><a href="exp.php?invoice=<?php echo $row['invoice_number']; ?>"><?php echo $row['invoice_number']; ?></a></td>
                    <td><?php
                        $amount = $row['amount'];
                        echo formatMoney($amount, true);
                        ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <thead>
            <tr>
                <th colspan="2" style="border-top:1px solid #999999">Total:</th>
                <th colspan="1" style="border-top:1px solid #999999">
                    <?php
                    $results = $db->prepare("SELECT sum(amount) FROM expiriestt WHERE date BETWEEN :start_date AND :end_date");
                    $results->bindParam(':start_date', $start_date);
                    $results->bindParam(':end_date', $end_date);
                    $results->execute();
                    while ($rows = $results->fetch()) {
                        $total_amount = $rows['sum(amount)'];
                        echo formatMoney($total_amount, true);
                    }
                    ?>
                </th>
            </tr>
        </thead>
    </table>
</div>
<div class="container">
<button style="float:right;" class="btn btn-success btn-large"><a href="javascript:printContent()">Print</a></button>
<button style="float:left;" class="btn btn-success btn-large"><a href="expirieslist.php?start_date=0&end_date=0">Expiries List</a></button>

</div>
</div>
</div>
</div>
<?php 
include('footer.php');?>
</html>
