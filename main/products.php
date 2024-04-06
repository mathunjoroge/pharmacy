<?php 
$title="products";
include('navfixed.php');

// Database connection
include('../connect.php');

// Error variable
$error = "";

// Handle errors from previous actions

?>

<div class="container">
    <i class="icon-table"></i> Products

    <ul class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li> /
        <li class="active">Products</li>
    </ul>

    <div style="margin-top: -19px; margin-bottom: 21px;">
        <a href="index.php"><button class="btn btn-success btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
       <?php if(isset($_GET['error'])) {
    $error = $_GET['error'];
    echo '<div id="errorDiv" style="color: red; text-align: center;">Error: '.$error.'</div>';
} ?>

<script>
// Function to hide the error message after a delay
setTimeout(function() {
    var errorDiv = document.getElementById('errorDiv');
    if (errorDiv) {
        errorDiv.style.display = 'none';
    }
}, 5000); // Adjust the delay (in milliseconds) as per your preference
</script>

        <a href="productbn.php"><button class="btn btn-success btn-large" style="float:right;">products batch numbers</button></a>
        <a href="categories.php"><button class="btn btn-success btn-large" style="float: right;">add category</button></a>
    </div>

    <div style="text-align:center;">
        <?php
        // Count total number of products
        $result = $db->prepare("SELECT * FROM products ORDER BY qty DESC");
        $result->execute();
        $rowcount = $result->rowCount();
        ?>
        Total Number of Products: <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount; ?>]</font>
    </div>

    <div style="text-align:center;">
        <?php
        // Count low running products
        $result = $db->prepare("SELECT * FROM products WHERE qty < level ORDER BY product_id DESC");
        $result->execute();
        $rowcount123 = $result->rowCount();
        ?>
        <font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';"><?php echo $rowcount123; ?></font>
        <a rel="facebox" href="level.php"><button class="btn btn-primary">Low running products</button></a>
    </div>

    <div class="container" align="center">
        <input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
        <a rel="facebox" href="addproduct.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Product</button></a><br><br>
        <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
            <thead>
                <tr>
                    <th width="12%"> Brand Name </th>
                    <th width="14%"> Generic Name </th>
                    <th width="6%"> buying Price </th>
                    <th width="6%"> Mark up </th>
                    <th width="6%"> Selling Price </th>
                    <th width="6%"> opening stock </th>
                    <th width="5%"> Qty Left </th>
                    <th width="5%"> Reorder Level </th>
                    <th width="8%"> Value </th>
                    <th width="8%"> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                function formatMoney($number, $fractional = false) {
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

                // Pagination variables
                $start = 0;
                $limit = 100;

                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $start = ($id - 1) * $limit;
                } else {
                    $id = 1;
                }

                // Fetch products with pagination
                $stmt = $db->prepare("SELECT *, o_price * qty as total FROM products LIMIT :start, :limit");
                $stmt->bindParam(':start', $start, PDO::PARAM_INT);
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $total = $row['total'];
                    $reorder = $row['level'];
                    $availableqty = $row['qty'];
                    ?>
                    <tr class="record">
                        <td><?php echo $row['product_code']; ?></td>
                        <td><?php echo $row['gen_name']; ?></td>
                        <td><?php echo formatMoney($row['o_price'], true); ?></td>
                        <td><?php echo $row['markup']; ?></td>
                        <td><?php echo formatMoney($row['o_price'] * $row['markup'], true); ?></td>
                        <td><?php echo $row['instock']; ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td><?php echo $row['level']; ?></td>
                        <td><?php echo formatMoney($total, true); ?></td>
                        <td>
                            <a rel="facebox" title="Click to edit the product" href="editproduct.php?id=<?php echo $row['product_id']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
                            <a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php include "pagination.php"; ?>
    </div>
    <div class="clearfix"></div>
</div>

<script type="text/javascript">
    $(function() {
        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = 'id=' + del_id;
            if(confirm("Sure you want to delete this Product? There is NO undo!")) {
                $.ajax({
                    type: "GET",
                    url: "deleteproduct.php",
                    data: info,
                    success: function(){}
                });
                $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
                .animate({ opacity: "hide" }, "slow");
            }
            return false;
        });
    });
</script>

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('txt1').value;
        var txtSecondNumberValue = document.getElementById('txt2').value;
        var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('txt3').value = result;
        }
        
        var txtFirstNumberValue = document.getElementById('txt11').value;
        var result = parseInt(txtFirstNumberValue);
        if (!isNaN(result)) {
            document.getElementById('txt22').value = result;              
        }
        
        var txtFirstNumberValue = document.getElementById('txt11').value;
        var txtSecondNumberValue = document.getElementById('txt33').value;
        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('txt55').value = result;
        }
        
        var txtFirstNumberValue = document.getElementById('txt4').value;
        var result = parseInt(txtFirstNumberValue);
        if (!isNaN(result)) {
            document.getElementById('txt5').value = result;
        }
    }
</script>

<?php include('footer.php'); ?>
</body>
</html>
