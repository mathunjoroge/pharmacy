<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='employees';
include('../main/navfixed.php');

?>
<div class="container">
      <div class="container">
	
			

	<div class="container">
		<p>&nbsp;</p>
			<i class="icon-group"></i> employees
			</div>
			<ul class="breadcrumb">
			 <p>&nbsp;</p>
			
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="expenseslist2.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM employees ORDER BY id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number of employees: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search employee..." autocomplete="off" />
<a rel="facebox" href="addemployee.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add employee</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%">  Name </th>
			<th width="17%">  ID number </th>
			<th width="10%"> qualifications </th>
			<th width="10%"> role </th>
			<th width="20%"> gross salary</th>
			
			<th width="9%"> edit </th>
			<th width="14%"> delete </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM employees ORDER BY id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['idno']; ?></td>
			<td><?php echo $row['qualifications']; ?></td>
			<td><?php echo $row['role']; ?></td>
			<td><?php echo $row['amount']; ?></td>
			

			<td><a  title="Click To Edit employee" rel="facebox" href="editemployee.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> </td>
			<td><a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
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
 if(confirm("Are you sure want to delete this employee? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteemployee.php",
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

<?php include('footer.php');?>
</body>

</html>