<?php
	require_once('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>
Pharmacy
</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
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
<body>
<?php include('navfixed.php');?>

 <div class="container">
<a  href="admin.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:green;"><center>statements</center></font>
<div class="container" id="cards">
<div class="card">
<a href="purchaseslist.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br> view Purchase</a>
</div>
<div class="card">
<a href="select_customer.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br> customer Payment and statement</a>
</div>
<div class="card">
<a href="selectsupplier.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br> supplier Payment</a>
</div>
<div class="card">
<a href="suppstatements.php?term=&nbsp;"><font ><i class="icon-bar-chart icon-2x"></i></font><br>supplier Statements</a>
</div>
<div class="card">
<a href="salesreport.php?d1=<?php echo date('m/d/Y'); ?>&d2=<?php echo date('m/d/Y'); ?>"><i class="icon-bar-chart icon-2x"></i><br> Sales Report</a>
</div>
<div class="card">
<a href="consumptionlist.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> Consumption Report</a>
</div>
<div class="card">
<a href="profit&loss.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> profit and loss</a>
</div>
<div class="card">
<a href="customerstatement.php?d1=0&d2=0&term=&nbsp;"><i class="icon-bar-chart icon-2x"></i><br> customer statements</a>
</div>
<div class="card">
<a href="selectsupplier2.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br> supplier balance</a>
</div>

</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
