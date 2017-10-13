<?php
	require_once('auth.php');
?>
<html>
<head>
<title>
Register Patient
</title>
<link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
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
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

</head>
<?php
			$leo = date('d/m/20y',mktime());
			$new = date('l, F d, Y', strtotime($leo));
		
				?>
<body style="text-transform:capitalize;left:10%;"><div class="container-fluid" align="center">
<?php include('navfixedd.php');
include('../connect.php');?>

<center><h4><i class="icon-plus-sign icon-large"></i> Patient lab tests</h4></center>
<hr>
<div id="ac" style="left:10%;">
  <?php include('navfixedd.php');?><?php
$connect = mysqli_connect("localhost","root","","sales");
?>
<?php
if(isset($_GET['id'])){ // checks if id was posted

$id = (int)$_GET['id'];

$query_fetch = mysqli_query($connect,"SELECT * FROM clinician WHERE ID = $id");    // id that was posted by search.php

 while($row = mysqli_fetch_array($query_fetch)){ 
  $id=$row['id'];
  $name=$row['name'];
  $age=$row['age'];
  $sex=$row['sex'];
$opd=$row['number']; 
$lab=$row['requests'];

  
}  

}
?><?php
      $leo = date('d/m/20y',mktime());
      $new = date('l, F d, Y', strtotime($leo));
    
        ?>
<div><?php echo $name; ?> <?php echo $age; ?> Age: <?php echo $sex; ?>, number: <?php echo $opd; ?></div>
<h5>requested tests</h5>
<div class="form-group">
    <label for="requests"></label>
    <textarea class="form-control"  value="<?php echo "$lab;" ?>" rows="6"style="max-width: 70%" readonly/></textarea>
  </div>
<form action="labreg.php" method="post">

<hr>
<div id="ac">
 </span><input type="hidden" style="width:265px; height:30px;" name="date" value="<?php echo $leo; ?>">
    </span><input type="hidden" style="width:265px; height:30px;" name="name" value="<?php echo $name; ?>">
</span><input type="hidden" style="width:265px; height:30px;" name="age" value="<?php echo $sex; ?>">
</span><input type="hidden" style="width:265px; height:30px;" name="sex" value="<?php echo $age; ?>">
</span><input type="hidden" style="width:265px; height:30px;" name="num" value="<?php echo $opd; ?>">
<span>malaria parasites </span><input type="text" style="width:265px; height:30px;"  name="mal"  /><br>
<span>widal </span><input type="text" style="width:265px; height:30px;"  name="wid"> <br>
<span>SAT</span><input type="text" style="width:265px; height:30px;" name="sat" ><br>
<span>pregnanacy </span><input type  style="width:265px; height:30px;" name="pg"  /><br>
<span>random blood sugar : </span><input type  ="text" style="width:265px; height:30px;" name="rbs"  /><br>
<span>fasting blood sugar : </span><input type="text" style="width:265px; height:30px;" name="fbs" ><br>
<span>postprandial blood sugar: </span><input type="text" style="width:265px; height:30px;"  name="pbs" ><br>

<span>other test </span><textarea style="width:265px; height:50px;" name="oc" ></textarea><br>

<div style="float:center; margin-right:-8%;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</form>
</div>
</body></html>
