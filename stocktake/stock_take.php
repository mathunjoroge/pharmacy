<?php
ini_set("display_errors", "On");
require_once('../main/auth.php');
include('../connect.php');
$title='stock take';
include('../main/navfixed.php');

?>

<style>
    /* Center the loading bar */
    .loading-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 2px; /* Adjust the height of the loading bar */
    }

    /* Loading bar styles */
    .loading-bar {
        width: 100%; /* Full width */
        height: 100%;
        background-color: #f3f3f3; /* Light grey background */
        border-radius: 5px;
        overflow: hidden; /* Hide overflow */
    }

    .loading-progress {
        width: 0%;
        height: 100%;
        background-color: #4CAF50; /* Green progress bar */
        animation: progress 10s linear infinite; /* Progress animation */
    }

    /* Progress animation keyframes */
    @keyframes progress {
        0% { width: 0%; }
        100% { width: 100%; }
    }
</style>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../main/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Stock Take</li>
            </ol>
        </nav>
    </div>
    

    <?php if (isset($_GET['message'])): ?>
    <div class="container success">
        <p class="text text-success">Drugs have been updated!</p>
    </div>
    <?php endif; ?>

    <div class="container">
        <input type="text" id="search" onkeyup="myFunction()" placeholder="Filter any column.." title="Type in a drug">
        <form action="save_s_take.php" id="save_stock" method="POST">
            <table class="table table-bordered" id="products_table">
                <thead class="bg-primary">
                    <tr>
                        <th>Generic Name</th>
                        <th>Brand Name</th>
                        <th>Qty Available</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Markup</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $db->prepare("SELECT product_id,o_price AS buying_price,  gen_name, product_name,price AS selling_price, qty,  markup FROM products");
                    $result->execute();
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)):
                        $markup = $row['markup'];
                        $drug = $row['gen_name'];
                        $brand = $row['product_name'];
                        $drug_id = $row['product_id'];
                        $qty = $row['qty'];
                        $buying_price = $row['buying_price'];
                        $selling_price = round($row['selling_price']);
                    ?>
                    <tr>
                        <td><?php echo isset($drug) ? $drug : $brand; ?></td>
                        <td><?php echo isset($brand) ? $brand : $drug; ?></td>
                        <input type="hidden" name="drug_id[]" value="<?php echo $drug_id; ?>">
                        <td><input style="width: 5rem;" type="number" name="qty[]" value="<?php echo $qty; ?>" contenteditable="true"></td>
                        <td><input type="number" name="buying_price[]" id="buying_price" value="<?php echo round($buying_price); ?>" style="width: 5rem;" contenteditable="true"></td>
                        <td><input type="number" name="selling_price[]" id="selling_price" value="<?php echo round($selling_price); ?>" style="width: 5rem;" contenteditable="true"></td>
                        <td><input type="number" name="markup[]" id="markup" value="<?php echo $markup; ?>" style="width: 5rem;" readonly></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <button class="btn btn-success"><i class="icon icon-save icon-large"></i>Save</button>
        </form>
    </div>

    <!-- JavaScript for filtering table -->
    <script>
        var $rows = $('#products_table tbody tr');
        $('#search').keyup(function() {
            var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
                reg = RegExp(val, 'i'),
                text;
            $rows.show().filter(function() {
                text = $(this).text().replace(/\s+/g, ' ');
                return !reg.test(text);
            }).hide();
        });
    </script>

    <!-- JavaScript for warning message -->
    <script>
        $(document).ready(function() {
            // When any link is clicked
            $('a').click(function(event) {
                // Prevent the link from navigating immediately
                event.preventDefault();
                // Show the warning message
                $('.warning').fadeIn();
                // After 2 seconds, hide the warning message
                setTimeout(function() {
                    $('.warning').fadeOut();
                    // Then navigate to the link's destination
                    window.location = $(event.currentTarget).attr('href');
                }, 2000);
            });
        });
    </script>

    <!-- JavaScript for checking minimum selling price -->
    <script>
        function minValue() {
            let drug_id = this.id.split('_')[2];
            let buying_price = document.getElementById("buying_price_" + drug_id).value;
            let selling_price = document.getElementById("selling_price_" + drug_id).value;
            if (selling_price < buying_price) {
                document.getElementById("selling_price_" + drug_id).value = buying_price;
                alert("Value for selling_price cannot be lower than buying_price!");
            }
        }
        <?php
        $result = $db->prepare("SELECT product_id FROM products");
        $result->execute();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)):
            $drug_id = $row['product_id'];
        ?>
        document.getElementById("selling_price_<?php echo $drug_id; ?>").onchange = minValue;
        <?php endwhile; ?>
    </script>
    <div id="loading" class="container" style="display: none;">
    <!-- Your loading spinner or message here -->
    <div class="loading-container">
    <div class="loading-bar">
        <div class="loading-progress"></div>
    </div>
</div>
    updating data.......
</div>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#save_stock').submit(function() {
        // Show loading spinner
        $('#loading').show();

        // AJAX post request
        $.ajax({
            type: 'POST',
            url: 'save_s_take.php',
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                // Hide loading spinner
                $('#loading').hide();
                // Handle success response if needed
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Hide loading spinner
                $('#loading').hide();
                // Handle errors if needed
                console.error(xhr.responseText);
            }
        });
        return false; // Prevent default form submission
    });
});

    </script>

    <?php include "../main/footer.php"; ?>
</body>
</html>
