<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title = 'consumption report';
include('../main/navfixed.php');
?>
<?php 
$date1=date('Y-m-d',strtotime($_GET['d1']));
$date2=date('Y-m-d',strtotime($_GET['d2']));
$d1=date('Y-m-d',strtotime($_GET['d1']));
$d2=date('Y-m-d',strtotime($_GET['d2'])); ?>
<?php
if(isset($_GET['d1']) && isset($_GET['d2'])) {
    $d1 = date('Y-m-d', strtotime($_GET['d1']));
    $d2 = date('Y-m-d', strtotime($_GET['d2']));

    // Now you can use $d1 and $d2 safely
} else {
    echo "Error: One or both variables are not set.";
}
?>
<div class="container">
    <div class="container">
        <div class="container">
            <p>&nbsp;</p>
<script language="javascript">
function Clickheretoprint() {
  try {
    var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
    disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
    
    // Get the inner HTML content of the div with id "content"
    var content_value = document.getElementById("content").innerHTML; 

    var docprint = window.open("", "", disp_setting); 
    docprint.document.open(); 
    docprint.document.write('<html><head><title>Print</title></head><body>');
    docprint.document.write('<h4 align="center"><?php
      $result = $db->prepare("SELECT *  FROM pharmacy_details");
      $result->execute();
      for ($i = 0; ($row = $result->fetch()); $i++) {
        $slogan = $row["slogan"]; ?>
        <div id="logo" class="container">
          <div class="container"><?php echo $row["pharmacy_name"]; ?> </div>
          <div class="container"><?php echo $row["location"]; ?> </div>
          <div class="container"><?php echo $row["contact"]; ?> </div>
          <div class="container"><?php echo $row["email"]; ?> </div>
        </div><?php
      }
    ?>
    </h4>');          
    docprint.document.write(content_value); // Print the content of the div
    docprint.document.write('</body></html>'); 
    docprint.document.close(); 
    docprint.focus(); 
  } catch (error) {
    console.error('Error:', error);
    alert('An error occurred. Please try again later.');
  }
}
</script>


			<i class="icon-bar-chart"></i> consumption report
			</div>
			<ul class="breadcrumb">
			<li><p>&nbsp;</p></li> 
			<li class="active">&nbsp;</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="admin.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>


</div>
<form action="consumptionlist.php" method="get">
<center><strong>From : <input type="text" name="d1" class="tcal" autocomplete="off" /> To: <input type="text"  name="d2" class="tcal" autocomplete="off" />
 <button class="btn btn-info"  type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
consumption Report from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
		<th width="">  brand name </th>
						
			
			<th width=""> generic name</th>
			<th width=""> total </th>
			
		</tr>
	</thead>
	<tbody>
		
			<?php
				
				$result = $db->prepare("SELECT product_code, gen_name,  SUM(sales_order.qty)  as qty FROM sales_order JOIN products ON products.product_id=sales_order.product WHERE sales_order.date >=:a AND sales_order.date<=:b GROUP BY product_code ORDER BY qty desc ");

				
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			
			
			
			<td><?php echo $row['qty']; ?></td>
			
			
			</tr>
			<?php
				}
			?>
		
	</tbody>
	
				
	
</table>
</div>
<button  style="float:right;" class="btn btn-success btn-large"><a href="javascript:Clickheretoprint()"> Print</button></a>
<div class="clearfix"></div>
</div>
</div>


</body>
<script src="js/jquery.js"></script>

<?php include('footer.php');?>
</html>