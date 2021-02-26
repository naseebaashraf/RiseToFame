<?php
include '../connection.php';
include 'userheader.php';
session_start();
$email=$_SESSION['email'];

  $q="select password from tbl_login where username='$email'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
    $pwd=$r[0];
?>
<style>
    th{
        background-color: #b213ee;
        color: white;
    }
    td,th{
        padding: 7px;
    }
</style>
<div style="margin-top: 50px; margin-left: 150px; ">
    <form method="POST" enctype="multipart/form-data">
    <table>
            <div>
            
            
            <tr>
                    <td>CURRENT PASSWORD</td>
                    <td><input type="password" name="current" class="form-control"  placeholder="Current password" required=""></td>
            </tr>
            <tr>
                <td>NEW PASSWORD</td>
                <td><input type="password" name="new" class="form-control" placeholder="New password" required=""></td>
            </tr>
            
            <tr>
                <td colspan="2"><center><input type="submit" name="submit" style="margin:50px; width: 450px; height: 45px; background-color: #2d2d61; color: white; border: none; border-radius:10px;" value="Change password"></center></td>
            </tr>
        </table>
</form>

    <?php
if(isset($_REQUEST['submit']))
{
     
     $current=$_POST['current'];
     $new=$_POST['new'];
     if($pwd==$current)
     {
    
         $q="update tbl_login set password='$new' where username='$email'";
         
        $s= mysqli_query($conn, $q);
        if($s)
        {
            echo '<script>alert("Password changed")</script>';
            echo '<script>location.href="userhome.php"</script>';
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
        }
     }
     else
        {
            echo '<script>alert("Current password doenst match")</script>';
        }
}
?>
