<?php
ini_set("display_errors", "On");
require_once('auth.php');
include('../connect.php');
$title='maximum wholesale discount';
include('../main/navfixed.php');

?>


      <div class="container">
      	<p>&nbsp;</p>
			<i class="icon-list"></i>set wholesale discount
			</div>
			<div class="container">
			<p>&nbsp;</p> 
			</div>
			
			
			
	<div class="container" align="center" style="float: center;">
	<div class="container" align="center" style="float: center;">		
<div class="container" align="center" style="float: center;">
<a  href="setting.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i>Back</button></a></div>
<div class="container" align="center" style="float: center;"><span>
<input type="text" placeholder="">&nbsp;<a rel="facebox" href="editws.php"><Button type="submit" class="btn btn-info" style="width:150px; height:35px;" /><i class="icon-plus-sign icon-large"></i>add discount</button></a></span></br></div>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left; width: 60%;">
	<thead>
		<tr>
			
			<th width="40%">maximum allowable discount in wholesale</th>
			<th width="20%"> edit  </th>
			
			
			
			
		</tr>
	</thead>
	<tbody>
		
			<?php
			
				$start=0;
				$limit=1;
				if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
else{
	$id=1;
}
				$result = $db->prepare("SELECT maxdiscws FROM products LIMIT $start, $limit");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<?php $first=1-$row['maxdiscws'];
			$second=$first*100;
			?>
		
			<td><?php echo $second; ?></td>
			
			
			

			<td><a  title="Click To Edit discount" rel="facebox" href="editws.php"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> </td>
			
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table><div>
</div></div>
</div>
<div class="clearfix"></div>

</div>
</div>
</div>

<?php include('footer.php');?>
</body>

</html>