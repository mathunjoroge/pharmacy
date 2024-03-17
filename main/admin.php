<?php 
$title="admin tools";
include('navfixed.php');?>
<div class="container"><style type="text/css">   
.card {
  width: 400px!important; /* Adjust width as needed */
  margin: 10px!important;
  text-align: center;
}
</style>

<a  href="index.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:green;"><center>admin tools</center></font>
			<!-- add content here -->

<div id="cards" class="container">
<div class="card">
<a href="expenseslist2.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br> expenses</a> 
</div>
<div class="card">
<a href="statementslist.php"><font ><i class="icon-bar-chart icon-2x"></i></font><br> Statements and reports</a>
</div>
<div class="card">
<a href="user.php"><font ><i class="icon-group icon-2x"></i></font><br> users</a>
</div>
<div class="card">
<a href="../expiries/sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-bar-chart icon-2x"></i><br> expiries</a>
</div>
<div class="card">
<a href="expiriesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> expiries report</a>
</div>
<div class="card">
<a href="sales_inventory.php"><i class="icon-bar-chart icon-2x"></i><br> deletesales</a>
</div>
</div>
<?php include('footer.php'); ?>
</div>
	<!-- end content here -->

</body>
</html>
