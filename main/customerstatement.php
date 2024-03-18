<?php
// Error reporting
ini_set("display_errors", "On");

// Include necessary files
require_once('../main/auth.php');
include('../connect.php');

// Initialize variables
$title = 'trading profit and loss account';
include('../main/navfixed.php');

// Check if d1 and d2 are set
if(isset($_GET['d1']) && isset($_GET['d2'])) {
    // Sanitize and assign values
    $d1 = date('Y-m-d', strtotime($_GET['d1']));
    $d2 = date('Y-m-d', strtotime($_GET['d2']));
} else {
    // Handle error
    echo "Error: One or both variables are not set.";
    // You might want to exit or redirect here
}

// Function to format money
function formatMoney($number, $fractional=false) {
    // Function implementation
}

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Add your head content here -->
</head>
<body>
    <div class="container">
        <div class="container">
            <div class="container">
                <p>&nbsp;</p>
                <script language="javascript">
                    function Clickheretoprint() {
                        var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
                        disp_setting += "scrollbars=yes,width=700, height=400, top=25";
                        var content_vlue = document.getElementById("content").innerHTML;

                        var docprint = window.open("", "", disp_setting);
                        docprint.document.open();
                        docprint.document.write('</head><h4 align="center">Winsor Pharmacy</h4><body align="center" onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');
                        docprint.document.write(content_vlue);
                        docprint.document.close();
                        docprint.focus();
                    }
                </script>

                <i class="icon-bar-chart"></i> sales and payments
            </div>
            <div class="container">
                <ul class="breadcrumb">
                    <a href="statementslist.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
                    <li class="active">sales and payments Report</li>
                </ul>
                <form class="ui-widget" action="customerstatement.php" method="get">
                    <center>
                        <strong><select name="term" placeholder="select customer"><option></option>
                            <?php
                            $term=$row['customer_name'];
                            $result = $db->prepare("SELECT * FROM customer");

                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <option value="<?php echo $row['customer_name'];?>"><?php echo $row['customer_name']; ?>  </option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="text" placeholder="FROM DATE" name="d1" class="tcal" value="" />
                        <input type="text" placeholder="TO DATE" name="d2" class="tcal" value="" />
                        <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;" type="submit"><i class="icon icon-search icon-large"></i> Submit</button>
                        <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
                            <div div class="container">
                                <div class="content" id ="content">
                                    Purchases and payment summary from&nbsp;
                                    <?php
                                    $date = $_GET['d1'];
                                    $d11 = strtotime($date);
                                    $d11 = date('j/m/Y', $d11);
                                    echo $d11;
                                    ?>&nbsp;to&nbsp;
                                    <?php
                                    $date = $_GET['d2'];
                                    $d112 = strtotime($date);
                                    $d112 = date('j/m/Y', $d112);
                                    echo $d112;
                                    ?>
                                </div>
                            </div>
                        </div>
                </form>

                <p> purchases made by <?php echo $_GET['term'] ?></p>

                <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
                    <thead>
                    <tr>

                        <th width="15%"> Date </th>

                        <th width="20%"> Invoice Number </th>
                        <th width="20%"> type </th>
                        <th width="20%"> served by </th>


                        <th width="15%"> Amount </th>


                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    include('../connect.php');

                    $c='credit';
                    $d='paid';
                    $d1=$_GET['d1'];
                    $d2=$_GET['d2'];
                    $result = $db->prepare("SELECT * FROM sales WHERE date BETWEEN :a AND :b  AND name LIKE '%".$term."%'  ORDER BY `date` ASC");
                    $d='paid';
                    $result->bindParam(':a', $d1);
                    $result->bindParam(':b', $d2);

                    $result->execute();
                    for($i=0; $row = $result->fetch(); $i++){
                        ?>
                        <tr class="record">
                            <td><?php  $date = $row['date'];
                                $d112 = strtotime ( $date ) ;
                                $d112 = date ( 'j/m/Y' , $d112 );
                                echo $d112; ?></td>
                            <td><?php echo $row['invoice_number']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['cashier']; ?></td>


                            <td><?php
                                $dsdsd=$row['amount'];
                                echo formatMoney($dsdsd, true);
                                ?></td>


                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                    <thead>
                    <tr>


                        <?php

                        $c='credit';
                        $results = $db->prepare("SELECT sum(amount) FROM sales WHERE type=:c  AND name LIKE '%".$term."%' ORDER BY `date` ASC");

                        $results->bindParam(':c', $c);
                        $results->execute();
                        for($i=0; $rows = $results->fetch(); $i++){
                            $dsdsd=$rows['sum(amount)'];

                        }
                        ?>
                        </th>
                    </tr>
                    </thead>
                </table>




                <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">

                    <hr>
                    </div><p>Payments: </p>


                    <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">


                    </div>
                    <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
                        <thead>
                        <tr><th width="15%"> Date </th>

                            <th width="20%"> remarks </th>
                            <th width="15%"> Amount </th>



                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        $c='credit';
                        $d='paid';
                        $c='credit';
                        $date1 = 'date2';
                        $inv = 'remarks';
                        $dsdsdd = 'amount2';
                        ?>


                        <?php
                        $d1=$_GET['d1'];
                        $d2=$_GET['d2'];

                        $result = $db->prepare("SELECT * FROM collection WHERE date2 BETWEEN :a AND :b AND name LIKE '%".$term."%'  ORDER BY `date2` ASC");
                        $result->bindParam(':a', $d1);
                        $result->bindParam(':b', $d2);
                        $result->execute();
                        $date1 = $row['date2'];
                        $inv = $row['name'];
                        $dsdsdd = $row['amount2'];

                        for($i=0; $row = $result->fetch(); $i++){
                            $date1 = $row['date2'];


                            ?>
                            <tr class="record">
                                <td><?php  $date = $row['date2'];
                                    $d112 = strtotime ( $date ) ;
                                    $d112 = date ( 'j/m/Y' , $d112 );
                                    echo $d112; ?></td>
                                <td><?php echo $row['remarks']; ?></td>


                                <td><?php
                                    $dsdsdd=$row['amount2'];
                                    echo formatMoney($dsdsdd, true);
                                    ?></td>




                                <?php
                        }
                        ?>

                        </tbody>
                        <thead>
                        <tr>
                            <th colspan="2" style="border-top:1px solid #999999"> Total credit purchases: </th>
                            <th colspan="1" style="border-top:1px solid #999999">


                                <?php


                                $results = $db->prepare("SELECT sum(amount2) FROM collection WHERE name LIKE '%".$term."%' ORDER BY `date2`");

                                $results->execute();
                                for($i=0; $rows = $results->fetch(); $i++){
                                    $dsdsdd=$rows['sum(amount2)'];
                                    echo formatMoney($dsdsd, true);
                                }
                                ?>
                            </th>

                        </tr>


                        <th colspan="2" style="border-top:1px solid #999999"> Total payments: </th>
                        <th colspan="1" style="border-top:1px solid #999999"><?php echo formatMoney($dsdsdd, true);?></th>
                        </thead>

                        <th colspan="2" style="border-top:1px solid #999999"> Total Balance: </th>
                        <th colspan="1" style="border-top:1px solid #999999"><?php $dsdsd-$dsdsdd; echo  formatMoney($dsdsd-$dsdsdd, true);?></th>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <button style="width: 123px; height:35px; margin-top:-2px; float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"><i class="icon icon-print icon-large"></i> Print</a></button>
    <div class="clearfix"></div>
</body>
<?php include('footer.php');?>

</html>
