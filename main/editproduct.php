<?php
include('../connect.php');
$id=$_GET['id'];
$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
?>
<form action="saveeditproduct.php" method="post">
<center>
<h4><i class="icon-edit icon-large"></i> Edit Product</h4></center>
<hr>
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Brand Name : </span><input type="text" style="width:265px; height:30px;"  name="code" value="<?php echo $row['product_code']; ?>" required/><br>
<span>Generic Name : </span><input type="text" style="width:265px; height:30px;"  name="gen" value="<?php echo $row['gen_name']; ?>" /><br>
<span>buying Price : </span><input type="text" style="width:265px; height:30px;" id="txt2" name="o_price" value="<?php echo $row['o_price']; ?>" onkeyup="sum();" Required/><br>
<span>mark up : </span></br>
<input type="text" style="width:265px; height:30px;"  name="markup" value="<?php echo $row['markup']; ?>" onkeyup="sum();" Required/><br>
<input type="hidden" style="width:265px; height:30px;" min="0" name="sold" value="<?php echo $row['instock']; ?>" /><br>
<span>Re-order Level </span><input type="number" style="width:265px; height:30px;" min="0" name="level" value="<?php echo $row['level']; ?>" /><br>
<span>category: </span><br>
<select name="name" class="chzn-select" data-live-search="true" style="width:265px; height:30px; margin-left:-5px;" value="<?php echo $row['category'] ?>" >

<?php
include('../connect.php');
$result = $db->prepare("SELECT * FROM cat");	
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
?>
<option value="$row['id'];"><?php echo $row['name']; } ?></option>
</select>
<div >
<button class="btn btn-success btn-block btn-large"><i class="icon icon-save icon-large"></i> Save Changes</button></div>
<?php

}
?>



</form>

