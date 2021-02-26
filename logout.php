<?php
	session_start();
	error_reporting(1);
	$user=$_SESSION[''];
	mysqli_connect("localhost","root","");
	mysqli_select_db("RISETOFAME");
	$query1=mysqli_query("select * from tbl_users where email='$email'");
	$rec1=mysqli_fetch_array($query1);
	$username=$rec1[0];
	mysqli_query("update user_status set status='Offline' where user_id='$userid'");
	unset($_SESSION['']);
	//session_destroy();
	header("/opt/lampp/htdocs/RiseToFame/home.php");
	if($s)
    {
        echo '<script>alert("loged out")</script>';
        echo '<script>location.href="register.php"</script>';
    }
 else {
        echo '<script>alert("logged out")</script>';
        echo '<script>location.href="register.php"</script>';
    }
    

?>