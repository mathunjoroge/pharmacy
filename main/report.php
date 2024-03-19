<div>
    <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
        <thead>
            <tr>
                <th width="13%"> &nbsp;</th>
                <th width="13%"> &nbsp; </th>
                <th width="16%"> &nbsp; </th>
                <th width="18%"> total sales </th>
                <th width="13%"> gross Profit </th>
            </tr>
            <tr>
                <th colspan="3" style="border-top:1px solid #999999"> Total: </th>
                <th colspan="1" style="border-top:1px solid #999999">
                    <?php
                    $results = $db->prepare("SELECT sum(amount) AS amount, sum(profit) AS profit FROM sales WHERE date >= :a AND date<=:b");
                    $results->bindParam(':a', $d1);
                    $results->bindParam(':b', $d2);
                    $results->execute();
                    for ($i = 0; $row = $results->fetch(); $i++) {
                        $amount = $row['amount'];
                        $profit = $row['profit'];
                        echo formatMoney($amount, true);
                    }
                    ?>
                </th>
                <th colspan="1" style="border-top:1px solid #999999">
                    <?php
                    echo formatMoney($profit, true);
                    ?>
                </th>
            </tr>
            <tr>
                <th width="13%"> Transaction Date </th>
                <th width="13%"> expense </th>
                <th width="16%"> entered by </th>
                <th width="18%"> Amount </th>
            </tr>
        </thead>
        <tbody>
            <?php
            // First prepared statement
            $stmt_expenses = $db->prepare("SELECT name, recorded, amount, date FROM expenses WHERE date >= :a AND date <= :b ORDER BY id DESC");
            $stmt_expenses->bindParam(':a', $date1);
            $stmt_expenses->bindParam(':b', $date2);
            $stmt_expenses->execute();

            // Second prepared statement
            $stmt_total_exp = $db->prepare("SELECT COALESCE(SUM(amount), 0) AS total_exp FROM expenses WHERE date >= :a AND date <= :b");
            $stmt_total_exp->bindParam(':a', $date1);
            $stmt_total_exp->bindParam(':b', $date2);
            $stmt_total_exp->execute();

            // Fetch the total expense
            $row_total_exp = $stmt_total_exp->fetch();
            $total_exp = $row_total_exp['total_exp'];

            // Fetch and process each expense
            while ($row = $stmt_expenses->fetch()) {
                $amount = $row['amount'];
                $date = $row['date'];
            ?>
                <tr class="record">
                    <td><?php echo date('d/m/Y', strtotime($date)); ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['recorded']; ?></td>
                    <td><?php echo formatMoney($amount, true); ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <th colspan="3" style="border-top:1px solid #999999"> Total expenses: </th>
                <th colspan="1" style="border-top:1px solid #999999">
                    <?php echo formatMoney($total_exp, true); ?>
                </th>
            </tr>
            <tr>
                <th width="13%"> Transaction Date </th>
                <th width="13%"> employee </th>
                <th width="18%"> Amount </th>
                <th width="16%"> remarks </th>
            </tr>
            <?php
            // First prepared statement
            $stmt_salaries = $db->prepare("SELECT SUM(amount) AS total_sal, amount, date, employee, rmks FROM salaries WHERE date >= :a AND date <= :b ORDER BY id DESC");
            $stmt_salaries->bindParam(':a', $date1);
            $stmt_salaries->bindParam(':b', $date2);
            $stmt_salaries->execute();

            // Fetch the total salary
            $row_total_sal = $stmt_salaries->fetch();
            $total_salary = $row_total_sal['total_sal'];

            // Fetch and process each salary
            while ($row = $stmt_salaries->fetch()) {
                $salary = $row['amount'];
                $date = $row['date'];
            ?>
                <tr class="record">
                    <td><?php echo date('d/m/Y', strtotime($row['date'])); ?></td>
                    <td><?php echo $row['employee']; ?></td>
                    <td><?php echo formatMoney($salary, true); ?></td>
                    <td><?php echo $row['rmks']; ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <th colspan="3" style="border-top:1px solid #999999"> Total salaries paid: </th>
                <th colspan="1" style="border-top:1px solid #999999">
                    <?php echo formatMoney($total_salary, true); ?>
                </th>
            </tr>
            <?php
            // Calculate $netprofit and $texp here
            $texp = $total_salary + $total_exp;
            $netprofit = $profit - $texp;
            ?>
            <tr>
                <th colspan="3" style="border-top:1px solid #999999"> net profit </th>
                <?php
                if ($netprofit < 1) {
                    $color = "red";
                } else {
                    $color = "green";
                }
                ?>
                <th colspan="1" style="border-top:1px solid #999999;color: <?php echo $color; ?>">
                    <?php echo formatMoney($netprofit, true); ?>
                </th>
            </tr>
            <tr>
                <th colspan="3" style="border-top:1px solid #999999">cash available</th>
                <?php
                $cash_available = ($amount - $texp);
                if ($netprofit < 1) {
                    $color = "red";
                } else {
                    $color = "green";
                }
                ?>
                <th colspan="1" style="border-top:1px solid #999999;color: <?php echo $color; ?>">
                    <?php echo formatMoney($cash_available, true); ?>
                </th>
            </tr>
        </tbody>
    </table>
</div>

<div class="container"><button class="btn btn-primary" id="export-btn">Export to Excel</button></div>
<!-- SheetJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

<!-- FileSaver.js Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<!-- Export Script -->
<script>
document.getElementById("export-btn").addEventListener("click", function() {
  try {
    var table = document.getElementById("resultTable");
    var wb = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});
    var wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});
    
    function s2ab(s) {
      var buf = new ArrayBuffer(s.length);
      var view = new Uint8Array(buf);
      for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
      return buf;
    }
    
    saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'table.xlsx');
  } catch (error) {
    console.error("Export failed:", error);
    alert("Export failed. Please check console for error details.");
  }
});
</script>
