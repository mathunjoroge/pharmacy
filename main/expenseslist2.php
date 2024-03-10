<?php
require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html>
<head>
<title>
Pharmacy
</title>
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
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script><style type="text/css">
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

<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='INV-'.createRandomPassword();
?>
</head>
<body>
<?php include('navfixed.php');?>
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


</body>
<?php include('footer.php'); ?>
</html>
