<?php
require_once('auth.php');
include('../connect.php');

function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $pass = '';
    for ($i = 0; $i <= 7; $i++) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass .= $tmp;
    }
    return $pass;
}

$finalcode = 'INV-' . createRandomPassword();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Pharmacy</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
   
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
                loadingImage: 'src/loading.gif',
                closeImage: 'src/closelabel.png'
            })
        })
    </script>
</head>

<body>
    <?php include('navfixed.php'); ?>

    <div class="container">
       
        <font style="font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:green;">
            <center>
                <?php
                $result = $db->prepare("SELECT *  FROM pharmacy_details");
                $result->execute();
                for ($i = 0; $row = $result->fetch(); $i++) {
                    echo $row['pharmacy_name'];
                }
                ?>
            </center>
        </font>
      
<div id="cards" class="container">
    <?php
    $position = $_SESSION['SESS_LAST_NAME'];
    if ($position == 'pharmacist' || $position == 'admin') {
    ?>
        <div class="card">
            <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>" style="color: green;">
                <i class="icon-user-md icon-2x"></i><br>
                Sales
            </a>
        </div>
        <div class="card">
            <a href="products.php">
                <i class="icon-list-alt icon-2x"></i><br>
                Drugs
            </a>
        </div>

        <div class="card">
            <a href="customer.php">
                <i class="icon-group icon-2x"></i><br>
                Customers
            </a>
        </div>

        <div class="card">
            <a href="supplier.php">
                <i class="icon-group icon-2x"></i><br>
                Suppliers
            </a>
        </div>

        <div class="card">
            <a href="../purchases/sales.php?id=cash&invoice=<?php echo $finalcode ?>">
                <i class="icon-shopping-cart icon-2x"></i><br>
                Record Purchase
            </a>
        </div>

        <div class="card">
            <a href="#">
                <i class="icon-shopping-cart icon-2x"></i><br>
                Wholesale
            </a>
        </div>
    <?php
    }
    if ($position == 'admin') {
    ?>
        <div class="card">
            <a href="setting.php">
                <i class="icon-cogs icon-2x"></i><br>
                Settings
            </a>
        </div>

        <div class="card">
            <a href="inventory.php">
                <i class="icon-desktop icon-2x"></i><br>
                Inventory Adjustments
            </a>
        </div>

        <div class="card">
            <a href="admin.php">
                <i class="icon-user icon-2x"></i><br>
                Admin
            </a>
        </div>
    <?php
    }
    if ($position == 'cashier') {
        include("cashierindex.php");
    }
    ?>
</div>
</div>
    <?php include('footer.php'); ?>
</body>

</html>
