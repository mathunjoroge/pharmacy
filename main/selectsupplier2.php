<?php
	require_once('auth.php');
 include('navfixed.php');
 include('../connect.php');

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

</head>
</head>
<div class="container">
<h4>suppplier Ledger</h4>
<hr><a  href="admin.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i><b> Back</b></button></a>
<p>&nbsp;</p>

<hr>


<form  action="suplier_ledger2.php?" method="get">select supplier:<span>
			<select name="cname" ><option></option>
			<?php
	$term=$row['suplier_name'];
	$result = $db->prepare("SELECT * FROM supliers");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['suplier_id'];?>"><?php echo $row['suplier_name']; ?>  </option>
	<?php
				}
			?>
</select>&nbsp;<button class="btn btn-success"> Submit</button></span><br>
</div>
</form>
</body>
</html>