<html>
<head>
<title>
delete sales
</title>

<?php 
require_once('auth.php');
function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				include('../connect.php');
?>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
<!--/span-->
	<div class="container">
	<div class="container">
		<p>&nbsp;</p>
			<p><i class="icon-bar-chart"></i> delete sales</p>
			<a  href="admin.php"><button class="btn btn-success" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
		
</div></br>
<div class="container" align="center">
	<form action="sales_inventory.php" method="GET">
<strong>From : <input type="text" name="d1" class="tcal" autocomplete="off" /> To: <input type="text"  name="d2" class="tcal" autocomplete="off" />
<Button type="submit" class="btn btn-info"  /><i class="icon-plus-sign icon-large" ></i>submit</button>
</form>
</div>
<?php
if (isset($_GET['d1'])) {
	$d1=$_GET['d1'];
	$d2=$_GET['d2'];
?>
<div class="container" align="center"> showing sales receipts from: <?php echo date('d-M-Y',strtotime($_GET['d1'])) ;?> to: <?php echo date('d-M-Y',strtotime($_GET['d2'])) ;?></div></br>
<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="enter receipt number" autocomplete="on" /></br>


<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th > Invoice </th>
			<th > Date </th>
			<th > Brand Name </th>
			<th > Generic Name </th>
			<th > Price </th>
			<th> qty</th>		
<th >amount </th>
			<th > Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			
			
				if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
else{
	$id=1;
}
				$result = $db->prepare("SELECT transaction_id,gen_name,product_code,invoice, products.price AS price,sales_order.qty AS qty,sales_order.date AS date,sales_order.amount AS amount FROM sales_order JOIN products ON products.product_id=sales_order.product WHERE  sales_order.date >=:a AND sales_order.date<=:b");

$result->bindParam(':a', $d1);
$result->bindParam(':b', $d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['invoice']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			
			<td><?php
			$price=$row['price'];
			echo formatMoney($price, true);
			?></td>
						<td><?php echo $row['qty']; ?></td>
			<td><?php
			$oprice=$row['amount'];
			echo formatMoney($price, true);
			?></td>				
			<td> 

    <button class="delbutton btn btn-mini btn-danger" data-id="<?php echo $row['transaction_id']; ?>">
        <i class="icon icon-trash"></i> Delete
    </button>
</td>

			</tr>
			<?php
				}
			?>
				
	</tbody>
</table>

<?php

	}
?>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var delButtons = document.querySelectorAll(".delbutton");

        delButtons.forEach(function(button) {
            button.addEventListener("click", function(event) {
                var delButton = event.currentTarget;
                var del_id = delButton.getAttribute("data-id");

                // Debugging: Log the transaction ID
                console.log("Transaction ID to delete: " + del_id);

                var info = 'id=' + del_id;

                if (confirm("Are you sure you want to delete this entry? This action cannot be undone!")) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "deletesalesinventory.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = xhr.responseText;
                            if (response.trim() === "success") {
                                var row = delButton.closest("tr");
                                // Add fade-out effect
                                row.style.transition = "opacity 0.5s ease";
                                row.style.opacity = "0";
                                // Hide the row after the fade-out effect
                                setTimeout(function() {
                                    row.style.display = "none";
                                }, 500); // Adjust the delay according to the transition duration
                                // Reload the page after successful deletion
                                 location.reload();  // <- Commented out for testing
                            } else {
                                console.error("Error deleting entry.");
                            }
                        }
                    };
                    xhr.send(info);
                }
                return false;
            });
        });
    });
</script>
</body>
<?php include('footer.php');?>

</html>