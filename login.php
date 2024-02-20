<?php
	//Start session
	session_start();
	include('connect.php');
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return ($str);
	}
	
	//Sanitize the POST values
	$login = strip_tags($_POST['username']);
	$passworda =md5($_POST['password']);
	$password =md5(md5($_POST['password']));
	//Input Validations
	
	$result = $db->prepare("SELECT * FROM user WHERE username='$login' AND password='$password'");
				$result->execute();
				$rowcount = $result->rowcount();
	
	//Check whether the query was successful or not
		if($rowcount>0) {
	$result = $db->prepare("SELECT * FROM user WHERE username='$login' AND password='$password'");
	$result->execute();
	for($i=0; $member = $result->fetch(); $i++){
			//Login Successful
			session_regenerate_id();			
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_LAST_NAME'] = $member['position'];
		
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			
			header("location: main/index.php");
			exit();
		}
		if($rowcount=0){
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		session_write_close();
		header("location:index.php?response=login_failed");
		
	}
?>