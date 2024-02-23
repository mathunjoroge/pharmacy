<?php
include('../connect.php');
$id=$_GET['id'];
$result = $db->prepare("SELECT * FROM products WHERE product_id= :id");
$result->bindParam(':id', $id);
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
<span>buying Price : </span><input type="text" id="buyingInput" style="width:265px; height:30px;" id="txt2" name="o_price" value="<?php echo $row['o_price']; ?>" onkeyup="sum();" Required/><br>
<span>selling Price : </span><input type="text" id="sellingInput" style="width:265px; height:30px;" id="txt2" name="s_price" value="<?php echo $row['price']; ?>" onkeyup="sum();" Required/><br>
<span>mark up : </span></br>
<input type="text" style="width:265px; height:30px;" id="resultInput"  name="markup" value="<?php echo $row['markup']; ?>" onkeyup="sum();" Required/><br>
<span>quantity : </span></br>
<input type="text" style="width:265px; height:30px;"   name="qty" value="<?php echo $row['qty']; ?>"  Required/><br>
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
<option></option>
<option value="$row['id'];"><?php echo $row['name']; } ?></option>
</select>
<div >
<button class="btn btn-success btn-block btn-large"><i class="icon icon-save icon-large"></i> Save Changes</button></div>
<?php

}
?>
</form>
<script>
    // Function to calculate and update the result
    function updateResult() {
        // Get selling and buying input values
        var selling = parseFloat(document.getElementById('sellingInput').value);
        var buying = parseFloat(document.getElementById('buyingInput').value);
        
        // Check if selling is lower than buying
        if (selling < buying) {
            document.getElementById('resultInput').value = "Selling price cannot be lower than buying price";
            return; // Exit the function early
        }
        
        // Perform division
        var result = selling / buying;
        
        // Check if the buying is not zero and if the result is a valid number
        if (buying !== 0 && !isNaN(result)) {
            // Assign the result to the resultInput field
            document.getElementById('resultInput').value = result;
        } else {
            // Handle division by zero or invalid input
            document.getElementById('resultInput').value = "Division by zero or invalid input";
        }
    }

    // Add event listeners to selling and buying inputs
    document.getElementById('sellingInput').addEventListener('input', updateResult);
    document.getElementById('buyingInput').addEventListener('input', updateResult);
</script>

