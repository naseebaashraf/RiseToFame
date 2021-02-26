<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>RISE TO FAME</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Merged Forms Page Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //Meta tag Keywords -->
     <link rel="stylesheet" href="css/login.css" type="text/css" media="all" /><!-- Style-CSS -->
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<style>
.w3-tangerine {
  font-family: "Tangerine", serif;
}
</style>
</head>
<body>
    
   <!-- /form-26-section -->
   <section class="form-26">
         <div class="form-26-mian">
				<div class="layer">
			<div class="wrapper">
			<div class="form-inner-cont">
                            <div class="forms-26-info" style="margin-top: -200px;">
                                <div class="w3-container w3-tangerine">
                                                
                                                <img src="images/logo.png" height="400px" width="400px;">
                                                <p class="w3-jumbo">RISE TO FAME</p>
                                                <p style="color: white;">DREAM . EXPLORE . DISCOVER</p>
                                            </div>
                                <h1 style="margin-top: 50px; color: white;">Login here</h1>
                        <p></p>
                    </div>
					<div class="form-right-inf"> 
                                            
							<form method="post" class="signin-form">	
							 <div class="forms-gds">
								<div  class="form-input">
									<input type="email" name="username" placeholder="Email" required="" />
								</div>
								<div  class="form-input">
									<input type="password" name="password" placeholder="Password" required />
								</div>
                                                             <div  class="form-input"><button name="btn" class="btn">Login</button></div>
							</div>
							<h6 class="already"> Dont have an account? <a href="register.php"><span>Register Here<span></span></span></a></h6>
						</form>
						
                    </div>
				<div class="copyright text-center">
                    <!--<p>© 2019 Merged Forms. All rights reserved | Design by <a href="http://w3layouts.com/"-->
                            <!--target="_blank">W3Layouts</a></p>-->
                </div>
                </div>
			
			</div>
		</div>
		    </div>
		</section>
      <!-- //form-26-section -->
</body>
</html>
<?php
session_start();
include 'connection.php';
if(isset($_REQUEST['btn']))
{
   echo $u = $_REQUEST['username'];
   echo $p = $_REQUEST['password'];
    
    $q="select count(*) from tbl_login where username='$u'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
    if($r[0]==0)    //to check whether the username exist
    {
        echo '<script>alert("Username doesnt exist")</script>';
    }
    else
    {
        $_SESSION['email']=$u;    //creating a session variable
        $q="select * from tbl_login where username='$u'";
        $s= mysqli_query($conn, $q);
        $r= mysqli_fetch_array($s);
        if($r[1]==$p)  //to check the password entered by user with the password in database
        {
            if($r[3]=="1")  //to check the status of user
            {
                if($r[2]=="admin")  //to check the usertye/role of the user
                {
                    echo '<script>location.href="admin/adminhome.php"</script>';
                }
                else if($r[2]=="user")
                {
                    echo '<script>location.href="user/userhome.php"</script>';
                }
            }
            else
            {
                echo '<script>alert("Your account is not valid")</script>';
            }
        }
        else
        {
            echo '<script>alert("Incorrect password")</script>';
        }
    }
}
?>
