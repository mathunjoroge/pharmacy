<?php
$new = date('Y-m-d');
?>

<form action="savesales.php" method="post">
    <div id="ac" style="width: 100%; text-align: center;">
        <h2>Save Sales</h2>
        <hr>
        <input type="hidden" name="invoice" value="<?= $_GET['invoice']; ?>" />
        <input type="hidden" name="amount" value="<?= $_GET['total']; ?>" />
        <select name="ptype" style="width: 100%;">
            <option>cash</option>
            <option>credit</option>
        </select>
        <select name="cname" placeholder="select customer" style="width: 100%;">
            <option></option>
            <?php
            include('../connect.php');
            $result = $db->prepare("SELECT * FROM customer");
            $result->execute();
            while ($row = $result->fetch()):
            ?>
                <option value="<?= $row['customer_name']; ?>"><?= $row['customer_name']; ?></option>
            <?php endwhile; ?>
        </select>
        <input type="hidden" name="cashier" value="<?= $_GET['cashier']; ?>" />
        <input type="hidden" name="profit" value="<?= $_GET['totalprof']; ?>" />
        <input type="hidden" name="cash" placeholder="Cash" value="0" style="width: 100%; height:30px; margin-bottom: 15px;"><br>
        <input type="hidden" name="reset" placeholder="Cash" value="0" style="width: 100%; height:30px; margin-bottom: 15px;"><br>
        <div class="suggestionsBox" id="suggestions" style="display: none;">
            <div class="suggestionList" id="suggestionsList">&nbsp;</div>
        </div>
        <button class="btn btn-success btn-large" style="width: 100%; margin-top: 15px;">
            <i class="icon icon-save icon-large"></i> Save
        </button>
    </div>
</form>
