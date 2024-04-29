<?php 
$title="admin tools";
include('../connect.php');
include('navfixed.php');?>
<div class="container"><style type="text/css">   
.card {
  width: 400px!important; /* Adjust width as needed */
  margin: 10px!important;
  text-align: center;
}
</style>
<div style="display: flex; flex-direction: column; align-items: center;">
  <div style="display: flex; justify-content: space-around;">
    <a href="index.php" style="text-decoration: none;">
      <button class="btn btn-success btn-large">
        <i class="icon icon-circle-arrow-left icon-large"></i> Back
      </button>
    </a>
    	<?php 
// Select pharmacy details
$result = $db->prepare("SELECT pharmacy_name FROM pharmacy_details");
$result->execute();

// Check if there are any pharmacy details
if ($result->rowCount() == 0) {
?>
    &nbsp;
    <a rel="facebox" href="addpharmacy.php">
        <button class="btn btn-primary btn-large">
        <i class="icon icon-plus icon-large"></i> Add Pharmacy Details</button>
    </a>
<?php
} else {
    $name = ""; // Initialize $name variable
    // Fetch pharmacy name
    for ($i = 0; $row = $result->fetch(); $i++) {
        $name = $row['pharmacy_name'];
    }
?>
    <a rel="facebox" href="editpharmacy.php" style="text-decoration: none;">
        <button class="btn btn-primary btn-large" style="margin-left: 10px;">
            <i class="icon icon-edit icon-large"></i> Edit Pharmacy Details
        </button>
    </a>
<?php 
} 
?>

  </div>
  <div>
    <font style="font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:green;"><center>admin tools</center></font>
  </div>
</div>
<div id="cards" class="container">
  <div class="card">
    <a href="expenseslist2.php">
      <font><i class="icon-shopping-cart icon-2x"></i></font><br> expenses
    </a> 
  </div>
  <div class="card">
    <a href="statementslist.php">
      <font><i class="icon-bar-chart icon-2x"></i></font><br> Statements and reports
    </a>
  </div>
  <div class="card">
    <a href="user.php">
      <font><i class="icon-group icon-2x"></i></font><br> users
    </a>
  </div>
  <div class="card">
    <a href="../expiries/expiries.php?id=cash&invoice=<?php echo $finalcode ?>">
      <i class="icon-bar-chart icon-2x"></i><br> expiries
    </a>
  </div>
  <div class="card">
    <a href="expiriesreport.php?d1=0&d2=0">
      <i class="icon-bar-chart icon-2x"></i><br> expiries report
    </a>
  </div>
  <div class="card">
    <a href="sales_inventory.php">
      <i class="icon-bar-chart icon-2x"></i><br> deletesales
    </a>
  </div>
</div>


</body>
</html>
