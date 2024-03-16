<?php
// Start session
ini_set("display_errors", "On");
session_start();

// Include database connection
include('connect.php');

// Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = trim($str);
    
    return $str;
}

// Sanitize the POST values
$login = clean($_POST['username']);
$password = clean($_POST['password']);

// Hash the password securely
$hashed_password = md5(md5($password));

try {
    // Prepare and execute the query
    $stmt = $db->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $login);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check whether the query was successful or not
    if ($user) {
        // Login Successful
        session_regenerate_id();
        $_SESSION['SESS_MEMBER_ID'] = $user['id'];
        $_SESSION['SESS_FIRST_NAME'] = $user['name'];
        $_SESSION['SESS_LAST_NAME'] = $user['position'];
        session_write_close();
        header("location: main/index.php");
        exit();
    } else {
        // Login failed
        header("location: index.php?response=login_failed");
        exit();
    }
} catch(PDOException $e) {
    // Database error
    echo "Error: " . $e->getMessage();
}
?>