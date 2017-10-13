<?php 
include('../connect.php');
$result = $db->prepare("SELECT * FROM `clinician` ORDER BY id DESC LIMIT 1");
				$result->execute();
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				$id=$row['id'];?>
				<?php } ?>
				
				<?php echo $id; ?><?php
				header("location:csuccess.php?id=$id"); ?>
			



