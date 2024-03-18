<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='list of purchases';
include('../main/navfixed.php');

?>
<div class="container">
      <div class="container">
			

	<div class="container">
		<p>&nbsp;</p>

			<i class="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<a href="../main/statementslist.php"><li>Dashboard</li></a> /
			<li class="active">Purchases List</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="statementslist.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i><b> Back</b></button></a>
</div><form action="search.php" method="post">
<span><input type="text"  name="filter" value="" id="filter" placeholder="Search supplier" name="term" autocomplete="off" /> <button class="btn btn-primary" type="submit">search</button>  </span><br>
  </form>


<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="15%"> Date </th>
			<th width="15%"> supplier </th>
			<th width="15%"> Invoice Number </th>
			<th width="15%"> Purchase Type </th>
			<th width="15%"> Amount </th>
			<th width="15%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM purchases2 ORDER BY transaction_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['invoicesupp']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['amount']; ?></td>
			<td><a rel="" href="preview2.php?invoice=<?php echo $row['invoice_number']; ?>"> <button class="btn btn-primary btn-mini"><i class="icon-search"></i> View purchase details</button></a> 
			
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
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
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletepppp.php",
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
