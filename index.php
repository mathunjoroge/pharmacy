<?php 
    // Start session
    session_start();
    
    // Unset the variables stored in session
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_FIRST_NAME']);
    unset($_SESSION['SESS_LAST_NAME']);

    // Include necessary files
    include('navfixed.php');
    include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    
    <link href="main/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
    <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="style.css" media="screen" rel="stylesheet" type="text/css" />
    <style type="text/css">
        /* Custom CSS for desktop */
        #login {
            /* Your desktop styles here */
            /* Example styles */
            margin: 50px auto;
            width: 400px;
        }

        /* Media query for mobile devices */
        @media (max-width: 767px) {
            /* Override styles for mobile devices */
            #login {
                /* Your mobile-specific styles here */
                /* Example styles */
                width: auto;
                margin: 20px auto;
            }

            /* Adjust input fields for mobile */
            #login input[type="text"],
            #login input[type="password"] {
                /* Example styles */
                width: 90%;
                margin-bottom: 15px;
            }

            /* Adjust button for mobile */
            #login button {
                /* Example styles */
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <font style="font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:green;">
            <center>
                <?php
                    // Fetch pharmacy name
                    $result = $db->query("SELECT pharmacy_name FROM pharmacy_details LIMIT 1");
                    $row = $result->fetch();
                    echo $row['pharmacy_name'];
                ?>
                 <?php $error = ""; 
                 if(isset($_GET['response'])) {
    $error ='user name or password is missing or incorrect';
    echo '<div id="errorDiv" style="color: red; text-align: center;">Error: '.$error.'</div>';
} ?>
            </center>
        </font>
    </div>
    <div class="container">
        <div class="row-fluid">
            <div class="span4">


<script>
// Function to hide the error message after a delay
setTimeout(function() {
    var errorDiv = document.getElementById('errorDiv');
    if (errorDiv) {
        errorDiv.style.display = 'none';
    }
}, 5000); // Adjust the delay (in milliseconds) as per your preference
</script>
                <!-- Placeholder for additional content -->
            </div>
            <div id="login">
                <form action="login.php" method="post">
                    <br>
                    <div class="input-prepend">
                        <span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span>
                        <input style="height:40px;" type="text" name="username" Placeholder="Username" autocomplete="new-username" required/><br>
                    </div>
                    <div class="input-prepend">
                        <span style="height:30px; width:25px;" class="add-on" ><i class="icon-lock icon-2x"></i></span>
                       <input type="password" style="height:40px;" name="password" Placeholder="Password" autocomplete="new-password" required/><br>
<br>
                    </div>
                    <div class="qwe">
                        <button class="btn btn-large btn-primary btn-block pull-right" type="submit"><i class="icon-signin icon-large"></i> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
