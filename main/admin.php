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
</script>

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
<style type="text/css">
   
.card {
  width: 400px!important; /* Adjust width as needed */
  margin: 10px!important;
  text-align: center;
}
</style>
<body>
<?php include('navfixed.php');?>
<div class="container">
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
