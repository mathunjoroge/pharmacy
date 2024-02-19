<div id="mainmain">
<?php
  $Today = date('m/d/y',time());
  $new = date('m/d/20y', strtotime($Today));
  ?>


<a href="cashier.php"><font ><i class="icon-shopping-cart icon-2x"></i></font><br>receipts</a> 
<a href="cash.php?d1=<?php echo $new; ?>&d2=<?php echo $new; ?>"><i class="icon-list-alt icon-2x"></i><br>today's cash</a>      
<a href="expenses2.php"><i class="icon-group icon-2x"></i><br>record expense </a>     
   


<div class="clearfix"></div>
</div>
</div>

