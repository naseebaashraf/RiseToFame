<?php
include 'connection.php';
?>
<title>RISE TO FAME</title>
<style>
    ::placeholder{
        color:white;
    }
    </style>
     
     <center></center><meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="style.css">

     
 <div class="forms23-block-hny"> 
<div class="login-box">
 <body>       
  
<form method="POST" enctype="multipart/form-data" action="register.php">
    <h2>RISE TO FAME </h2><b><p style="color:white;">Join Rise To Fame!! Sign up to explore your hidden talents and talents of your buddies</p></b>

     <div class="textbox" color="gray">
      <font style="color: white;text-shadow: 2px 2px 4px #000000;">
      <div class="left-box"><center><img src="https://img.icons8.com/material-sharp/96/000000/edit-user-male.png"/></center></div>
                   
                 
                   <div class="file">
                   <center>Upload pic<input type="file" name="file" class="form-control" ></center>
                    </div><br><br><br>

                   <div class="textbox">
                   <i class="fa fa-user" aria-hidden="true"></i><input type="text" name="name" placeholder="Name of the Artist" pattern="[a-zA-Z ]+" required="" value="" class="form-control">  </div>   
                

           <div class="textbox">   
                   <i class="fa fa-envelope" aria-hidden="true"></i><input type="text" name="email"  placeholder="info@example.com" required="" value="" class="form-control">     </div>

                   <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
               <input type="password" placeholder="Password" name="password" value="" required="" class="form-control"></div>
                
     
                 
                 <div class="textbox">
                  <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>
                   <select id="code">
                 <option>+91</option>
                 <option>+92</option>
                 <option>+93</option>
                 <option>+94</option>
                 <option>+95</option>
                 </select>&nbsp&nbsp&nbsp<br><br><input type="tel" name="contact"  placeholder="Mobile Number" required="" pattern="[6789][0-9]{9}" value="" class="form-control" > </div>
                  
                     
                 
                   <div  class="form-input"><button name="btn" class="btn">Sign Up</button></div>
                   <footer>
                  By signing up,you agree to our <b>Terms and conditions , Data Policy </b>and<b> Cookie Policy </b>
               </footer>
               <p>
                Have an account? <a href="login.php">Log In</a>
             
</form> 
</center>
</body>




<?php
if($_POST) //button click
{
    $folder='images/';
    $file=$folder.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'],$file);
    {
     echo "<img src=".$file." height=200 width=300 />";
    } 
    $file="user/images/".basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'],$file);


    $n = $_REQUEST['name'];
    $e = $_REQUEST['email'];
    $c = $_REQUEST['contact'];
    $p = $_REQUEST['password'];

    $q="select count(*) from tbl_login where username='$e'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
    if($r[0]>0)
    {
        echo '<script>alert("User already exist")</script>';
    }
 else {
        $q="insert into tbl_users (name,email,contact,pro_pic,created_on) values('$n','$e','$c','$file',(select sysdate()))";
        $s= mysqli_query($conn, $q);
        if($s)
        {
            $q="insert into tbl_login (username,password,utype,status) values('$e','$p','user','1')";
            $s= mysqli_query($conn, $q);
            if($s)
            {
                echo '<script>alert("Registration successfull")</script>';
                echo '<script>location.href="register.php"</script>';
            }
            else
            {
               echo '<script>alert("Registration failed")</script>'; 
            }
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
            echo $q;
        }
    }
}
?>