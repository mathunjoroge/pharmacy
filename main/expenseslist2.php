<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='salaries and expenses';
include('../main/navfixed.php');

?>
<style type="text/css">
    #card {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.card {
  width: 400px!important; /* Adjust width as needed */
  margin: 10px!important;
  text-align: center;
}
</style>


	       <div class="container">

        	<div style="margin-top: 3%; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
	
			
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:green;"><center>salaries and expenses</center></font>
			<div class="container" id="card">
    <div class="card">
        <a href="employees.php">
            <i class="icon-bar-chart icon-2x"></i><br>Employees
        </a>
    </div>
    <div class="card">
        <a href="salaries.php">
            <i class="icon-bar-chart icon-2x"></i><br>Pay Salary
        </a>
    </div>
    <div class="card">
        <a href="expenses.php">
            <i class="icon-shopping-cart icon-2x"></i><br>Expenses
        </a>
    </div>
    <div class="card">
        <a href="explist.php">
            <i class="icon-shopping-cart icon-2x"></i><br>Expenses List
        </a>
    </div>
</div>


<?php include('footer.php'); ?>
</body>
</html>
