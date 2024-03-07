<?php
	require_once('auth.php');
	include('../connect.php');
include('navfixed.php');

?>
<html>
<head>
<title>select supplier </title>


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
	<div class="container">
<h4>suppplier Ledger</h4>
<hr><a  href="admin.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i><b> Back</b></button></a>
<p>&nbsp;</p>


<hr>
<form  action="suplier_ledger.php?" method="get">select supplier:<span>
			<select name="cname" >
				<option></option>
			<?php	
	$result = $db->prepare("SELECT * FROM supliers");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['suplier_name'];?>"><?php echo $row['suplier_name']; ?>  </option>
	<?php
				}
			?>
</select>&nbsp;<button class="btn btn-success"> Submit</button></span><br>
     
      

</div>
</form>
</body>
</html>