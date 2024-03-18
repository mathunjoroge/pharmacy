<?php
ini_set("display_errors", "On");
require_once('auth.php');
include '../connect.php';
$finalcode = ""; // Declare $finalcode outside of the function

if (!function_exists('generateRandomPassword')) {
    function generateRandomPassword($length = 8) {
        $chars = "01234567891022787";
        global $finalcode; // Use the global keyword to access the variable declared outside the function
        $finalcode= "";
        $charsLength = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $finalcode .= $chars[rand(0, $charsLength - 1)];
        }
       
        return $finalcode;
    }
}

$password = generateRandomPassword(); // Call the function
if (!function_exists('formatMoney')) {
    function formatMoney($number, $fractional = false) {
        if ($fractional) {
            $number = sprintf('%.2f', $number);
        }
        while (true) {
            $replaced = preg_replace('/(-?\d+)(\d{3})/', '$1,$2', $number);
            if ($replaced != $number) {
                $number = $replaced;
            } else {
                break;
            }
        }
        return $number;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title> <?php echo isset($title) ? $title : 'Title Not Defined'; ?></title>       
<link href="../main/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../main/lib/jquery.js" type="text/javascript"></script>
<script src="../main/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : '../main/src/loading.gif',
      closeImage   : '../main/src/closelabel.png'
    })
  })
</script>
<link href="../main/vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="../main/css/bootstrap.css" rel="stylesheet">
 <link href="../main/vendors/chosen.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="../main/css/DT_bootstrap.css">
<link rel="stylesheet" href="../main/css/font-awesome.min.css">
<link href="../main/css/bootstrap-responsive.css" rel="stylesheet">
<!-- combosearch box--> 
<script src="../main/vendors/jquery-1.7.2.min.js"></script>
<script src="../main/vendors/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="../main/tcal.css" />
<script type="text/javascript" src="../main/tcal.js"></script>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <style>
        #cards {
            display: flex;
            justify-content: left;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #c5d5f0;
            text-align: center;
            text-decoration: none;
            color: inherit;
        }

        .card:hover {
            background-color: #f0f0f0;
        }

        .card a {
            color: inherit;
        }
        

    </style>
    <style>
  .navbar-toggle .icon-bar {
    background-color: black; /* Set the color of the icon bars */
  }
  .navbar-toggle {
  display: none !important;
}

@media (max-width: 768px) {
  .navbar-toggle {
    display: block !important;
  }
  .nav-collapse {
    display: none;
  }
  .nav-collapse.collapsed {
    display: block;
  }
}
</style>


</head>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner" id="nav">
    <div class="container-fluid">
      <a class="brand" href="#">
        <img src="../main/ico/logo.PNG" style="height:35px;">
      </a>
      <button type="button" class="navbar-toggle pull-right" id="navToggle">
        <span class="icon-bar">&nbsp;</span>
         <span class="icon-bar">&nbsp;</span>
          <span class="icon-bar">&nbsp;</span>                      
      </button>
      <div class="nav-collapse collapse" id="navCollapse">
        <ul class="nav pull-right">
          <li><a><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['SESS_FIRST_NAME'];?></strong></a></li>
          <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
