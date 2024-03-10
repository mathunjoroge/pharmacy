<html>
<head>
<title>
POS
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
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
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
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
<!--/span-->
	<div class="container">
	
			<i class="icon-bar-chart"></i> sales Inventory
		


<a  href="admin.php"><button class="btn btn-success" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="enter invoice number" autocomplete="on" />

<center><strong>sales Inventory</strong></center>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th > Invoice </th>
			<th > Date </th>
			<th > Brand Name </th>
			<th > Generic Name </th>
			<th > Price </th>
			<th> qty</th>		
<th >amount </th>
			<th > Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				include('../connect.php');
				$start=0;
				$limit=10;
				if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
else{
	$id=1;
}
				$result = $db->prepare("SELECT transaction_id,gen_name,product_code,invoice, products.price AS price,sales_order.qty AS qty,sales_order.date AS date,sales_order.amount AS amount FROM sales_order JOIN products ON products.product_id=sales_order.product LIMIT $start, $limit");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['invoice']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			
			<td><?php
			$price=$row['price'];
			echo formatMoney($price, true);
			?></td>
						<td><?php echo $row['qty']; ?></td>
			<td><?php
			$oprice=$row['amount'];
			echo formatMoney($price, true);
			?></td>
				
			<td> 				
			<a href="deletesalesinventory.php?id=<?php echo $row['transaction_id']; ?>&qty=<?php echo $row['qty'];?>"><button class="btn btn-mini btn-danger"><i class="icon icon-trash"></i> Delete </button></a>
			</tr>
			<?php
				}
			?>
				
	</tbody>
</table>
<?php

				$result = $db->prepare("SELECT * FROM sales_order   ORDER BY transaction_id DESC");
				$result->execute();
				$rowcount123 = $result->rowcount();

			
//calculate total page number for the given table in the database 
$total=ceil($rowcount123/$limit); ?>
<ul >
<?php if($id>1)
{
	//Go to previous page to show previous 10 items. If its in page 1 then it is inactive
	echo "<button class='btn btn-primary'><a href='?id=".($id-1)."' class='button'>PREVIOUS</a></button>";
}
if($id!=$total)
{
	////Go to previous page to show next 10 items.
	echo "<button class='btn btn-primary'><a href='?id=".($id+1)."' class='button'>NEXT</a></button>";
}
?>

<?php
//show all the page link with page number. When click on these numbers go to particular page. 
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo "<button class='active'><span class='current'>".$i."</button>"; }
			
			else { echo "<button class='btn btn-primary'><a href='?id=".$i."'>".$i."</a></button>"; }
		}
?>
<div style="float:right;">		
<button  style="float:left;" class="btn btn-success"><a href="javascript:Clickheretoprint()"> Print</button></a>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesalesinventory.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>