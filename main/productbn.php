<?php 
$title="products by batch numbers";
include('navfixed.php');?>

        <div class="container">

            <i class="icon-group"></i> products by batch
            </div>
            <div class="container">
            <p>&nbsp;</p> 
          
            
            
            
            
<div style="">
<a  href="products.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a></div>
<div class="container">
            <p>&nbsp;</p> 
            </div>
            <div class="container">
            <p>&nbsp;</p> 
            </div>
            <div class="container">
            <p>&nbsp;</p> 
            </div>

<input type="text" name="filter"  id="filter" placeholder="Search product..." autocomplete="off" />

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
    <thead>
        <tr>
            
            <th width="20%"> brand name  </th>
            <th width="20%"> generic name </th>
            <th width="10%"> batch no</th>
            <th width="10%"> expiry date </th>
            <th width="10%"> quantity </th>
            <th width="10%"> action</th>
            
            
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
                $result = $db->prepare("SELECT* FROM products RIGHT OUTER JOIN batch ON batch.product_id=products.product_id ORDER BY product_code DESC, expirydate  ASC");
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
            ?>
            <tr class="record">
            <td><?php echo $row['product_code']; ?></td>
            <td><?php echo $row['gen_name']; ?></td>        
            <td><?php echo $row['batch_no']; ?></td>
            <td><?php echo $row['expirydate']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            
            <?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='admin') {
?>
<td><a  title="Click To Edit batch" rel="facebox" href="editbatch.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> </td>
            
            </tr>
            <?php
                }
            ?>
            <?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='pharmacist') {
?>          
            <td>
            &nbsp;
            </td>
            </tr>
            <?php } }
                
            ?>
        
    </tbody>
</table><div>
<?php
include "pagination.php";
?>
</div>
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
<?php include('footer.php');?></div></div></div>

</html>