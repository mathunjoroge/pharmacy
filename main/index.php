<?php $title="home";
 include('navfixed.php'); ?>
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
    ?><?php
    if ($position == 'pharmacist') {
    ?>
    <style type="text/css">
   
.card {
  width: 400px!important; /* Adjust width as needed */
  margin: 10px!important;
  text-align: center;
}
</style>
<?php } ?>
        <div class="card">
            <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>" style="color: green;">
                <i class="icon-user-md icon-2x"></i></a><br>
                Sales
            
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
        
    ?>
    <style type="text/css">
   
.card {
  width: 400px!important; /* Adjust width as needed */
  margin: 10px!important;
  text-align: center;
}
</style>
    <?php
  
  $new = date('m/d/Y');
  ?>
<div class="card">
            <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>" style="color: green;">
                <i class="icon-user-md icon-2x"></i><br>
                Sales
            </a>
        </div>
<div class="card">
<a href="cashier.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br>receipts</a> 
</div>
<div class="card">
<a href="cash.php?d1=<?php echo $new; ?>&d2=<?php echo $new; ?>"><i class="icon-list-alt icon-2x"></i><br>today's cash</a>
</div>
<div class="card">      
<a href="expenses2.php"><i class="icon-group icon-2x"></i><br>record expense </a>   
</div>
  <?php } ?>
</div>

    <?php include('footer.php'); ?>
    </div>
</body>

</html>
