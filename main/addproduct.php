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
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveproduct.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
<hr>
<div id="ac">
<span>Brand Name : </span><input type="text" style="width:265px; height:30px;" name="code" ><br>
<span>Generic Name : </span><input type="text" style="width:265px; height:30px;" name="gen" Required/><br>
<span>category: </span></br>
<select name="name" class="chzn-select"  style="width:265px; height:30px; margin-left:-5px;" >
<option></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM cat");	
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>buying Price : </span><input type="text" id="txt1" style="width:265px; height:30px;" name="o_price" onkeyup="sum();" Required><br>
<span>selling price : </span><input type="text" id="txt3" style="width:265px; height:30px;" name="selling" placeholder="" onkeyup="sum();"><br>
<span>Quantity : </span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" onkeyup="sum();" name="qty" Required ><br>
<span></span><input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" Required ><br>
<span>Reorder Level : </span><input type="text" id="txt2" style="width:265px; height:30px;" name="level"><br>
<div>
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
