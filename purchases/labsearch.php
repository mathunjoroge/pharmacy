<?php
include('db.php');
if($_POST)
{
$term=$_POST['search'];
$sql_res=mysql_query("select* from clinician where name like '%$term%' or number like '%$term%' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
	$id=$row['id'];
$username=$row['name'];
$email=$row['number'];
$b_username='<strong>'.$term.'</strong>';
$b_email='<strong>'.$term.'</strong>';
$final_username = str_ireplace($term, $b_username, $username);
$final_email = str_ireplace($term, $b_email, $email);
?>
<div class="show" align="left">
<span class="name"><?php echo '<a href="lab.php?id='.$id.'"><h6>'.$final_username. "&nbsp;&nbsp;&nbsp;&nbsp;". $final_email.'</h6></a>'; ?>
</div>


<?php
}
}
?>

