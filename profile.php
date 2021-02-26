<?php
include '../connection.php';
include 'userheader.php';
session_start();
$email=$_SESSION['email'];

  $q="select * from tbl_users where email='$email'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
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
                <td>NAME</td>
                <td><input type="text" name="name" class="form-control" value="<?php echo $r['name']; ?>" placeholder="Name" required=""></td>
            </tr>
            <tr>
                <td>UPDATE PROFILE PICTURE</td>
                <td><input type="file" name="file" class="form-control" required=""></td>
            </tr>
            
            <tr>
                <td colspan="2"><center><input type="submit" name="submit" style="margin:50px; width: 450px; height: 45px; background-color: #2d2d61; color: white; border: none; border-radius:10px;" value="Update profile"></center></td>
            </tr>
        </table>
</form>

    <?php
if(isset($_REQUEST['submit']))
{
     
     $name=$_POST['name'];
     
     $folder='images/';
    $file=$folder.basename($_FILES['file']['name']);
    if( move_uploaded_file($_FILES['file']['tmp_name'],$file))
     
    {
    
         $q="update tbl_users set name='$name',pro_pic='$file' where email='$email'";
         
        $s= mysqli_query($conn, $q);
        if($s)
        {
            echo '<script>alert("Profile updated")</script>';
            echo '<script>location.href="userhome.php"</script>';
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
        }
    }
    
     else
     {
         $q="update tbl_users set name='$name' where email='$email'";
        $s= mysqli_query($conn, $q);
        if($s)
        {
            echo '<script>alert("Profile updated")</script>';
            echo '<script>location.href="userhome.php"</script>';
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
        }
     }  
   
}
?>
