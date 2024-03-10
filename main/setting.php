<?php
	require_once('auth.php');
	include '../connect.php';
?><!DOCTYPE html>
<html>
<head>
<title>
settings
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
<body>
<?php include('navfixed.php');?>
	

        <div class="container">

	
			
			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:green;"><center><?php
$result = $db->prepare("SELECT pharmacy_name  FROM pharmacy_details");
$result->execute();
for ($i = 0; ($row = $result->fetch()); $i++) {
     ?>

<div class="container"><?php echo $row["pharmacy_name"]; ?> </div>

<?php
}
?>
</center></font>
<a  href="index.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i>Back</button></a>

<div class="container" id="cards">
<div class="card">
<a href="retail.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br>retail max disc</a> 
</div>
<div class="card">
<a href="wholesale.php"><i class="icon-money icon-2x"></i><br>wholesale max disc</a>   
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
