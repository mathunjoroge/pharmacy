<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title = 'trading profit and loss account';
include('../main/navfixed.php');
?>
<?php 
$date1=date('Y-m-d',strtotime($_GET['d1']));
$date2=date('Y-m-d',strtotime($_GET['d2']));
$d1=date('Y-m-d',strtotime($_GET['d1']));
$d2=date('Y-m-d',strtotime($_GET['d2'])); ?>
<?php
if(isset($_GET['d1']) && isset($_GET['d2'])) {
    $d1 = date('Y-m-d', strtotime($_GET['d1']));
    $d2 = date('Y-m-d', strtotime($_GET['d2']));

    // Now you can use $d1 and $d2 safely
} else {
    echo "Error: One or both variables are not set.";
}
?>
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
