<?php
ini_set("display_errors", "On");
?>
<form action="saveexpenselist.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> add new expense</h4></center>
<hr>
		
<div id="ac">
</span><input type="hidden" style="width:265px; height:30px;" name="dt" value="<?php echo date('d/m/Y'); ?>"><br>


<span>expense name </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="expense name" required/><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>