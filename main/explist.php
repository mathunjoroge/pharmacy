<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='list of expenses';
include('../main/navfixed.php');

?>
<div class="container">
      <div class="container">
	
			

	<div class="container">
		<p>&nbsp;</p>

			<i class="icon-group"></i> expenses list
			</div>
			<div class="container">
			<p>&nbsp;</p> 
			</div>
			
			
			
			
<div style="">
<a  href="expenseslist2.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a></div>
<div class="container">
			<p>&nbsp;</p> 
			</div>
			<div class="container">
			<p>&nbsp;</p> 
			</div>
			<div class="container">
			<p>&nbsp;</p> 
			</div>

<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search expense..." autocomplete="off" />
<a rel="facebox" href="addexplist.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Record expense</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			
			<th width="40%"> expense  </th>
			<th width="20%"> added by  </th>
			<th width="10%"> &nbsp;  </th>
			<th width="10%"> &nbsp; </th>
			
			
		</tr>
	</thead>
	<tbody>
		
			<?php
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
				$result = $db->prepare("SELECT * FROM expenselist LIMIT $start, $limit");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
		
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['addedby']; ?></td>
			
			

			<td><a  title="Click To Edit expense" rel="facebox" href="editexplist.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> </td>
			<td><a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table><div>
<?php

			include('../connect.php');
				$result = $db->prepare("SELECT * FROM expenselist   ORDER BY id DESC");
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
?></div>
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
   url: "deleteexp.php",
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