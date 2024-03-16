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
for($i=0; $row = $results->fetch(); $i++){
$amount=$row['amount'];
$profit=$row['profit'];
echo formatMoney($amount, true);
?>
</th>
<th colspan="1" style="border-top:1px solid #999999">
<?php
echo formatMoney($profit, true);
}
?>

</th>
</tr>
</thead>
</table>
</div><h4>expenses</h4>
<div><table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
<thead>
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
$stmt_expenses = $db->prepare("SELECT name, recorded, amount, date
                               FROM expenses
                               WHERE date >= :a AND date <= :b
                               ORDER BY id DESC");
$stmt_expenses->bindParam(':a', $date1);
$stmt_expenses->bindParam(':b', $date2);
$stmt_expenses->execute();

// Second prepared statement
$stmt_total_exp = $db->prepare("SELECT COALESCE(SUM(amount), 0) AS total_exp
                                FROM expenses
                                WHERE date >= :a AND date <= :b");
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
    // Process the fetched data here
    // ...


?>
<tr class="record">
<td><?php 

echo date('d/m/Y',strtotime($date));
 ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['recorded']; ?></td>
<td><?php
echo formatMoney($amount, true);
?></td>

</tr>


</tbody>
<thead>
<tr>
<th colspan="3" style="border-top:1px solid #999999"> Total expenses: </th>
<th colspan="1" style="border-top:1px solid #999999"> 
<?php

echo formatMoney($total_exp, true);

?>
<?php
}
?>
</th>

</tr>
</thead>
</table></div><h4>salaries</h4><div><table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
<thead>
<tr>
<th width="13%"> Transaction Date </th>
<th width="13%"> employee </th>		
<th width="18%"> Amount </th>
<th width="16%"> remarks </th>			
</tr>
</thead>
<tbody>

<?php
// First prepared statement
$stmt_salaries = $db->prepare("SELECT SUM(amount) AS total_sal, amount, date, employee, rmks
                               FROM salaries
                               WHERE date >= :a AND date <= :b
                               ORDER BY id DESC");
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
    // Process the fetched data here
    // ...


?>
<tr class="record">
<td><?php echo date('d/m/Y',strtotime($row['date']));
?></td>
<td><?php echo $row['employee']; ?></td>
<td><?php

echo formatMoney($salary, true);
?></td>
<td><?php echo $row['rmks']; ?></td>

</tr>


</tbody>
<thead>
<tr>
<th colspan="3" style="border-top:1px solid #999999"> Total salaries paid: </th>
<th colspan="1" style="border-top:1px solid #999999"> 

<?php

echo formatMoney($total_salary, true);

?>
<?php
}
?><?php $texp=$total_salary+$total_exp; 
$netprofit=$profit-$texp;  ?>
</th>

</tr>
</thead>
<thead>
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
<?php
echo formatMoney($netprofit, true);

?>
</th>
</tr>
<th colspan="3" style="border-top:1px solid #999999">cash available</th>

<?php
$cash_available=($amount-$texp);
if ($netprofit < 1) {
    $color = "red";
} else {
    $color = "green"; 
}
?>
<th colspan="1" style="border-top:1px solid #999999;color: <?php echo $color; ?>">
<?php
echo formatMoney($cash_available, true);

?>
</th>
</tr>
</thead>
</table>