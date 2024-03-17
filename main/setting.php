<?php
ini_set("display_errors", "On");
require_once('auth.php');
include('../connect.php');
$title='settings';
include('../main/navfixed.php');

?>

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
