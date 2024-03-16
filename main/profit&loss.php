<?php
require_once('auth.php');
include '../connect.php';
$date1 = date('Y-m-d', strtotime($_GET['d1']));
$date2 = date('Y-m-d', strtotime($_GET['d2']));
$d1 = date('Y-m-d', strtotime($_GET['d1']));
$d2 = date('Y-m-d', strtotime($_GET['d2']));

function formatMoney($number, $fractional = false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Sales Report</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="tcal.css" />
    <script type="text/javascript" src="tcal.js"></script>
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
</head>

<body>
    <?php include('navfixed.php'); ?>
    <div class="container">
        <div class="contentheader">
            <i class="icon-bar-chart"></i> Sales Report
        </div>
        <ul class="breadcrumb">
            <li>
                <p>&nbsp;</p>
            </li>
            <li class="active">&nbsp;</li>
        </ul>

        <div style="margin-top: -19px; margin-bottom: 21px;">
            <a href="index.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-home icon-large"></i> Back</button></a>
        </div>

        <form action="cash.php" method="get">
            <center><strong>From : <input type="text" name="d1" class="tcal" autocomplete="off" /> To: <input type="text" name="d2" class="tcal" autocomplete="off" />
                        <button class="btn btn-success" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> submit</button>
                    </strong></center>
        </form>

        <div class="container" id="content">
            <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
                <p>trading, profit and loss account</p>
                <p>for the period</p>
                <p><?php echo date('d-m-Y', strtotime($_GET['d1'])); ?>&nbsp;to&nbsp;<?php echo date('d-m-Y', strtotime($_GET['d2'])); ?></p>
                <?php include "report.php"; ?>
            </div>
        </div>

        <button style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</a></button>

        <div class="clearfix"></div>
    </div>

    <script src="js/jquery.js"></script>
    <?php include('footer.php');?>
</body>

</html>
