<?php
  require_once('auth.php');
?>
<html>
<head>
<title>
view Patient
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
<body style="text-transform:capitalize;left:10%;"><div class="container-fluid" align="center">
<?php include('navfixedd.php');?>
<?php
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
 $a=$row['history'];
  $b=$row['examination'];
  $c=$row['requests'];
  $d=$row['assessment'];
$e=$row['reports']; 
$f=$row['plan'];  
}  

}
?>
<?php
      $leo = date('d/m/20y',mktime());
      $new = date('l, F d, Y', strtotime($leo));
    
        ?><h5 align="center" style="color:green;">patient record success and appears as below</h5>
<center><h4><i class="icon-plus-sign icon-large"></i> view Patient details</h4></center>
<hr>

<div id="ac">
<div><p><?php echo "$name"; ?> sex:<?php echo "$age"; ?> Age :<?php echo "$sex"; ?> patient Number: <?php echo "$opd"; ?></p></div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<hr>

  

   <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#history" aria-expanded="false" aria-controls="history">
   patient history
  </button>
 <div class="form-group"> 
    <label for="exampleTextarea"></label>
    <textarea class="accordion-body collapse" class="accordion-body collapse" value="<?php echo $a; ?>" id="history"  rows="10" style="width:70%"></textarea>

  </div>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#examination" aria-expanded="false" aria-controls="examination">
    on patient examination
  </button> 
  <div class="form-group">
    <label for="exampleTextarea"></label>
    <textarea class="accordion-body collapse"   value="<?php echo $b; ?>" id="examination" rows="10" style="width: 70%"></textarea>
  </div> 
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#requests" aria-expanded="false" aria-controls="requests">
   add lab requests
  </button>
  <div class="form-group">
    <label for="requests"></label>
    <textarea class="accordion-body collapse" value="<?php echo $c; ?>" id="requests" rows="10" style="width: 70%"></textarea>
  </div> 
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#assessment" aria-expanded="false" aria-controls="assessment">
    on patient assessment
  </button>
  <div class="form-group">
    <textarea class="accordion-body collapse" value="<?php echo $d; ?>" id="assessment" rows="10" style="width: 70%"></textarea>
  </div>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#reports" aria-expanded="false" aria-controls="reports">
   lab reports
  </button>
  <div class="form-group">   
    <textarea class="accordion-body collapse" value="<?php echo $e; ?>" id="reports" rows="10" style="width: 70%"></textarea>
  </div>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#plan" aria-expanded="false" aria-controls="plan">
   plan including medications
  </button> 
  <div class="form-group">  
    <textarea class="accordion-body collapse" value="<?php echo $f; ?>" id="plan" rows="10" style="width: 70%"></textarea>
  </div></div><div>
  <a href="clinsearch.php">
  <button type="submit" class="btn btn-success" style="left:40%;">Next Patient</button></a>

</div>
</body></html>
