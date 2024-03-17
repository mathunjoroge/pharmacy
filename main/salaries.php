<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='pay salary';
include('../main/navfixed.php');

?>
<div class="container">
      <div class="container">
	
			

	<div class="container">
		<p>&nbsp;</p>
			<i class="icon-group"></i> salaries
			</div>
			<ul class="breadcrumb">
			
			
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="expenseslist2.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

			<div style="text-align:center;">
			<p>&nbsp;</p><p>&nbsp;</p>
			</div>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search expense..." autocomplete="off" />
<a rel="facebox" href="pay.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> pay salary</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> employee </th>
			<th width="10%"> paid on  </th>
			<th width="10%"> amount </th>
			<th width="20%"> paid by</th>
			
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM salaries ORDER BY id ASC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['employee']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['amount']; ?></td>
			<td><?php echo $row['paidby']; ?></td>
			

			
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>

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
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletecustomer.php",
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