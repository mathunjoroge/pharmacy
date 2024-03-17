<?php
ini_set("display_errors", "On");
require_once('auth.php');
include('../connect.php');
$title='inventory adjusments';
include('../main/navfixed.php');

?>


        <div class="container">

			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:green;"><center>inventory adjustments</center></font>
<a  href="index.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i>Back</button></a>
<div id="mainmain">
<?php
 
  $new = date('m/d/Y');
  ?>

<div id="cards" class="container">
	<div class="card">
<a href="../stocktake/stock_take.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br>stock take</a> 
</div>
<div class="card">
<a href="bincard.php?term=&nbsp;&d1=0&d2=0"><i class="icon-dashboard icon-2x"></i><br>inventory tracker</a>      

</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
