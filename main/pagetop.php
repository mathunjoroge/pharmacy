<?php include('../connect.php');
$result = $db->prepare("SELECT * FROM `sales_order` ORDER BY transaction_id ASC LIMIT 1");
                $result->execute();
                
                for($i=0; $row = $result->fetch(); $i++){
                $startdate=$row['date'];
                $Date = $startdate;
                $today=date('m/d/y');
$expdate=date('m/d/y', strtotime($Date. ' + 90 days'));
$myday=date('m/d/y', strtotime($today. ' + 1 days'));

                
$today=date('m/d/y');
                if($myday<=$expdate){ echo 'u are using a trial version which expires on '.$expdate;
                 }else if($myday>$expdate){
        header("location:renew.php");
        
        }
        }
    ?>