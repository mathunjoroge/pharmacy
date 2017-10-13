<?php
  require_once('auth.php');
?>
<html>
<head>
<title>
Register Patient
</title>
<?php
  require_once('auth.php');
?>
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
<body style="text-transform:capitalize;left:10%;"><div style="left:10%;">
<?php include('navfixedd.php');?><?php
$connect = mysqli_connect("localhost","root","","sales");
?><div class="container-fluid" align="center">
<?php
if(isset($_GET['id'])){ // checks if id was posted

$id = (int)$_GET['id'];

$query_fetch = mysqli_query($connect,"SELECT * FROM patients WHERE ID = $id");    // id that was posted by search.php

 while($row = mysqli_fetch_array($query_fetch)){ 
  $name=$row['name'];
  $age=$row['age'];
  $sex=$row['sex'];
$opd=$row['number']; 
$screendt=$row['sdate'];  
$strategy=$row['tstrategy']; 
$visittype=$row['vtype'];
$department=$row['dept'];  
$testbefore=$row['tbefore'];  
$restdate=$row['tdate']; 
$testresult=$row['tresults'];
$eligible=$row['etesting'];  
$elireason=$row['ereasons'];  
$comments=$row['comments'];
  
}  

}
?>

  <h5 align="center" style="color:green;">patient record success and appears as below</h5>
<center><h4><i class="icon-plus-sign icon-large"></i> view Patient details</h4></center>
<hr>
<div id="ac" style="left:10%;">

<span>full Name : </span><input value="<?php echo "$name"; ?>" type="text" style="width:265px; height:30px;" name="name" Readonly/>
&nbsp;&nbsp;&nbsp;<span>department: </span><input value="<?php echo "$department"; ?>"  style="width:265px; height:30px;" name="dept" Readonly/><br>
<span>Age : </span><input value="<?php echo "$sex"; ?>"type="text" style="width:265px; height:30px;" name="age" Readonly/>
&nbsp;&nbsp;&nbsp;<span>tested for HIV before: </span><input value="<?php echo "$testbefore"; ?>"   style="width:265px; height:30px;" name="hivb" Readonly/><br>
<span>sex: </span><input value="<?php echo "$age"; ?>"  style="width:265px; height:30px;" name="sex" Readonly/>
&nbsp;&nbsp;&nbsp;<span>testing date: </span><input value="<?php echo "$restdate"; ?>" type="date" style="width:265px; height:30px;" name="hivd" ><br>
<span>patient Number: </span><input value="<?php echo "$opd"; ?>" type="text" style="width:265px; height:30px;" name="pn" Readonly/>
&nbsp;&nbsp;&nbsp;<span>test results: </span><input value="<?php echo "$testresult"; ?>"  style="width:265px; height:30px;" name="hrst"></span><br>
<span>screening date: </span><input value="<?php echo "$screendt"; ?>" style="width:265px; height:30px;" name="sdate" value="<?php echo "$leo"; ?>">
&nbsp;&nbsp;&nbsp;<span>Eligible for testing: </span><input value="<?php echo "$eligible"; ?>"  style="width:265px; height:30px;" name="etesting" ><br>
<span>testing strategy : </span><input value="<?php echo "$strategy"; ?>"  style="width:265px; height:30px;" name="strategy" Readonly/>
&nbsp;&nbsp;&nbsp;<span>Eligibility reasons: </span><input value="<?php echo "$elireason"; ?>"type="text" style="width:265px; height:30px;" name="ereasons" Readonly/></span><br>
<span>Visit type: </span><input  value="<?php echo "$visittype"; ?>" style="width:265px; height:30px;" name="vtype" Readonly/>
&nbsp;&nbsp;&nbsp;<span>comments: </span><input value="<?php echo "$comments"; ?>"type="text" style="width:265px; height:30px;" name="comments" Readonly/><br>
   </div><div>
  <a href="addpatient.php">
  <button type="submit" class="btn btn-success" style="left:40%;">Next Patient</button></a>

</div></body>
   </html>